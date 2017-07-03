<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start();
require("Database.php");
$hiree_username = $_SESSION['username'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$ran = rand(1000,9999);
	$jobid = hash("md5", $hiree_username."$ran");
	$head = $_POST['header'];
	$desc = $_POST['description'];
	$query = "INSERT INTO Jobs VALUES('$jobid','$head','$desc','$hiree_username')";
	mysqli_query($con,$query);
	header("Location:hiree_window.php");
}
?>