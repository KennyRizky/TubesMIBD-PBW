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
        $resultCourse = $this->getAllCourses();
        return View::createView('courses.php',['result'=>$resultCourse]);
    }

    public function view_enrolledCourses(){
        $resultCourse = $this->getAllCourses();
        return View::createView('myCourses.php',['result'=>$resultCourse]);
    }

    public function getTopCourses(){
        
    }

    public function getAllCourses(){
        $query = "SELECT * FROM course";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $result;
    }

}
?>