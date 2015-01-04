<?php 

//check if user has an active session

//check if user has a cookie set

//display landing page if no cookie or session found
require_once('./app/controllers/_functions.php');

try {
	get_header();
} catch (Exception $e) {
	die($e->__toString());
}

/*$dbh = get_db();

$sql = "SELECT * FROM `members` WHERE `username` LIKE :username";
$query = $dbh->prepare($sql);
$query->execute( array(':username' => '%'.$first_name.'-'.$last_name ));
		
$members = $query->fetchAll(); */

?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center"> Welcome to Derpbook</h2>
			</div>
			
			<hr />

			<div class="col-md-12 text-center">
				<a href="register.php" class="btn btn-primary">Register</a> 
				OR 
				<a href="login.php" class="btn btn-primary">Login</a>
			</div>
		</div>
	</div>
</body>
</html>