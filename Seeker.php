<?php
		function save_seeker($susername,$name,$email,$password,$phone,$resume){
			include("Database.php");
			$query = "INSERT INTO Seeker VALUES('".$susername."','".$name."','".$email."','".$password."','".$phone."','".$resume."');";
			echo $query;
			if(mysqli_query($con,$query)){
				return 1;
			}
			else{
				return 0;
			}

		}
		function check_seeker($username,$password){
			include("Database.php");
			$query = "SELECT COUNT(*) FROM Seeker WHERE UserName='$username' AND $Password='$password';";
			$res = mysqli_query($query,$con);
			$row = mysqli_fetch_array($res,$con);
			if($row[0]==1){
				return 1;
			}
			else{
				return 0;
			}
		}
?>
