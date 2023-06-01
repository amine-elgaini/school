<?php 

class Vote
{
	use Controller;

	public function index()
	{
		$this->view('vote');
	}

}
