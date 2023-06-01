<?php 

class Register
{
	use Controller;
	/* 
	user_id
	username
	name
	email
	password
	groupe_id
	register_date
	user_img
	work
	*/
	private $data = [];

  public function index() {
		$user = new User();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user->register($_POST);
    }

		$this->data['errors'] = $user->errors;
		//it will be just one message
		$this->data['registration'] = $user->success['registration'] ?? null;

		$this->view('register', $this->data);
	}

}

