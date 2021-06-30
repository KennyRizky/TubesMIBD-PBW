<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Enrollment.php";

class cetakController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_cetak(){
        $resultEnrollment = $this->getAllEnrollment();
        return View::createView('cetak.php',['resultEnrollment'=>$resultEnrollment]);

    }

    public function getAllEnrollment(){
        $query = "SELECT * FROM enrollment INNER JOIN enrollment_member ON enrollment_member.IdE = enrollment.IdE INNER JOIN course_enrollment ON course_enrollment.IdE = enrollment.IdE INNER JOIN course ON course.IdC = course_enrollment.IdC INNER JOIN member ON member.IdM = enrollment_member.IdM";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Enrollment($value['IdE'], $value['wktEnrollment'],$value['IdC'],$value['IdM'],$value['judulCourse'], $value['nama']);
        }
        return $result;
    }


}
