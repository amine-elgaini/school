<?php 

class Politique {
	use Controller;
	
	public $data = [];

	public function index() {
    $this->view('politique', $this->data);
	}

}