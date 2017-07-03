<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
session_start(); 
  include("Database.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
			$hiree_username = $_POST['username'];
			$hiree_password = $_POST['password'];
			$query = "SELECT COUNT(*) FROM Hiree WHERE HireeUserName='$hiree_username' AND Password='$hiree_password';";
			echo $query;
			$res = mysqli_query($con,$query);
			$row = mysqli_fetch_array($res);
			if($row[0]==1){
				$_SESSION['username'] = $hiree_username;
				$_SESSION['password'] = $hiree_password;
				$_SESSION['type'] = "hiree";
				if(isset($_POST['remember']) && $_POST['remember']=='yes'){
					setcookie('username',$hiree_username,time()+30*86000);
					setcookie('password',$hiree_password,time()+30*86000);
					setcookie('type','hiree',time()+30*86000);
				}
				header("Location:hiree_window.php");
			}
			else{
				header("Location:hiree_login.php?error=1");
			}
	}
	else{
		header("Location:hiree_login.php");
	}
?>