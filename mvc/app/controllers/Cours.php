<?php 

/**
 * home class
 */
class Cours
{
	use Controller;

	public function index()
	{
		$filename = "./../app/files/js_course.txt";
		$file = fopen($filename, "r");
		$filesize = filesize($filename);
		$data['cours'] = $file;
		$this->view('cours', $data);
	}

}
