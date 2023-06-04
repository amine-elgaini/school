<?php 

class Exercises
{
	use Controller;
	
	public $subject = 'front_end';
	public $data = [];

	public function index()
	{
		$result = new ResultM;
		$this->data['subject'] = $this->subject;

		$result->getNote($this->data);

		if (isset($result->result['result'])) {
			$this->data['note'] = $result->result['result'];
			
		} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($result->result['result'])) {
			$result->setNote($_POST['note'], $this->subject);
			$result->getNote($this->data);
			$this->data['note'] = $result->result['result'];
		}

		$this->view('exercises', $this->data);
	}
}
