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
			$didVtedBefore = $vote->didVoteBefore();

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
		$didVtedBefore = $vote->didVoteBefore();
		if (!$didVtedBefore) {
			$vote->addVote($_GET['candidate']);
		}
		header("Location: " . ROOT . "/vote");
		exit();
	}

}
