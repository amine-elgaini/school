<?php 

/**
 * home class
 */
class Home
{
	use Controller; //we inherit trait

	public function index()
	{
		$this->view('home');
	}

}
