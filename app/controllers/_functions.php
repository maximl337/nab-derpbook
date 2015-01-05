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

	return $username;

}

function add_member($first_name, $last_name, $email, $password)
{

	$dbh = get_db();

	$first_name = strip_tags($first_name);
	$last_name = strip_tags($last_name);
	$email = strip_tags($email);
	$password = sha1(strip_tags($password));

	$sql = "INSERT INTO `members` (`first_name`, `last_name`, `email`, `password`) VALUES (:first_name, :last_name, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':email' => $email, ':password' => $password));

    $member_id =  $dbh->lastInsertId();

    $username = make_username($first_name, $last_name);

    add_username($username, $member_id);

    return $member_id;


}

function add_username($username, $member_id) {

	$dbh = get_db();

	$username = strip_tags($username);
	$member_id = strip_tags($member_id);

	$sql = "UPDATE `members` SET 
				`username` = :username
				WHERE 
				`id` = :member_id";
	$query = $dbh->prepare($sql);
	$query->execute(array(':username' => $username, ':member_id' => $member_id));


}