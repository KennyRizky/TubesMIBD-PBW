<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Teacher.php";

class teacherProfileController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_teacherProfile(){
        $resultTeacher = $this->getTeacher();
        $IdC = $_POST['IdC'];
        return View::createView('teacherProfile.php',['resultTeacher'=>$resultTeacher, 'IdC'=>$IdC]);
    }

    public function getTeacher(){
        $IdC = $_POST['IdC'];

        $queryCV = "SELECT pengajar.IdP, pengajar.nama, pengajar.email, pengajar.alamat, pengajar.tgllahir, pengajar.CV, course.IdC FROM pengajar INNER JOIN course ON pengajar.IdP = course.IdP WHERE IdC = $IdC";
        $queryCVResult = $this->db->executeSelectQuery($queryCV);

        $result = [];
        foreach($queryCVResult as $key => $value){
            $result[] = new Teacher($value['IdP'], $value['email'],$value['nama'], $value['tgllahir'], $value['CV']);
        }
        return $result;

    }
}
?>