<?php 


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log In and Registration</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Welcome</h1>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-2">
				<h2>Register</h2>
				
				<?php  
					if($this->session->flashdata("registration_error"))
					 {
					 	echo $this->session->flashdata("registration_error");
					 }

					 elseif($this->session->flashdata("added_user"))
					 {
					 	echo $this->session->flashdata("added_user");
					 }
				 ?>

				<form action="/Users/register" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="name" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="email" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" name="confirm_password" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Date of Birth</label>
						<input type="date" name="birthdate" id="" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" value="Register" class="btn btn-primary pull-right">
					</div>
				</form>
			</div>
			<div class="col-sm-4 col-sm-offset-2">
				<h2>Log In</h2>
				
				<?php 
					 if($this->session->flashdata("login_error")) 
					 {
					  	echo $this->session->flashdata("login_error");
					 }
					 
				 ?>

				<form action="/Users/login" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" name="email" id="" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" id="" class="form-control">
					</div>
					<div class="form-group"><input type="submit" value="Log in" class="btn btn-success pull-right"></div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>