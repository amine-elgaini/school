<?php
class ProfileM {
	
	use Model;

	protected $userData = [];
	protected $getSpecialties = [];
	protected $errors = [];
	protected $success = [];

	protected $changeableInformation = [
		'username',
		'full_name',
		'email',
		'password',
		'user_img',
		'speciality',
		'address',
		'description',
		'country',
		'number'
	];

	public function __get($get) {
		return $this->$get;
	}

	public function __set($get, $val) {
		return $this->$get = $val;
	}

	
	public function getProfile($id, $action='fetch') {
		$join = "FROM users 
		LEFT JOIN specialties on specialties.speciality_id = users.speciality_id 
		LEFT JOIN results on results.user_id = users.user_id
		LEFT JOIN votes on votes.candidate = users.user_id";
		$this->userData = $this->joinTables('*', $join, ['users.user_id'=>$_SESSION['user_id']], [], 'fetch');
		return $this->userData;
	}

	//problem here
	public function getSpecialties() {
		$this->getSpecialties = $this->selectInfo('*', 'specialties');
		return $this->getSpecialties;
	}
	
	// validation updates
	public function updatesValidation($data) {

		if(strlen($data['username']) <= 4) {
			$this->errors[] = "Username should be greater than 4 caracteres";
		}

		if($this->selectInfo('*', 'users', ['username'=>$data['username']])) {
			$this->errors[] = "Username already exist";
		}

		if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = "Email is not valid";
		}
		
		if(strlen($data['password']) <= 4) {
			$this->errors[] = "Password should be greater than 4 caracteres";
		}

	}
	
	// Start Updates
	public function updateProfile($data, $files = []) {
		//before we update
		$beforeUpdate = $this->getProfile($_SESSION['user_id']);
		
		// updates
		$this->updateInformationProfile($data);
		$this->updateImageProfile($files);

		$afterUpdate = $this->getProfile($_SESSION['user_id']);

		// show success updates
		$this->successUpdates(array_diff($beforeUpdate, $afterUpdate));
		$this->sessionUpdate($afterUpdate);

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
					$this->errors[] = "Sorry, your file large than [ " . formatSizeUnits($allowed_size) . " ] it's [ " . formatSizeUnits($img_size) . " ]";
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
						$this->updateInfo('users', ['user_img'=>$new_img_name], ['user_id'=>$_SESSION['user_id']]);
					} else {
						$this->errors[] = "Your Image Should Not Be Out Of This Types [ " . join(', ', $allowed_extensions) . " ]";
					}

				}
			} else {
				$this->errors[] = "Unknown Error Occurred!";
			}
    }
	}

	public function updateInformationProfile($data) {
		$updates = [
			'email'=>$data['email'],
			'full_name'=>$data['FullName'],
			'address'=>$data['address'],
			'description' => $data['description'],
			'country'=>$data['country'],
			'number'=>$data['number']
		];
		
		if($this->selectInfo('*', 'users', ['username'=>$data['username']], ['user_id'=>$_SESSION['user_id']], 'rowCount') === 0) { 
			$updates['username'] = $data['username'];

		} else {
			$this->errors[] = "Username already exist";
		}

		if(!empty($data['password'])) {
			$updates['password'] = sha1($data['password']);
		}

		if ($data['speciality_id'] > 0) {
			$updates['speciality_id'] = $data['speciality_id'];
		}

		$this->updateInfo('users', $updates, ['user_id'=>$_SESSION['user_id']]);
	}
	// End Updates

	public function deleteUser() {
		$this->deleteInfo('users', ['user_id'=>$_SESSION['user_id']]);
	}

	/* do not include files */
	public function successUpdates(array $updates) {
		$successMesseges = [
			'username' => 'Username Updated',
			'email' => 'Email Updated',
			'full_name' => 'Full Name Updated',
			'password' => 'Password Updated',
			'user_img' => 'Image Updated',
			'address' => 'Address Updated',
			'description' => 'Description Updated',
			'country' => 'Country Updated',
			'number' => 'Number Updated',
			'speciality' => 'speciality Updated'
		];

		foreach($updates as $column => $value) {
			if (in_array($column, $this->changeableInformation)) {
				$this->success[] = $successMesseges["$column"];
			}
		}

	}

	public function addProject($id, $data) {
		if(checkUrlExist($data['project'])) {
			$this->insertInfo('votes', ['candidate'=>$id, 'project'=>$data['project'], 'description_project'=>$data['description']]);
			$this->success[] = 'Project Added';
			return true;
		}
		$this->errors[] = 'Url Do Not Exist';
		return false;

	}

	public function sessionUpdate($data) {
		$_SESSION['username'] = $data['username'];
		$_SESSION['user_img'] = $data['user_img'];
	}

}