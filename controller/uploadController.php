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
			$oldname = $_FILES['upfile']['tmp_name'];
			$newname = dirname(__DIR__) . "/uploads/" .
						$_FILES['ijazah']['name'];
			if(move_uploaded_file($oldname, $newname)){
				printf("File [%s] has successfully uploaded to [%s]", $oldname, $newname);
			}else{
				echo "Error in uploading";
				echo $oldname;

			}
		}else{
			echo "Error: No file uploaded";
		}
	}
}
?>