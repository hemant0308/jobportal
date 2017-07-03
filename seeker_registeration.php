<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require("Seeker.php");
		$resume_path = "resumes/".$_POST['username'].'pdf';
		move_uploaded_file($_FILE['resume']['tmp_name'], $resume_path);
		$res = save_seeker($_POST['username'],$_POST['name'],$_POST['email'],$_POST['password'],$_POST['phone'],$resume_path);
		if($res==1){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['type'] = "seeker";
			echo "success";
			header("Location:seeker_window.php");
		}
		else{
			echo "fail";
			header("Location:seeker_register.php?error=1");
		}
		
	}
	else{
		header("Location:seeker_login.html");	
	}
?>
</body>
</html>