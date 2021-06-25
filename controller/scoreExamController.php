<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/validateNilai.php";
require_once "model/member.php";
require_once "model/Exam.php";

class scoreExamController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_scoreExam(){
        $nilai = $this->getNilai();
        return View::createView('scoreExam.php',['nilai'=>$nilai]);
    }


    public function getNilai(){
        $queryNilai = "SELECT nilai.IdN, nilai_member.IdM, course.IdC, course.judulCourse, nilai.jumlah_nilai, course.batas_nilai FROM nilai INNER JOIN nilai_member ON nilai.IdN = nilai_member.IdN INNER JOIN course ON course.IdC = nilai.IdC WHERE nilai.IdN = (SELECT max(nilai.IdN) FROM nilai)";
        $queryNilai_result = $this->db->executeSelectQuery($queryNilai);
        $resultNilai = [];
        foreach($queryNilai_result as $key => $value){
            $resultNilai[] = new validateNilai($value['IdM'],$value['IdN'],$value['IdC'],$value['judulCourse'],$value['jumlah_nilai'],$value['batas_nilai'],0);
        }
        return $resultNilai;

    }
}
?>