<?php 

class Edit
{
	use Controller;

	private $data = [];

	public function index()
	{
		$user = new User;
		
		//Update Current Data
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user->updateProfile($_POST, $_FILES);
		}
		
		//Get Current Data
		$user->getProfile();
		
		//Get Select Options
		$user->getSelectOptions();

		// Push Info To Data
		$this->data['info'] = $user->userData;
		$this->data['selectOptions'] = $user->selectOptions;
		$this->data['success'] = $user->success;
		$this->data['errors'] = $user->errors;

		$this->view('edit', $this->data);
	}

}
