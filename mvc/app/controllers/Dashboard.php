<?php 

class Dashboard
{
	use Controller;
	public $data = [];

	public function index() {
		$admin = new DashboardM;
		if ($admin->isAdmin()) {
			// Get Current Data
			$admin->getProfiles('fetchAll');
			
			// Push Info To Data
			$this->data['info'] = $admin->userData;
			$this->view('dashboard', $this->data);
		} else {
			header("Location: " . ROOT . "/Home");
			exit();
		}
	}

	public function edit() {
		$admin = new DashboardM;
		if ($admin->isAdmin()) {
			$id = $_GET['user_id'] ?? 0;

			//redirect if data not exist from unexist user.
			$admin->getProfile($id);
			if (!$admin->userData) {
				header("Location: " . ROOT . "/dashboard");
				exit();
			}

			//Update Current Data
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$admin->updateProfile($id, $_POST, $_FILES);
			}

			//Get Select Options
			$admin->getSpecialties();
			
			// Push Info To Data
			$this->data['info'] = $admin->userData;
			$this->data['getSpecialties'] = $admin->getSpecialties;
			$this->data['success'] = $admin->success;
			$this->data['errors'] = $admin->errors;

			$this->view('dashboardEdit', $this->data);
			// show($this->data);
		} else {
			header("Location: " . ROOT . "/Home");
			exit();
		}
	}

	public function add() {
		$admin = new DashboardM;
		if ($admin->isAdmin()) {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$didAdd = $admin->addProfile($_POST);
				if ($didAdd) {
					header("Location: " . ROOT . "/dashboard?add=added");
					exit();
				}
			}

			//Get Select Options
			$admin->getSpecialties();
			
			// Push Info To Data
			$this->data['getSpecialties'] = $admin->getSpecialties;
			$this->data['errors'] = $admin->errors;

			$this->view('dashboardAdd', $this->data);
		} else {
			header("Location: " . ROOT . "/Home");
			exit();
		}
	}

	public function delete() {
		$admin = new DashboardM;
		if ($admin->isAdmin()) {
			$id = $_GET['user_id'] ?? 0;
			$admin->deleteUser($_GET['user_id']);
			header("Location: " . ROOT . "/dashboard?delete=$id");
			exit();

		} else {
			header("Location: " . ROOT . "/Home");
			exit();
		}
	}

	public function approveArticle() {
		$admin = new DashboardM;
		if ($admin->isAdmin()) {
			
			$blog = new BlogM;

			// add approve article
			$blog_id = intval($_GET['blog'] ?? 0) ? $_GET['blog'] : 0;
			if ($blog->blogExist($blog_id )) {
				$blog->approveBlog($blog_id);
			}

			// show articles
			$this->data['blogs'] = $blog->getAllBlogs();
			
			// Push Info To Data
			$this->data['success'] = $blog->success;
			$this->data['errors'] = $blog->errors;

			$this->view('approveArticle', $this->data);
		} else {
			header("Location: " . ROOT . "/Home");
			exit();
		}
	}

}
