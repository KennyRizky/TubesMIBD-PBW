<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class addModuleController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_addModule(){
        return View::createView('addModule.php',[]);
    }

    public function addModule(){
        $judul = $_POST['judulModul'];
        $modulContent = $_POST['moduleContent'];
        $courseDescription = $_POST['courseDescription'];
        $namaPengajar = $_SESSION['usernameTeacher'];
        $queryIdP = "SELECT IdP from pengajar WHERE nama = '$namaPengajar'";
        $query_result = $this->db->executeSelectQuery($queryIdP);
        $resultIdP = [];
        foreach($query_result as $key => $value){
            $resultIdP[] = $value['IdP'];
        }

        $query= "INSERT INTO course (IdC, batas_nilai, judulCourse, hargaCourse, IdS, waktu_terbit_sertif, courseDesc, IdP)
                VALUES (DEFAULT, '$passingGrade', '$judul','$hargaCourse', NULL, NULL, '$courseDescription', '$resultIdP[0]')
        ";
        $query_result2 = $this->db->executeNonSelectQuery($query);
    }
    }
    
}


?>