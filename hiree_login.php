<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start(); 
include("cookie.php");
include("session.php");
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

				</div>
			</div>
		</div>
	</header>
	<div class="main form">
		<form action="hiree_logged.php" method="post">
			<h2>Hiree Login</h2>
  			<div class="form-group">
    			<label for="username">Username:</label>
    			<input type="text" class="form-control" id="username" name="username" required>
    			<p class="error"  id="error" style="display:none;color:red">username or password not correct</p>
  			</div>
  			<div class="form-group">
    			<label for="password">Password:</label>
    			<input type="password" class="form-control" id="password" name="password" minlength="8" required>
  			</div>
  			<div class="checkbox">
    			<label><input type="checkbox" style="width: inherit;" name="remember" value="yes">Remember me</label>
  			</div>
  			<button type="submit" class="btn btn-default">Login</button>
  			<p>not registered click <span><a href="hiree_register.php">here</a></span> to register</p>
		</form>
	</div>
	<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET['error'])){
		echo "<script>document.getElementById('error').style.display='block';</script>";
	}
}
	?>
</body>
</html>