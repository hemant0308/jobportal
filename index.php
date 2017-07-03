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
					<p id="time"></p>
				</div>
			</div>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<h2>Looking for candidates then click here</h2>
					<button class="btn btn-lg btn-primary" onclick="window.location='hiree_login.php'">candidates</button>
				</div>
				<div class="col-sm-6 col-md-6">
					<h2>Looking for jobs then click here</h2>
					<button class="btn btn-lg btn-primary" onclick="window.location='seeker_login.php'">jobs</button>
				</div>
			</div>
		</div>
		
	</div>
</body>