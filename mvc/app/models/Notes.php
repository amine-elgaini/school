<?php
class Notes {
	
	use Model;

	protected $table = 'notes';
	/* 
	--------notes
	user_id
	note
	subject
	*/

	public function addNote($data) {
		if(!$this->selectInfo('*', 'notes', ['user_id'=>$_SESSION['user_id'], 'subject'=>$data['subject']], 'rowCount')) {
			$this->insertInfo('notes', ['user_id'=>$_SESSION['user_id'], 'subject'=>$data['subject'], 'note'=>$data['note']]);
		}
	}
}