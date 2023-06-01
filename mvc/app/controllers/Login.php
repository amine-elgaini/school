<?php 

/**
 * home class
 */
class Login
{
	use Controller;

	private $data = [];
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
	public function index()
	{
		$user = new User();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user->login($_POST);
    }

		// Push Info To Data
		$this->data['errors'] = $user->errors;

		$this->view('login', $this->data);
	}

}
