<?php
session_start();
if(isset($_SESSION) && isset($_GET['id'])){
	require("Database.php");
	$hiree_username = $_SESSION['username'];
	$id = $_GET['id'];
	$query = "DELETE FROM Jobs WHERE JobId = '$id';";
	echo $query;
	if(mysqli_query($con,$query)){
		echo "success";
		header("Location:hiree_window.php");
	}
	else{
		echo "failer";
		header("Location:index.php");
	}
}
else{
	echo "string";
	header("Location:index.php");
}
?>