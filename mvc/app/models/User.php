<?php
class User {
	
	use Model;

	protected $userData = [];
	protected $selectOptions = [];
	protected $errors = [];
	protected $success = [];

	protected $usersColumns = [
		'username',
		'email',
		'password',
		'user_img',
		'work_id',
		'address',
		'description',
		'country',
		'number'
	];

	public function __get($get) {
		return $this->$get;
	}

	public function login($data) {
		
		// check if the user exist in db
		$this->validateLogin(['username'=>$data['username'], 'password'=>$_POST['password']]);

		// Go To HomePage if user exist
		if(empty($this->errors)) {
			$info = $this->selectInfo('*', 'users', ['username'=>$data['username'], 'password'=>sha1($data['password'])], [], 'fetch');
			$_SESSION['username']    = $info['username'];
			$_SESSION['user_id'] = $info['user_id'];
			$_SESSION['user_img'] = $info['user_img'];
			header('Location: ' . ROOT . '/home');
			exit();
		}
	}

	public function register($data) {
		// check if the user exist in db
		$this->validateRegister(['username'=>$data['username'], 'email'=>$data['email'], 'password'=>$data['password']]);
		
		// Go To HomePage if user exist
		if(empty($this->errors)) {
			$this->insertInfo('users', ['username'=>$data['username'], 'email'=>$data['email'],'password'=>sha1($data['password'])]);
			$this->success['registration'] = 'You Are Register Now Go For Login';
		}
	}

	public function validateLogin($data) {

		if(strlen($data['username']) <= 4) {
			$this->errors['username_lenght'] = "Username should be greater than 4 caracteres";
		}
		
		if(empty($data['password']))
			$this->errors['password_require'] = "Password is required";
	}

	public function validateRegister($data) {

		if(strlen($data['username']) <= 4) {
			$this->errors['username_lenght'] = "Username should be greater than 4 caracteres";
		}

		if($this->selectInfo('*', 'users', ['username'=>$data['username']])) {
			$this->errors['username_exist'] = "Username already exist";
		}

		if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
			$this->errors['email_validation'] = "Email is not valid";
		
		if(empty($data['password']))
			$this->errors['password_require'] = "Password is required";

	}

	public function getProfile() {
		$this->userData = $this->selectInfo('*', 'users', ['user_id'=>$_SESSION['user_id']], [], 'fetch');
		return $this->userData;
	}
	
	public function getSelectOptions() {
		$this->selectOptions = $this->selectInfo('*', 'works');
		return $this->selectOptions;
	}

	public function updateProfile($data, $files = []) {
		//before we update
		$beforeUpdate = $this->getProfile();

		// updates
		$this->updateInformationProfile($data);
		$this->updateImageProfile($files);

		$afterUpdate = $this->getProfile();

		// show success updates
		$this->successUpdates(array_diff($beforeUpdate, $afterUpdate));

	}

	public function updateImageProfile($files) {
		if(isset($files['imageProfile']) && $files['imageProfile']['size']){
			$img_size = $files['imageProfile']['size'];
			$img_name = $files['imageProfile']['name'];
			$tpm_path = $files['imageProfile']['tmp_name'];
			$error = $files['imageProfile']['error'];
			if ($error === 0){
				$allowed_size = 500000;
				if ($img_size > $allowed_size){
					$this->errors['size'] = "Sorry, your file large than [ " . formatSizeUnits($allowed_size) . " ] it's [ " . formatSizeUnits($img_size) . " ]";
				} else {
					$img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
					$allowed_extensions = array("jpg", "jpeg", "png");

					if (in_array($img_extension, $allowed_extensions)){
						//name of image
						$new_img_name = uniqid("imageProfile-", true)."."."$img_extension";
						//path where image will be
						$img_upload_path = './uploads/'.$new_img_name;
						move_uploaded_file($tpm_path, $img_upload_path);
						// add image to database and session
						$res = $this->updateInfo('users', ['user_img'=>$new_img_name], ['user_id'=>$_SESSION['user_id']]);
						if ($res) {
							$_SESSION['user_img'] = $new_img_name;
						}
					} else {
						$this->errors['size'] = "Your Image Should Not Be Out Of This Types [ " . join(', ', $allowed_extensions) . " ]";
					}

				}
			} else {
				$this->errors['image_unkown_error'] = "Unknown Error Occurred!";
			}
    }
	}

	public function updateInformationProfile($data) {
		$updates = ['email'=>$data['email'], 'address'=>$data['address'],
			'description' => $data['description'],'country'=>$data['country'],
			'number'=>$data['number'], 'work_id'=>$data['work_id']];
		if($this->selectInfo('*', 'users', ['username'=>$data['username']], ['user_id'=>$_SESSION['user_id']], 'rowCount') === 0) {
			$updates['username'] = $data['username'];
		} else {
			$this->errors['username_exist'] = "Username already exist";
		}
		if(!empty($data['password'])) {
			$updates['password'] = sha1($data['password']);
		}
		$this->updateInfo('users', $updates, ['user_id'=>$_SESSION['user_id']]);
	}

	/* do not include files */
	public function successUpdates(array $updates) {
		$successMesseges = [
			'username' => 'Username Updated',
			'email' => 'Email Updated',
			'password' => 'Password Updated',
			'user_img' => 'Image Updated',
			'work_id' => 'Work Updated',
			'address' => 'Address Updated',
			'description' => 'Description Updated',
			'country' => 'Country Updated',
			'number' => 'Number Updated'
		];

		foreach($updates as $column => $value) {
			if (in_array($column, $this->usersColumns))
				$this->success["$column"] = $successMesseges["$column"];
		}

	}

}