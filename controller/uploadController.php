<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class uploadController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }
    
	public function upload(){	
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$birthDate = $_POST['birthDate'];
		$alamat = $_POST['alamat'];
		$ijazah = $_POST['username'] . ".jpg";

		$checkQuery = "SELECT nama FROM pengajar WHERE nama = '$username'";
        $checkQuery_result = $this->db->executeSelectQuery($checkQuery);
        foreach($checkQuery_result as $key => $value){
            if($value['nama'] == $username){
                echo 'That username is already taken';
                echo '<br>';
                echo '<a href="registerTeacher">Back</a>';
                die;
            }
        }

		if($_FILES['ijazah']['name'] != ""){
			$oldname = $_FILES['ijazah']['tmp_name'];
			$newname = dirname(__DIR__) . "/uploads/ijazah/" 
						. $_POST['username'] . ".jpg";
			if(move_uploaded_file($oldname, $newname)){
				printf("File [%s] has successfully uploaded to [%s]", $oldname, $newname);
			
			}else{
				echo "Error in uploading";
				die;

			}
		}else{
			echo "Error: No file uploaded";
		}
		
		$query = "INSERT INTO pengajar (IdP, nama, pass, email, alamat, tgllahir, ijazah) VALUES (DEFAULT, '$username', '$password', '$email', '$alamat','$birthDate', '$ijazah')";
		$this->db->executeNonSelectQuery($query);
		
	//$query ='insert into pengajar (ijazah) values ("'.$_POST['username'].'")';
	}
}
?>