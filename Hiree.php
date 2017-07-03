<?php
		function save_hiree($username,$name,$email,$password,$phone,$company,$description,$website){
			$query = "INSERT INTO Hiree VALUES('".$username."','".$name."','".$email."','".$password."','".$phone."','".$company."','".$description."','".$website."');";
			//echo $query."sflaskjf";
			include("Database.php");
			if(mysqli_query($con,$query)){
				return 1;
			}
			else{
				return 0;
			}

		}
?>
