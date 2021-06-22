<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/Module.php";


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
        $result = $this->getCourse();
        $resultModule = $this->getAllModule();
        return View::createView('coursePage.php',[
            'result'=>$result,
            'resultModule'=>$resultModule
        ]);
    }

    public function getCourse(){
        $query = "SELECT * FROM course WHERE IdC = (SELECT max(IdC) FROM course)";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $result;
    }

    public function getAllModule(){
        $queryModule =  "SELECT * FROM modul INNER JOIN isi_course ON modul.IdMod = isi_course.IdMod WHERE (isi_course.IdC = (SELECT max(isi_course.IdC) FROM isi_course))";        
        $query_result = $this->db->executeSelectQuery($queryModule);
        $resultModule = [];
        foreach($query_result as $key => $value){
            $resultModule[] = new Module($value['IdMod'], $value['JudulMod'], $value['isiMod']);
        }
        return $resultModule;

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