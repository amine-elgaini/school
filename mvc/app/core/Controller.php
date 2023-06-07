<?php 

//we use this file for common function between controllers
Trait Controller
{

	public function view($name, $data = []) {
		$filename = "../app/views/".$name.".view.php";
		$page_name = $name;
		require file_exists($filename) ? $filename : "../app/views/404.view.php";//body
		$footer_page = ['home', 'cours', 'vote', 'readBlog', 'blog'];
		if (in_array($page_name, $footer_page)) {
			require "../app/views/inc/footer.view.php";
		}
		require "../app/views/inc/dark_mode.view.php";
	}

}
