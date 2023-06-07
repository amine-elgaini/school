<?php
class LoginM {
	
	use Model;

	protected $errors = [];
	protected $success = [];

	public function __get($get) {
		return $this->$get;
	}

	public function __set($get, $val) {
		return $this->$get = $val;
	}

	public function login($data) {

		// check if the user exist in db
		$this->validateLogin(['username'=>$data['username'], 'password'=>$_POST['password']]);
		$user = $this->selectInfo('*', 'users', ['username'=>$data['username'], 'password'=>sha1($data['password'])], [], 'fetch');
		if (!$user) {
			$this->errors[] = 'Sorry, Wrong Login';
		}
		// Go To HomePage if user exist
		if(empty($this->errors) && $user) {
			$_SESSION['isAdmin'] = $user['groupe_id'] == 1 ? true : false;
			$_SESSION['username']    = $user['username'];
			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['user_img'] = $user['user_img'];
			header('Location: ' . ROOT . '/home');
			exit();
		}
	}

	
	public function validateLogin($data) {

		if(strlen($data['username']) <= 4) {
			$this->errors[] = "Username should be greater than 4 caracteres";
		}
		
		if(empty($data['password']))
			$this->errors[] = "Password is required";

	}
		
	public function register($data) {
		$this->validateRegister(['username'=>$data['username'], 'email'=>$data['email'], 'password'=>$data['password']]);
		// Go To HomePage if user exist
		if(empty($this->errors)) {
			$this->insertInfo('users', ['username'=>$data['username'], 'email'=>$data['email'],'password'=>sha1($data['password']), 'register_date'=>date("Y-m-d")]);
			$this->success['registration'] = 'You Are Register Now Go For Login';
		}
	}
		
	public function validateRegister($data) {

		if(strlen($data['username']) <= 4) {
			$this->errors[] = "Username should be greater than 4 caracteres";
		}

		if($this->selectInfo('*', 'users', ['username'=>$data['username']])) {
			$this->errors[] = "Username already exist";
		}

		if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
			$this->errors[] = "Email is not valid";
		
		if(empty($data['password']))
			$this->errors[] = "Password is required";

	}

}