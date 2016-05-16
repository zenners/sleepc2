<?php 

date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d 00:00:00');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Appointments</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Hello, <?=$this->session->userdata('user_name')?></h1>
		<a href="/Users/logout">logout</a>
		
		<div class="row col-sm-6">
			<H4>Here are your appointments for today, <?=date('F d, Y',strtotime($date))?></H4>
			<table class="table">
				<thead>
					<tr>
						<th>Tasks</th>
						<th>Time</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				$date = date('Y-m-d 00:00:00');
				foreach ($apts as $apt)
				{ 
					if ($date == $apt['date'])
					{ 
			?>
						<tr>
							<td><?=$apt['task']?></td>
							<td><?=$apt['time']?></td>
							
							<td>
								<select name="" id="" class="form-control">
									<option value="Pending">Pending</option>
									<option value="Done">Done</option>
									<option value="Missed">Missed</option>
								</select>
							</td>

							<td><a href="/Appointments/edit">Edit</a></td>
							<form action="/Appointments/delete_apt" method="post">
							<input type="hidden" name = "id"value="<?=$apt['id']?>">

							<td><input class="btn btn-danger"type="submit" value="Delete"></td>
							</form>
						</tr>
			<?php 
					}

				}
			?>
				
				</tbody>
			</table>
		</div>
		<div class="row col-sm-6">
			<h4>Your other appointments</h4>
			<table class="table">
				<thead>
					<tr>
						<th>Tasks</th>
						<th>Time</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				$date = date('Y-m-d 00:00:00');
				foreach ($apts as $apt)
				{ 
					
					if ($date != $apt['date'])
					{ 
			?>
						<tr>
							<td><?=$apt['task']?></td>
							<td><?=$apt['time']?></td>
							<td><?=date('F d, Y',strtotime($apt['date']));?></td>
							
				
						</tr>
			<?php 
					}

				}
			?>
				</tbody>
			</table>
		</div>
		<div class="row col-sm-4">
			<h4>Add Appointment</h4>
			<?php 
					 if($this->session->flashdata("apt_error")) 
					 {
					  	echo $this->session->flashdata("apt_error");
					 }
					 
				 ?>
			<form action="/Appointments/add" class="form-horizontal" method="post">
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
					<input type="submit" value="Add" class="btn btn-warning">
				</div>
			</form>
		</div>
	</div>
</body>
</html>