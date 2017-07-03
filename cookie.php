<?php
	if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['type'])){
		include("Database.php");
		if($_COOKIE['type']=='hiree'){
			$hiree_username = $_COOKIE['username'];
			$hiree_password = $_COOKIE['password'];
			$query = "SELECT COUNT(*) FROM Hiree WHERE HireeUserName='$hiree_username' AND Password='$hiree_password';";
			echo $query;
			$res = mysqli_query($con,$query);
			$row = mysqli_fetch_array($res);
			if($row[0]==1){
				$_SESSION['username'] = $hiree_username;
				$_SESSION['password'] = $hiree_password;
				$_SESSION['type'] = "hiree";
				header("Location:hiree_window.php");
			}
		}
		else if($_COOKIE['type']=='seeker'){
			$seeker_username = $_COOKIE['username'];
			$seeker_password = $_COOKIE['password'];
			$query = "SELECT COUNT(*) FROM Seeker WHERE SeekerUserName='$seeker_username' AND Password='$seeker_password';";
			echo $query;
			$res = mysqli_query($con,$query);
			$row = mysqli_fetch_array($res);
			if($row[0]==1){
				$_SESSION['username'] = $seeker_username;
				$_SESSION['password'] = $seeker_password;
				$_SESSION['type'] = "seeker";
				header("Location:seeker_window.php");
			}
		}
	}
?>