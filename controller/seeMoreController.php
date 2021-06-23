<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/Module.php";
require_once "model/Exam.php";

class seeMoreController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_coursePage(){

        $result = $this->getCourse();
        $resultModule = $this->getAllModule();
        $resultExam = $this->getAllExam();

        return View::createView('coursePage.php',[
            'result'=>$result,
            'resultModule'=>$resultModule,
            'resultExam'=>$resultExam

        ]);
    }

    public function getCourse(){
        $IdC = $_POST['IdC'];

        $query = "SELECT * FROM course WHERE IdC = $IdC";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){

            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $result;
    }

    public function getAllModule(){
        $IdC = $_POST['IdC'];
        $queryModule =  "SELECT * FROM modul INNER JOIN isi_courseMod ON modul.IdMod = isi_courseMod.IdMod WHERE (isi_courseMod.IdC = $IdC)";        
        $query_result = $this->db->executeSelectQuery($queryModule);
        $resultModule = [];
        foreach($query_result as $key => $value){
            $resultModule[] = new Module($value['IdMod'], $value['JudulMod'], $value['isiMod']);
        }
        return $resultModule;

    }

    public function getAllExam(){
        $IdC = $_POST['IdC'];

        $queryExam =    "SELECT 
	                        DISTINCT isi_courseUjian.IdC, pertanyaan_ujian.id_pertanyaan, pertanyaan_ujian.isi_pertanyaan, option_ujian.isi_option, option_ujian.jawaban
                        FROM 
	                        isi_courseUjian INNER JOIN pertanyaan_ujian ON isi_courseUjian.IdC = pertanyaan_ujian.IdC 
	                        INNER JOIN option_ujian ON option_ujian.id_pertanyaan = pertanyaan_ujian.id_pertanyaan
                        WHERE
	                        isi_courseUjian.IdC = $IdC";        
        $query_result = $this->db->executeSelectQuery($queryExam);
        $resultExam = [];
        foreach($query_result as $key => $value){
            $resultExam[] = new Exam($value['id_pertanyaan'], $value['IdC'], $value['isi_pertanyaan'], $value['isi_option'], $value['jawaban']);
        }
        return $resultExam;
    }    
}


?>