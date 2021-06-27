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

        if($this->alreadyAttempted()[0] == 1){
            echo "You Cannot Attempt This Exam Anymore";
            echo"<br>";
            echo "<a href='index'>Back</a>";
            die;
        }

        $resultExam = $this->getAllExam();
        $IdC = $_POST['IdC'];
        return View::createView('viewExam.php',['resultExam'=>$resultExam, 'IdC'=>$IdC]);
    }

    public function alreadyAttempted(){
        $nama = $_SESSION['username'];
        $IdC = $_POST['IdC'];

        $queryIdM = "SELECT IdM FROM member WHERE nama = '$nama'";
        $queryIdM_result = $this->db->executeNonSelectQuery($queryIdM);
        $resultIdM = [];
        foreach($queryIdM_result as $key => $value){
            $resultIdM[] = $value['IdM'];
        }

        $queryAttempt = "SELECT * FROM nilai INNER JOIN nilai_member ON nilai_member.IdN = nilai.IdN WHERE nilai_member.IdM = $resultIdM[0] AND IdC = $IdC";
        $queryAttemptResult = $this->db->executeSelectQuery($queryAttempt);
        $resultAttempt = [];
        foreach($queryAttemptResult as $key => $value){
            if(isset($queryAttempt)){
                $resultAttempt[] = 1;
            }else{
                $resultAttempt[] = 0;
            }   
        }
        return $resultAttempt;
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
        $nama = $_SESSION['username'];
        $IdC = $_POST['IdC'];
        $answerCorrect = 0;
        $counter = $_POST['counter'];

        for ($i = 0; $i < $counter; $i++){      
            $answer = $_POST['option' . $i];
            if($answer == 1){
                $answerCorrect++;
            }
        }
        $nilai = $answerCorrect / $counter * 100;

        $queryIdM = "SELECT IdM FROM member WHERE nama = '$nama'";
        $queryIdM_result = $this->db->executeNonSelectQuery($queryIdM);
        $resultIdM = [];
        foreach($queryIdM_result as $key => $value){
            $resultIdM[] = $value['IdM'];
        }

        $queryIdE = "SELECT * FROM course_enrollment INNER JOIN course ON course_enrollment.IdC = course.IdC WHERE course_enrollment.IdC = $IdC";
        $queryIdE_result = $this->db->executeSelectQuery($queryIdE);
        $resultIdE = [];
        foreach($queryIdE_result as $key => $value){
            $resultIdE[] = $value['IdE'];
        }

        $queryNilai = "INSERT INTO nilai (IdN, jumlah_nilai, IdC) VALUE (DEFAULT, $nilai, $IdC)";
        $queryNilai_result = $this->db->executeNonSelectQuery($queryNilai);

        $queryNilaiMember = "INSERT INTO nilai_member (IdN, IdM) VALUE ((SELECT max(nilai.IdN) FROM nilai), $resultIdM[0])";
        $queryNilaiMember_result = $this->db->executeNonSelectQuery($queryNilaiMember);

        $queryNilaiValidasi = "INSERT INTO validasi_nilai (IdN, IdE, IdN_validasi) VALUE ((SELECT max(nilai.IdN) FROM nilai), $resultIdE[0] ,0)";
        $queryNilaiValidasi_result = $this->db->executeNonSelectQuery($queryNilaiValidasi);
    }
}
?>