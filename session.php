<?php
if(isset($_SESSION['type'])){
	include("Database.php");
	if($_SESSION['type']=='hiree'){
		$hiree_username = $_SESSION['username'];
		$hiree_password = $_SESSION['password'];
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
			else{
				session_destroy();
				header("Location:index.php");
			}
	}
	else if($_SESSION['type']=='seeker'){
			$seeker_username = $_SESSION['username'];
			$seeker_password = $_SESSION['password'];
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
			else{
				session_destroy();
				header("Location:index.php");
			}
	}
}

?>