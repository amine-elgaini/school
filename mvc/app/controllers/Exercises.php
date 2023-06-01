<?php 

class Exercises
{
	use Controller;
	
	public $subject = 'front_end';
	public $data = [];

	public function index()
	{
		$note = new Notes;
		$res = $note->selectInfo('note', 'notes', ['user_id'=>$_SESSION['user_id'], 'subject'=>$this->subject], [], 'fetch');
		$this->data['subject'] = $this->subject;
		
		//if already exist
		if (isset($res['note'])) {
			$this->data['note'] = $res['note'];
		}
		
		//if not exist
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$res) {
			$this->data['subject'] = $this->subject;
			$this->data['note'] = $_POST['note'];
			$note->addNote($this->data);
		}
		$this->view('exercises', $this->data);
	}
}
