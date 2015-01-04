<?php

function get_header() {

	$file_path = './app/views/_template/header.php';
	if(!is_readable($file_path)) 
		throw new Exception("File is not readable");
				
	include_once($file_path);
}