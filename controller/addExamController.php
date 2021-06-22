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
        $correctAnswer = $_POST['correctAnswer'];
        $queryIdC = "SELECT IdC FROM course WHERE IdC = (SELECT max(IdC) FROM course)";
        $query_resultIdC = $this->db->executeSelectQuery($queryIdC);
        $resultIdC = [];
        foreach($query_resultIdC as $key => $value){
            $resultIdC[] = $value['IdC'];
        }
        $queryTabelUjian = "INSERT INTO ujian VALUES ('$resultIdC[0]')";
        $query_tabelUjian = $this->db->executeNonSelectQuery($queryTabelUjian);

        $queryPertanyaan  = "INSERT INTO pertanyaan_ujian(id_pertanyaan, IdC, isi_pertanyaan, id_ujian)
            VALUES (DEFAULT, '$resultIdC[0]', '$pertanyaan', '$resultIdC[0]')";   
        $query_Pertanyaan = $this->db->executeNonSelectQuery($queryPertanyaan);

        $queryPertanyaanTerbaru = "SELECT id_pertanyaan FROM pertanyaan_ujian WHERE id_pertanyaan = (SELECT max(id_pertanyaan) FROM pertanyaan_ujian)";
        $query_resultPertanyaanTerbaru = $this->db->executeSelectQuery($queryPertanyaanTerbaru);
        $resultIdPertanyaan = [];
        foreach($query_resultPertanyaanTerbaru as $key => $value){
            $resultIdPertanyaan[] = $value['id_pertanyaan'];
        }

        if($correctAnswer == "a"){
            $queryOption1  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanA', '1')";
            $query_Option1 = $this->db->executeSelectQuery($queryOption1);

            $queryOption2  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanB', '0')";
            $query_Option2 = $this->db->executeSelectQuery($queryOption2);

            $queryOption3  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanC', '0')";
            $query_Option3 = $this->db->executeSelectQuery($queryOption3);

            $queryOption4  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanD', '0')";
            $query_Option4 = $this->db->executeSelectQuery($queryOption4);
        }

        else if($correctAnswer == "b"){
            $queryOption1  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanA', '0')";
            $query_Option1 = $this->db->executeSelectQuery($queryOption1);

            $queryOption2  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanB', '1')";
            $query_Option2 = $this->db->executeSelectQuery($queryOption2);

            $queryOption3  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanC', '0')";
            $query_Option3 = $this->db->executeSelectQuery($queryOption3);

            $queryOption4  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanD', '0')";
            $query_Option4 = $this->db->executeSelectQuery($queryOption4);
            }  
        else if($correctAnswer == "c"){
            $queryOption1  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanA', '0')";
            $query_Option1 = $this->db->executeSelectQuery($queryOption1);

            $queryOption2  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanB', '0')";
            $query_Option2 = $this->db->executeSelectQuery($queryOption2);

            $queryOption3  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanC', '1')";
            $query_Option3 = $this->db->executeSelectQuery($queryOption3);

            $queryOption4  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanD', '0')";
            $query_Option4 = $this->db->executeSelectQuery($queryOption4);
            }
        else if($correctAnswer == "d"){
            $queryOption1  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanA', '0')";
            $query_Option1 = $this->db->executeSelectQuery($queryOption1);

            $queryOption2  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanB', '0')";
            $query_Option2 = $this->db->executeSelectQuery($queryOption2);

            $queryOption3  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanC', '0')";
            $query_Option3 = $this->db->executeSelectQuery($queryOption3);

            $queryOption4  = "INSERT INTO option_ujian(id_option, id_pertanyaan, isi_option, jawaban)
            VALUES (DEFAULT, '$resultIdPertanyaan[0]', '$pilihanD', '1')";
            $query_Option4 = $this->db->executeSelectQuery($queryOption4);
        } 
        
        
        $query2 = "INSERT INTO isi_courseUjian VALUES ('$resultIdC[0]', '$resultIdC[0]')";
        $query_result2 = $this->db->executeNonSelectQuery($query2);
    }
    
}


?>