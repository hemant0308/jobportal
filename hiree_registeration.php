<?php
ini_set("display_startup_errors", 1);
ini_set("display_errors", 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);
	session_start(); 
?>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require("Hiree.php");
		$res = save_hiree($_POST['username'],$_POST['name'],$_POST['email'],$_POST['password'],$_POST['phone'],$_POST['company'],$_POST['description'],$_POST['website']);
		if($res==1){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['type'] = "hiree";
			//echo "success";
			header("Location:hiree_window.php");
		}
		else{
			echo "fail";
			header("Location:hiree_register.php?error=1");
		}
		
	}
	else{
		header("Location:hiree_login.php");	
	}
?>
</body>
</html>