<?php

function get_db()
{
	
	/*** mysql hostname ***/
	$hostname = 'localhost';

	/*** mysql username ***/
	$username = 'root';

	/*** mysql password ***/
	$password = 'root';

	/*** DB name ***/
	$dbname = 'derpbook';

	try {
		$options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
	$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password, $options);
	//$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	} catch (PDOException $e) {

		die($e->toString());

	}

	return $dbh;
}

function get_header() {

	$file_path = './app/views/_template/header.php';
	if(!is_readable($file_path)) 
		throw new Exception("File is not readable");
				
	include_once($file_path);
}

function make_username($first_name, $last_name)
{
	$dbh = get_db();

	$sql = "SELECT * FROM `members` WHERE `username` LIKE :username";
	$query = $dbh->prepare($sql);
	$query->execute( array(':username' => '%'.$first_name.'-'.$last_name ));
		
	$members = $query->fetchAll(); 

	$username_count = count($members);

	if ($username_count) {
		$username = $first_name.'-'.$last_name.'-'.$username_count;
	} else {
		$username = $first_name.'-'.$last_name;
	}

}

function add_member($first_name, $last_name, $email, $password)
{
	# code...
}

function add_username($username) {

}