<?php 

class Register
{
	use Controller;

	private $data = [];

  public function index() {
		// redirect if loged in
		if (isset($_SESSION['username'])) {
			header('Location: ' . ROOT . '/home');
			exit();
		}

		$user = new LoginM();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user->register($_POST);
    }

		$this->data['errors'] = $user->errors;
		//it will be just one message
		$this->data['registration'] = $user->success;
		$this->view('register', $this->data);
	}

}

