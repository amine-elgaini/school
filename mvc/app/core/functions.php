<?php 

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function formatSizeUnits($bytes) {
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	}
	elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	}
	elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	}
	elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	}
	elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	}
	else {
		$bytes = '0 bytes';
	}
	return $bytes;
}

/* 
check if url exist
*/
function checkUrlExist($url) {
	if (!empty($url)) {
		// Use get_headers() function
		$headers = @get_headers($url);
	
		// Use condition to check the existence of URL
		if($headers && strpos( $headers[0], '200')) {
			return true;
		}
	}
	return false;
}