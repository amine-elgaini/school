<?php
class DashboardM {
	
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

	function isAdmin() {
		if (isset($_SESSION['user_id']))
			return $this->selectInfo('*', 'users', ['groupe_id' => 1, 'user_id' => $_SESSION['user_id']]);
	}

	public function addProfile($data) {
		$add = [
			'email'=>$data['email'],
			'full_name'=>$data['FullName'],
			'address'=>$data['address'],
			'description' => $data['description'],
			'country'=>$data['country'],
			'register_date' => date("Y-m-d")
		];
		
		if($this->selectInfo('*', 'users', ['username'=>$data['username']], [], 'rowCount') === 0) {

			if(strlen($data['username']) <= 4) {
				$this->errors[] = "Username should be greater than 4 caracteres";
			} else {
				$add['username'] = $data['username'];
			}
			
		} else {
			$this->errors[] = "Username already exist";
		}

		if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = "Email is not valid";
		}
		
		if ($data['number'] < 12) {
			$add['number'] = $data['number'];
		} else {
			$this->errors[] = "Number Not True";
		}

		if ($data['password'] > 4) {
			$data['password'] = sha1($data['password']);
		} else {
			$this->errors[] = "Password Should Be Greater Than 4";
		}
		
		if ($data['speciality_id'] > 0) {
			$add['speciality_id'] = $data['speciality_id'];
		} else {
			$this->errors[] = "Speciality Not Exist";
		}

		if (empty($this->errors)) {
			$res = $this->insertInfo('users', $add);
			return $res;
		}
	}

	public function getProfile($id) {
		$select = 'u.user_id, u.username, u.full_name, u.country, u.email, u.user_img, speciality, specialties.speciality_id, u.address, u.description, result, u.number, results.result, u.register_date';
		$join = "FROM users u
		LEFT JOIN specialties on specialties.speciality_id = u.speciality_id 
		LEFT JOIN results on results.user_id = u.user_id
		LEFT JOIN votes on votes.candidate = u.user_id";
		$this->userData = $this->joinTables($select, $join, ['u.user_id'=>$id, 'groupe_id'=>0], [], 'fetch');
		return $this->userData;
	}

	public function getProfiles() {
		$select = 'u.user_id, u.username, u.full_name, u.email, speciality, u.address, u.description, result, u.number, results.result, u.register_date';
		$join = "FROM users u
		LEFT JOIN specialties on specialties.speciality_id = u.speciality_id 
		LEFT JOIN results on results.user_id = u.user_id
		LEFT JOIN votes on votes.candidate = u.user_id";
		$this->userData = $this->joinTables($select, $join, ['groupe_id'=>0]);
		return $this->userData;
	}

	// //problem here
	public function getSpecialties() {
		$this->getSpecialties = $this->selectInfo('*', 'specialties');
		return $this->getSpecialties;
	}


	// // Start Updates
	public function updateProfile($id, $data, $files = []) {
		//before we update
		$beforeUpdate = $this->getProfile($id);


		// updates
		$this->updateInformationProfile($id, $data);
		$this->updateImageProfile($id, $data, $files);

		$afterUpdate = $this->getProfile($id);

		// show($beforeUpdate);
		// show($afterUpdate);
		
		// show success updates
		$this->successUpdates(array_diff($beforeUpdate, $afterUpdate));

	}

	public function updateImageProfile($id, $data, $files) {
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
						$res = $this->updateInfo('users', ['user_img'=>$new_img_name], ['user_id'=>$id, 'groupe_id'=>0]);
					} else {
						$this->errors[] = "Your Image Should Not Be Out Of This Types [ " . join(', ', $allowed_extensions) . " ]";
					}

				}
			} else {
				$this->errors[] = "Unknown Error Occurred!";
			}
    }
	}

	public function updateInformationProfile($id, $data) {
		$updates = [
			'email'=>$data['email'],
			'full_name'=>$data['FullName'],
			'address'=>$data['address'],
			'description' => $data['description'],
			'country'=>$data['country'],
			'number'=>$data['number']
		];
		
		if($this->selectInfo('*', 'users', ['username'=>$data['username']], ['user_id'=>$id], 'rowCount') === 0) {
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

		$this->updateInfo('users', $updates, ['user_id'=>$id, 'groupe_id'=>0]);
	}
	// // End Updates

	public function deleteUser($id) {
		$this->deleteInfo('users', ['user_id'=>$id, 'groupe_id'=>0]);
	}

	// /* do not include files */
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

}