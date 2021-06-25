<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";

class coursesMemberController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_courses(){
        $pageCount = $this->getPageCount();
        $resultCourse = $this->getAllCourses();
        return View::createView('courses.php',['result'=>$resultCourse, 'pageCount'=>$pageCount]);
    }

    public function view_enrolledCourses(){
        $pageCount = $this->getPageCount();
        $resultCourse = $this->getMyCourses();
        $resultAllCourse = $this->getAllCourses();
        return View::createView('myCourses.php',['resultCourse'=>$resultCourse, 'result'=>$resultAllCourse, 'pageCount'=>$pageCount]);
    }

    public function getMyCourses(){
        $username = $_SESSION['username'];
        $query = "SELECT IdM FROM member WHERE nama = '$username'";
        $query_result = $this->db->executeSelectQuery($query);
        foreach($query_result as $key => $value){
            $IdM = $value['IdM'];
        }

        $queryMyCourses = "SELECT * FROM enrollment_member INNER JOIN course_enrollment ON enrollment_member.IdE = course_enrollment.IdE INNER JOIN course ON course.IdC = course_enrollment.IdC WHERE IdM = $IdM";
        $query_resultMyCourses = $this->db->executeSelectQuery($queryMyCourses);
        foreach($query_resultMyCourses as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $result;
    }

    public function getAllCourses(){
        $query = "SELECT * FROM course";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }


        $start = 0;
        $show = 4;
        $pageCount = ceil(count($result) / $show);

        if(isset($_POST['currentPage'])){
            $currentPage = $_POST['currentPage'];
        }else{
            $currentPage = 1;
        }

        $currentRecords = ($currentPage - 1) * $show;

        $query .= " LIMIT $currentRecords, $show";
        $query_result_Limited = $this->db->executeSelectQuery($query);

        $resultLimited = [];
        foreach($query_result_Limited as $key => $value){
            $resultLimited[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }

        return $resultLimited;


    }

    public function getPageCount(){
        $query = "SELECT * FROM course";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }

        $start = 0;
        $show = 4;
        $pageCount = ceil(count($result) / $show);

        return $pageCount;
    }
}
?>