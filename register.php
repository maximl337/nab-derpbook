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

		<div class="col-md-12">
			
			<form role="form" id="register_form">
				
				<div class="form-group">
					<label for="first_name">Email address</label>
					<input type="text" class="form-control" id="first_name" placeholder="First Name">
				</div>

				<div class="form-group">
					<label for="last_name">Password</label>
					<input type="text" class="form-control" id="last_name" placeholder="Last Name">
				</div>

				<div class="form-group">
					<label for="email">Password</label>
					<input type="email" class="form-control" id="email" placeholder="Email">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>

			</form>

		</div>
	</div>
</div>
</body>
</html>