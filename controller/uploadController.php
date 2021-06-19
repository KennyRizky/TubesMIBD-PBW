<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class uploadController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }
    
	public function upload(){	
		if($_FILES['ijazah']['name'] != ""){
			$oldname = $_FILES['ijazah']['tmp_name'];
			$newname = dirname(__DIR__) . "/uploads/ijazah/" 
						. $_POST['username'] . ".jpg";
			if(move_uploaded_file($oldname, $newname)){
				printf("File [%s] has successfully uploaded to [%s]", $oldname, $newname);
			
			}else{
				echo "Error in uploading";
				echo $oldname;

			}
		}else{
			echo "Error: No file uploaded";
		}
		
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$birthDate = $_POST['birthDate'];
		$alamat = $_POST['alamat'];
		$ijazah = $_POST['username'] . ".jpg";
		$query = "INSERT INTO pengajar (IdP, nama, pass, email, alamat, tgllahir, ijazah) VALUES (DEFAULT, '$username', '$password', '$email', '$alamat','$birthDate', '$ijazah')";
		$this->db->executeNonSelectQuery($query);
		
	//$query ='insert into pengajar (ijazah) values ("'.$_POST['username'].'")';
	}
}
?>