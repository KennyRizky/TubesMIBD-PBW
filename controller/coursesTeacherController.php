<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class coursesTeacherController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_coursesTeacher(){
        return View::createView('myCoursesTeacher.php',[]);
    }

    public function view_add_courses(){
        return View::createView('addCoursesTeacher.php',[]);
    }

    public function view_coursePage(){
        return View::createView('coursePage.php',[]);
    }
    public function add_Courses(){
        $judul = $_POST['courseTitle'];
        $passingGrade = $_POST['passingGrade'];
        $courseDescription = $_POST['courseDescription'];
        $hargaCourse = $_POST['harga'];
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


?>