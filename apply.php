<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])){
	$id = $_GET['id'];
	//echo $_SESSION;
	$seeker_username = $_SESSION['username'];
	include("Database.php");
	$query = "INSERT INTO SeekerJobs VALUES('$seeker_username','$id');";
	echo $query;
	if(mysqli_query($con,$query)){
		header("Location:seeker_window.php");
	}
	else{
		//header("Location:ad.html");
	}
}
else{
	header("Location:index.php");
}
?>