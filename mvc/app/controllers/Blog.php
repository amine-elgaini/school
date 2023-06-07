<?php 

class Blog {
	use Controller;
	
	public $data = [];

	public function index() {
		$blog = new BlogM;
		$this->data['blogs'] = $blog->getBlogs();
    $this->view('blog', $this->data);
	}

	public function read() {
		$blog = new BlogM;
		$blog_id = intval($_GET['blog'] ?? 0) ? $_GET['blog'] : 0;
		if ($blog->blogExist($blog_id )) {
			if (isset($_GET['like']) && isset($_SESSION['username'])) {
				if (isset($_SESSION['user_id'])) {
					// if he is like know it will be true
					$liked = $blog->addLike($blog_id);
					header('Location: '.ROOT."/blog/read?blog=$blog_id");
					exit;
				}
			}
			if (isset($_POST['comment'])) {
				$blog->addComment($_POST['comment'], $blog_id);
				$this->data['add_comment'] = $blog->success['add_comment'];
			}

			//get comments
			$this->data['comments'] = $blog->getComments($blog_id);
			
			$this->data['blog'] = $blog->getBlog($blog_id);
			if (isset($_SESSION['username'])) {
				$this->data['liked'] = $blog->liked($blog_id);
			}
		} else {
			header('Location: '.ROOT.'/blog');
			exit;
		}
		$this->view('readBlog', $this->data);
	}

	public function add() {
		$blog = new BlogM;
		$id = $_SESSION['user_id'];
		if (isset($_SESSION['user_id'])) {
			if ($_SERVER['REQUEST_METHOD']==='POST') {
				$blog->addBlog($_POST, $_FILES);
			}
		} else {
			header('Location: '.ROOT.'/blog');
			exit;
		}
		$this->data['errors'] = $blog->errors;
		$this->data['success'] = $blog->success;
    $this->view('addBlog', $this->data);
	}

}