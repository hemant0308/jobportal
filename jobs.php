<?php
	include("Dabase.php");
	class Seeker{
		public var $jobid,$jobheader,$jobdescription,$hireeusername;
		public __construct($jobid,$jobdescription,$hireeusername){
			$this->$jobid = $jobid;
			$this->$jobheader = $jobheader;
			$this->$jobdescription = $jobdescription;
			$this->$hireeusername= $hireeusername;
		}
		public function save(){
			$db = new Database();
			$con = $db->$con;
			$query = "INSERT INTO Seeker VALUES('"+this->username+"','"+this->name+"','"+this->email+"','"+this->password+"','"+this->phone+"','"+this->resume+"');";

			if(mysqli_query($query,$con)){
				return 1;
			}
			else{
				return 0;
			}

		}

	}

?>
