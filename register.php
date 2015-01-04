<?php 

//check if user has an active session

//check if cookie exists for user

//show registration form

require_once('./app/controllers/_functions.php');

try {
	get_header();
} catch (Exception $e) {
	die($e->__toString());
}

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2>Join for Free</h2>
		</div>
	</div>
</div>
</body>
</html>