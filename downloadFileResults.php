<?php
	$file = $_GET['name'];

	if (file_exists('result.txt')) 
	{
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename='.basename($file));
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize('result.txt'));
	    readfile('result.txt');
	}
?>