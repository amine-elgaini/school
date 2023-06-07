<?php 

class Contact
{
	use Controller;
	
	public $data = [];

	public function index() {

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (!empty($_POST['email']) && !empty($_POST['message'])) {
					$filename = fopen("./../app/files/contact.txt", "a");
					$message = $_POST['email']."\n".$_POST['message']."\n";
					fwrite($filename, $message);
					fclose($filename);
				} else {
					$this->data['errors'] = 'Information Should Not Be Empty';
				}
			}

			$this->view('contact', $this->data);
	}

}
