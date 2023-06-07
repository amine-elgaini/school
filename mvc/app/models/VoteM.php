<?php
class VoteM {
	
	use Model;

	protected $candidates = [];
	protected $top3Condidates = [];
	protected $success = [];

	public function __get($get) {
		return $this->$get;
	}

	public function __set($get, $val) {
		return $this->$get = $val;
	}

	public function getCandidates() {
    $join = "FROM users INNER JOIN votes on users.user_id = votes.candidate LEFT JOIN specialties on specialties.speciality_id = users.speciality_id";
		$this->candidates = $this->joinTables('*', $join, [], [], 'fetchAll', 'ORDER BY votes.vote_count DESC');
		return $this->candidates;
	}

	public function votedON(){
		return $this->selectInfo('voteOn', 'users', ['user_id'=>$_SESSION['user_id']], [], $action='fetch');
	}

	// Start Updates
	function didVoteBefore() {
		$didVoteBefore = $this->selectInfo('*', 'users', ['user_id'=>$_SESSION['user_id']], ['voteOn'=>0], $action='rowCount') ? true : false;
		return $didVoteBefore;
	}

	public function addVote($candidate) {
		$vote = $this->selectInfo('vote_count', 'votes', ['candidate'=>$candidate], [], $action='fetch')['vote_count'] ?? 0;
		$voteUpdate = $vote + 1;
		$this->updateInfo('votes', ['vote_count'=>$voteUpdate], ['candidate'=>$candidate]);
		$this->updateInfo('users', ['voteOn'=>$candidate], ['user_id'=>$_SESSION['user_id']]);
	}

}