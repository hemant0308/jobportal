<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start(); 
  include("Database.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
			$seeker_username = $_POST['username'];
			$seeker_password = $_POST['password'];
			$query = "SELECT COUNT(*) FROM Seeker WHERE SeekerUserName='$seeker_username' AND Password='$seeker_password';";
			echo $query;
			$res = mysqli_query($con,$query);
			$row = mysqli_fetch_array($res);
			if($row[0]==1){
				$_SESSION['username'] = $seeker_username;
				$_SESSION['password'] = $seeker_password;
				$_SESSION['type'] = "seeker";
				if(isset($_POST['remember']) && $_POST['remember']=='yes'){
					setcookie('username',$seeker_username,time()+30*86000);
					setcookie('password',$seeker_password,time()+30*86000);
					setcookie('type','seeker',time()+30*86000)
				}
				header("Location:seeker_window.php");
			}
			else{
				header("Location:seeker_login.php?error=1");
			}
	}
	else{
		header("Location:seeker_login.php");
	}
?>