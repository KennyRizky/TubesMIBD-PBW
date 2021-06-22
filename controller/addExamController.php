<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Exam.php";

class addExamController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_addExam(){
        return View::createView('addExam.php',[]);
    }

    public function add_Exam(){
        $pertanyaan = $_POST['question'];
        $pilihanA   = $_POST['optionContentA'];
        $pilihanB   = $_POST['optionContentB'];
        $pilihanC   = $_POST['optionContentC'];
        $pilihanD   = $_POST['optionContentD'];
        $correctAnswer = $_POST['jawaban'];
        if($correctAnswer === 'a'){
            $correctAnswer = $_POST['1'];
        }
        else if($correctAnswer === 'b'){
            $correctAnswer = $_POST['1'];
        }
        if($correctAnswer === 'c'){
            $correctAnswer = $_POST['1'];
        }
        else if($correctAnswer === 'd'){
            $correctAnswer = $_POST['1'];
        }
        else{
            $correctAnswer = $_POST['0'];
        }
        $queryIdC = "SELECT IdC FROM course WHERE IdC = (SELECT max(IdC) FROM course)";
        $query_resultIdC = $this->db->executeSelectQuery($queryIdC);
        $resultIdC = [];
        foreach($query_resultIdC as $key => $value){
            $resultIdC[] = $value['IdC'];
        }
        $queryExam1  = "INSERT INTO pertanyaan_ujian(id_pertanyaan, IdC, isi_pertanyaan, option_pertanyaan, jawaban)
            VALUES (DEFAULT, '$resultIdC[0]', '$pertanyaan', '$pilihanA', '$option_pertanyaan', '$correctAnswer')";   
        $query_exam1 = $this->db->executeSelectQuery($queryExam1);

        $queryExam2  = "INSERT INTO pertanyaan_ujian(id_pertanyaan, IdC, isi_pertanyaan, jawaban)
            VALUES (DEFAULT, '$resultIdC[0]', '$pertanyaan', '$pilihanB', '$option_pertanyaan', '$correctAnswer')";
        $query_exam2 = $this->db->executeSelectQuery($queryExam2);

        $queryExam2  = "INSERT INTO pertanyaan_ujian(id_pertanyaan, IdC, isi_pertanyaan, jawaban)
            VALUES (DEFAULT, '$resultIdC[0]', '$pertanyaan', '$pilihanC', '$option_pertanyaan', '$correctAnswer')";
        $query_exam2 = $this->db->executeSelectQuery($queryExam2);

        $queryExam2  = "INSERT INTO pertanyaan_ujian(id_pertanyaan, IdC, isi_pertanyaan, jawaban)
            VALUES (DEFAULT, '$resultIdC[0]', '$pertanyaan', '$pilihanD', '$option_pertanyaan', '$correctAnswer')";  
        $query_exam2 = $this->db->executeSelectQuery($queryExam2);                      
    }
    
}


?>