<?php 

class DashboardContact
{
	use Controller;
	
	public $data = [];

	public function index() {
		$filename = "./../app/files/contact.txt";
		$file = fopen($filename, "r");
		$this->data['contact'] = $file;
    $this->view('dashboardContact', $this->data);
	}

}
