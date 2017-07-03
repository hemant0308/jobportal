<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start();
if(isset($_SESSION)){
	require("Database.php");
	$hiree_username = $_SESSION['username'];
	$hiree_password = $_SESSION['password'];
	$query = "SELECT COUNT(*) FROM Hiree WHERE HireeUserName='$hiree_username' AND Password='$hiree_password';";
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
				<div class="col-md-3 col-sm-3">
					
				</div>
			</div>
		</div>
	</header>

	<div class="main form modal" id="addjob">
		<form method="post" action="addjob.php" style="background-color: #3b1287">
			<h2>Add new Job</h2>
  			<div class="form-group">
    			<label for="username">Job Header:</label>
    			<input type="text" class="form-control" id="username" name="header" required>
    			<p class="error" id="error" style="display:none;color:red">username already existed</p>
  			</div>
  			
        <div class="form-group">
          <label for="name">Description About the job:</label>
          <textarea cols="5" class="form-control" style="height: 80px;" name="description" id="description" required></textarea>
        </div>
  			<button type="submit" class="btn btn-default">Add</button>
  			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  			
	</div>
	<div class="main">
		<div class="container">
			<div class="dropdown">
  						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $hiree_username; ?>
  						<span class="caret"></span></button>
  							<ul class="dropdown-menu">
  								<li><a href="" data-toggle="modal" data-target="#addjob">add new job</a></li>
    							<li><a href="#">profile</a></li>
    							<li><a href="loggedout.php">logout</a></li>
  							</ul>
			</div>
			<div class="jobs">
			<?php
				$query = "SELECT * FROM Jobs WHERE HireeUserName = '$hiree_username';";
				$res = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($res)){

	?>
				<div class="job">
					<div class="title">
						<h3><?php echo $row['JobHeader']; ?></h3>
					</div>
					<div class="description">
						<p><?php echo $row['JobDescription']; ?></p>
					</div>
					<button id="<?php echo $row['JobId']; ?>" onclick="window.location='responses.php?id='+this.id" class="btn btn-primary">view responses</button>
					<button id="<?php echo $row['JobId']; ?>" onclick="window.location='delete.php?id='+this.id" class="btn btn-primary">delete</button>
				</div>
	<?php
			}				

	?>
				</div>
			</div>
		</div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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