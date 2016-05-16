<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Task</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Edit your task</h1>
		</div>
		<div class="row col-sm-4">
			<form action="/Appointments/edit" class="form-horizontal" method="post" >
					<div class="form-group">
						<label for="">Date</label>
						<input type="date" name="date" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Time</label>
						<input type="time" name="time"class="form-control">
					</div>
					<div class="form-group">
						<label for="">Task</label>
						<input type="text" name="task" class="form-control">
					</div>
					<div class="formgroup">
						<input type="submit" value="Update" class="btn btn-warning">
					</div>
				</form>
		</div>
	</div>
	
</body>
</html>