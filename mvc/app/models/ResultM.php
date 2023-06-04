<?php
class ResultM {
	
	use Model;
	public $result = null;

	public function getNote($data) {
		$this->result = $this->selectInfo('*', 'results', ['user_id'=>$_SESSION['user_id'], 'subject'=>$data['subject']], [], 'fetch');
		return $this->result;
	}
	
	public function setNote($note, $subject) {
		$this->insertInfo('results', ['user_id'=>$_SESSION['user_id'], 'subject'=>$subject, 'result'=>$note]);
	}
}