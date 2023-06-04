<?php
class HomeM {
	
	use Model;

	protected $candidates = [];
	protected $top3Condidates = [];
	protected $success = [];
	protected $voter_id = 0;

	public function __get($get) {
		return $this->$get;
	}

	public function __set($get, $val) {
		return $this->$get = $val;
	}

  public function top3Condidates() {
    $join = "FROM users INNER JOIN votes on users.user_id = votes.candidate LEFT JOIN specialties on specialties.speciality_id = users.speciality_id";
		$this->top3Condidates = $this->joinTables('*', $join, [], [], 'fetchAll', 'ORDER BY votes.vote_count DESC', 'LIMIT 3');
		return $this->top3Condidates;
	}

}