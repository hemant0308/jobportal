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
	<div class="main form">
		<form method="post" action="hiree_registeration.php" onsubmit="verify_password();>
			<h2>Hiree Registration</h2>
  			<div class="form-group">
    			<label for="username">Username:</label>
    			<input type="text" class="form-control" id="username" name="username" required>
    			<p class="error" id="error" style="display:none;color:red">username already existed</p>
  			</div>
  			<div class="form-group">
    			<label for="name">Name:</label>
    			<input type="text" class="form-control" id="name" name="name" required>
  			</div>
  			<div class="form-group">
    			<label for="email">Email address:</label>
    			<input type="email" class="form-control" id="email" name="email" required >
  			</div>
  			<div class="form-group">
    			<label for="phone">Phone Number:</label>
    			<input type="phone" class="form-control" id="phone" name="phone" required>
  			</div>
  			<div class="form-group">
    			<label for="password">Password:</label>
    			<input type="password" class="form-control" id="password" name="password" onblur="verify_password()" required><p id="pass_error" class="error" style="display:none;color:red">passwords not match</p>
  			</div>
  			<div class="form-group">
    			<label for="password_copy">Renter Password:</label>
    			<input type="password" class="form-control" id="password_copy" onblur="verify_password()" required >
  			</div>
        <div class="form-group">
          <label for="company">Company Name :</label>
          <input type="text" class="form-control" id="company" name="company" required>
        </div>
        <div class="form-group">
          <label for="name">Description About the company :</label>
          <textarea cols="5" style="height: 80px;" name="description" id="description" required></textarea>
        </div>
        <div class="form-group">
          <label for="website">Website :</label>
          <input type="text" class="form-control" id="website" name="website" required>
        </div>
  			<button type="submit" class="btn btn-default">Register</button><p>already registered click <span><a href="hiree_login.html">here</a></span> to login</p>
		</form>
	</div>
</body>
<script type="text/javascript">
    function verify_password(){
      var pass = document.getElementById("password");
      var pass_copy = document.getElementById("password_copy");
      var pass_error = document.getElementById("pass_error");
      if(pass_copy.value==""){
        pass_error.style.display = 'none';
      }
      else if(pass.value!=pass_copy.value){
        pass_error.style.display = 'block';
        return false;
      }
      else{
        pass_error.style.display = 'none';
        return true;
      }
    }
  </script>
 <?php

  if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(isset($_GET['error'])){
    echo "<script>document.getElementById('error').style.display='block';</script>";
  }
}
  ?>
</html>