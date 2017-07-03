<?php
  	$username = "wordpress";
	$password = "344894ghs";
	$dbname = "JobPortal";
	$con; 
	if(!($con = mysqli_connect("localhost",$username,$password,$dbname))){
		die("sorry");
	}
?>