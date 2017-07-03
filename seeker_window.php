<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start(); 
if(isset($_SESSION)){
	require("Database.php");
	$seeker_username = $_SESSION['username'];
	$seeker_password = $_SESSION['password'];
	$query = "SELECT COUNT(*) FROM Seeker WHERE SeekerUserName='$seeker_username' AND Password='$seeker_password';";
			//echo $query;
			$res = mysqli_query($con,$query);
			$row = mysqli_fetch_array($res);
			if($row[0]==1){
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
				<div class="col-md-3 col-sm-3 user">
					
				</div>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<div class="dropdown">
  						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $seeker_username; ?>
  						<span class="caret"></span></button>
  							<ul class="dropdown-menu">
    							<li><a href="#">profile</a></li>
    							<li><a href="loggedout.php">logout</a></li>
  							</ul>
				</div>
			<div class="jobs">
			<?php
				$query = "SELECT * FROM Jobs INNER JOIN Hiree ON Jobs.HireeUserName =  Hiree.HireeUserName WHERE JobId NOT IN (SELECT JobId FROM SeekerJobs WHERE SeekerUserName = '$seeker_username');";
				$res = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($res)){
			?>
				<div class="job">
					<div class="title">
						<h3><?php echo $row['JobHeader'] ?></h3>
					</div>
					<div class="description">
						<p><?php echo $row['JobDescription']; ?></p>
					</div>
					<div style="color: #35e509">
						<p>Hiree Name : <span><?php echo $row['Name']; ?></span></p>
						<p>Hiree Website : <span><?php echo $row['Website']; ?></span></p>
					</div>
					<button id="<?php echo $row['JobId']; ?>" class="btn btn-primary" onclick = "window.location='apply.php?id='+this.id">apply</button>
				</div>
			<?php 
				}
				$query = "SELECT * FROM Jobs INNER JOIN Hiree ON Jobs.HireeUserName =  Hiree.HireeUserName WHERE JobId IN (SELECT JobId FROM SeekerJobs WHERE SeekerUserName = '$seeker_username');";
				$res = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($res)){
			?>
			<div class="job">
					<div class="title">
						<h3><?php echo $row['JobHeader'] ?></h3>
					</div>
					<div class="description">
						<p><?php echo $row['JobDescription']; ?></p>
					</div>
					<div style="color: #35e509">
						<p>Hiree Name : <span><?php echo $row['Name']; ?></span></p>
						<p>Hiree Website : <span><?php echo $row['Website']; ?></span></p>
					</div>
					<button id="<?php echo $row['JobId']; ?>" class="btn btn-primary" disabled>already applied</button>
				</div>
			<?php 
				} ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		
	</script>
</body>
</html>
<?php 
}
else{
		session_destroy();
		header("Location:index.php");
		echo "password not correct";
	}
}
else{
	echo "session problem";
	header("Location:index.php");
}
?>