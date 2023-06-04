<?php 

class Vote
{
	use Controller;
	public $data = [];

	public function index()
	{
		if (isset($_SESSION['user_id'])) {
			$vote = new VoteM;
			$vote->getCandidates();
			$this->data['candidates'] = $vote->candidates;
			$didVtedBefore = $vote->didVoteBefore($_SESSION['user_id']);

			$this->data['didVote'] = false;
			if ($didVtedBefore) {
				$this->data['didVote'] = $vote->votedON();;
			}
			$this->view('vote', $this->data);
		} else {
			header("Location: " . ROOT . "/Login");
			exit();
		}
	}

	public function voted() {
		$vote = new VoteM;
		$didVtedBefore = $vote->didVoteBefore($_SESSION['user_id']);
		if (!$didVtedBefore) {
			$vote->addVote($_SESSION['user_id'], $_GET['candidate']);
		}
		header("Location: " . ROOT . "/vote");
		exit();
	}

}
