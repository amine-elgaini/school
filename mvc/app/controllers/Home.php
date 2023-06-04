<?php 

class Home
{
	use Controller;
	public $data = [];

	public function index()
	{
		$vote = new HomeM;
		$vote->top3Condidates();
		$data['top3'] = $vote->top3Condidates;
		$this->view('home', $data);
	}

}
