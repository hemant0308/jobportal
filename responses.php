<?php
session_start();
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
if(isset($_SESSION) && isset($_GET['id'])){
	require("Database.php");
	$id = $_GET['id'];
	$query = "SELECT * FROM SeekerJobs INNER JOIN Seeker ON Seeker.SeekerUserName=SeekerJobs.SeekerUserName WHERE JobId = '$id';";
	echo $query;
	$res = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>JobPortal</title>
</head>
<body>
	<header>
		<div class="fluid-container">
			<div class="row">
				<div class="col-md-3 col-sm-3 logo">
					<a href="index.php"><img src="images/logo.png"></a>
				</div>
				<div class="col-md-6 col-sm-6 heading">
					<h1>
						Job Portal
					</h1>
				</div>
				<div class="col-md-3 col-sm-3 date">
					<p id="time"></p>
				</div>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<div class="row">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name:</th>
							<th>Email:</th>
							<th>Phone</th>
							<th>Resume</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row = mysqli_fetch_array($res)){
						?>
						<tr>
							<td><?php echo $row['Name']; ?></td>
							<td><?php echo $row['Email']; ?></td>
							<td><?php echo $row['Phone']; ?></td>
							<td><?php echo $row['Resume']; ?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</body>
</html>
<?php } ?>