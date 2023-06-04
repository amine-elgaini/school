<?php 

class Login
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
			$user->login($_POST);
    }

		// Push Info To Data
		$this->data['errors'] = $user->errors;

		$this->view('login', $this->data);
	}

}
