<?php 

class Profile
{
	use Controller;

	public $data = [];

	public function index() {
		if (isset($_SESSION['username'])) {
			$user = new ProfileM;
	
			//add project
			if (isset($_POST['project'])) {
				$user->addProject($_SESSION['user_id'], $_POST);
			}
				
			// //Get Current Data
			$user->getProfile($_SESSION['user_id']);
			
			// // Push Info To Data
			$this->data['info'] = $user->userData;
			$this->data['blogs'] = $user->getUserBlogs();
			$this->data['success'] = $user->success;
			$this->data['errors'] = $user->errors;
			$this->view('profile', $this->data);
		} else {
			header('Location: '.ROOT.'\login');
			exit;
		}
	}

	public function edit() {
	if (isset($_SESSION['username'])) {
		$user = new ProfileM;
		
		//Update Current Data
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user->updateProfile($_POST, $_FILES);
		}
		
		//Get Current Data
		$user->getProfile($_SESSION['user_id']);
		
		//Get Select Options
		$user->getSpecialties();

		// Push Info To Data
		$this->data['info'] = $user->userData;
		$this->data['getSpecialties'] = $user->getSpecialties;
		$this->data['success'] = $user->success;
		$this->data['errors'] = $user->errors;

		$this->view('editProfile', $this->data);
	} else {
		header('Location: '.ROOT.'\login');
		exit;
	}
	}

}
