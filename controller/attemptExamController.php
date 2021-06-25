<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/member.php";
require_once "model/Exam.php";

class attemptExamController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_attemptExam(){
        $resultExam = $this->getAllExam();
        $IdC = $_POST['IdC'];
        return View::createView('viewExam.php',['resultExam'=>$resultExam, 'IdC'=>$IdC]);
    }


    public function getAllExam(){
        $IdC = $_POST['IdC'];
        $queryExam =    "SELECT 
	                        DISTINCT isi_courseUjian.IdC, pertanyaan_ujian.id_pertanyaan, pertanyaan_ujian.isi_pertanyaan, option_ujian.isi_option, option_ujian.jawaban
                        FROM 
	                        isi_courseUjian INNER JOIN pertanyaan_ujian ON isi_courseUjian.IdC = pertanyaan_ujian.IdC 
	                        INNER JOIN option_ujian ON option_ujian.id_pertanyaan = pertanyaan_ujian.id_pertanyaan
                        WHERE
	                        isi_courseUjian.IdC = ($IdC)";        
        $query_result = $this->db->executeSelectQuery($queryExam);
        $resultExam = [];
        foreach($query_result as $key => $value){
            $resultExam[] = new Exam($value['id_pertanyaan'], $value['IdC'], $value['isi_pertanyaan'], $value['isi_option'], $value['jawaban']);
        }
        return $resultExam;
    }

    public function submitExam(){
        $IdC = $_POST['IdC'];
        $nilai = 0;
        $option[] =;
        for ($i=0;$option){
            
            $answer = $_POST[''];
            $nilai = $nilai + $answer;
        }
        $queryNilai = "INSERT INTO nilai (IdN, jumlah_nilai, IdC) VALUE (DEFAULT, $nilai, $IdC) ";
        $result_queryNilai = "";
        $queryNilaiMember ="";
        $result_queryNilaiMember="";
    }
}
?>