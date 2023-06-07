<?php
class BlogM {
	
	use Model;

	protected $errors = [];
	protected $success = [];

	public function __get($get) {
		return $this->$get;
	}

	public function __set($get, $val) {
		return $this->$get = $val;
	}

	public function blogExist($blog_id) {
		return $this->selectInfo('*', 'blog', ['blog_id'=>$blog_id], [], 'rowCount');
	}


	// this used also with admin
	public function getBlogs() {
		$join = "FROM users u INNER JOIN blog b on b.author = u.user_id";
		$select = 'u.username, u.user_img, b.approve, b.blog_id, b.blog_date, b.img, b.title, b.text, b.like_count';
		$blogs = $this->joinTables($select, $join, ['b.approve'=>1], [], 'fetchAll', $order='ORDER BY b.like_count DESC');
		return $blogs;
	}

	public function getBlog($blog_id) {
		$join = "FROM users u INNER JOIN blog b on b.author = u.user_id";
		$select = 'u.username, u.user_img, b.blog_id, b.blog_date, b.img, b.title, b.text, b.like_count';
		$blog = $this->joinTables($select, $join, ['blog_id'=>$blog_id], [], 'fetch');
		return $blog;
	}

	public function addBlog($data, $files=[]) {
		if (strlen($data['text']) < 20) {
			$this->errors[] = 'Article Should Be Greater Than 20 Caractere';
		}
		if (strlen($data['text']) < 3) {
			$this->errors[] = 'Article Should Be Greater Than 3 Caractere';
		}

		// get info for upload img and inset into database
		$imgInfo = $this->addImage($files);
		
		if (empty($this->errors)) {
			$img = null;
			if (isset($imgInfo)) {
				move_uploaded_file($imgInfo['tpm_path'], $imgInfo['upload_path']);
				$img = $imgInfo['img_name'];
			}
			$this->insertInfo('blog', ['author'=>$_SESSION['user_id'], 'img'=>$img, 'title'=>$data['title'], 'text'=>$data['text']]);
			$this->success[] = 'Article Send Succefuly, Just Wait For Approvement';
		}
	}

	public function addImage($files) {
		if(isset($files['image']) && $files['image']['size']){
			$img_size = $files['image']['size'];
			$img_name = $files['image']['name'];
			$tpm_path = $files['image']['tmp_name'];
			$error = $files['image']['error'];
			if ($error === 0){
				$allowed_size = 500000;
				if ($img_size > $allowed_size){
					$this->errors[] = "Sorry, your image large than [ " . formatSizeUnits($allowed_size) . " ] it's [ " . formatSizeUnits($img_size) . " ]";
				} else {
					$img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
					$allowed_extensions = array("jpg", "jpeg", "png");

					if (in_array($img_extension, $allowed_extensions)){
						//name of image
						$new_img_name = uniqid("imageArticle-", true)."."."$img_extension";
						//path where image will be
						$img_upload_path = './uploads/'.$new_img_name;

						// send info for upload img and inset into database
						echo 'do';
						return ['tpm_path'=>$tpm_path, 'upload_path'=>$img_upload_path, 'img_name'=>$new_img_name];
					} else {
						$this->errors[] = "Image Should Not Be Out Of This Types [ " . join(', ', $allowed_extensions) . " ]";
					}

				}
			} else {
				$this->errors[] = "Unknown Error Occurred!";
			}
    }
	}

	// admin method are below this comment

	public function getAllBlogs() {
		$join = "FROM users u INNER JOIN blog b on b.author = u.user_id";
		$select = 'u.username, u.user_img, u.email, b.approve, b.blog_id, b.blog_date, b.img, b.title, b.text, b.like_count';
		$blogs = $this->joinTables($select, $join, [], [], 'fetchAll', $order='ORDER BY b.blog_id DESC');
		return $blogs;
	}

	public function approveBlog($blog_id) {
		$this->updateInfo('blog', ['approve'=>1], ['approve' => 0, 'blog_id' => $blog_id]);
		$this->success[] = "Blog [$blog_id] Aprroved";
	}

	public function addLike($blog_id) {
		// i will check if already liked this blog
		$info = ['user_id'=>$_SESSION['user_id'],  'blog_id'=>$blog_id];

		$check = $this->liked($blog_id);
		$likes = $this->selectInfo('like_count', 'blog', ['blog_id'=>$blog_id], [], 'fetch')[0];
		if ($check) {
			$new = -1 + $likes;
			$this->updateInfo('blog', ['like_count'=>$new], ['blog_id'=>$blog_id]);
			$this->deleteInfo('blog_like', $info);
			return false;
		} else {
			$this->insertInfo('blog_like', $info);
			$new = 1 + $likes;
			$this->updateInfo('blog', ['like_count'=>$new], ['blog_id'=>$blog_id]);
			return true;
		}
	}

	// tell you if you liked blog
	public function liked($blog_id) {
		$info = ['user_id'=>$_SESSION['user_id'],  'blog_id'=>$blog_id];
		$check = $this->selectInfo('*', 'blog_like', $info, [], 'rowCount');
		return $check;
	}

	//add comment
	public function addComment($comment, $blog_id) {
		$this->insertInfo('comments', ['comment'=>$comment, 'blog_id'=>$blog_id, 'user_id'=>$_SESSION['user_id']]);
		$this->success['add_comment'] = 'comment sent';
	}

	public function getComments($blog_id) {
		$join = "FROM users u INNER JOIN comments c on c.user_id = u.user_id";
		$select = 'u.username, u.user_img, c.comment, c.comment_date';
		$comments = $this->joinTables($select, $join, ['blog_id'=>$blog_id], [], 'fetchAll', 'ORDER BY c.comment_id DESC');
		return $comments;
	}

}