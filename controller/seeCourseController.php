<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/member.php";
require_once "model/Enrollment.php";
require_once "model/Module.php";
require_once "model/Exam.php";

class seeCourseController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_seeCourse(){
        $result = $this->getCourse();
        $resultModule = $this->getAllModule();
        return View::createView('seeCourse.php',['result'=>$result, 'resultModule'=>$resultModule]);
    }

    public function getCourse(){
        $IdC = $_POST['IdC'];
        $queryCourse = "SELECT * FROM course WHERE IdC = $IdC";
        $queryCourseResult = $this->db->executeSelectQuery($queryCourse);
        $result = [];
        foreach($queryCourseResult as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'], $value['courseDesc'], $value['IdP']);
        }
        return $result;
    }

    public function getAllModule(){
        $IdC = $_POST['IdC'];

        $queryModule =  "SELECT modul.IdMod, modul.JudulMod, modul.isiMod, isi_courseMod.IdC FROM modul INNER JOIN isi_courseMod ON modul.IdMod = isi_courseMod.IdMod WHERE isi_courseMod.IdC = $IdC";        
        $query_result = $this->db->executeSelectQuery($queryModule);
        $resultModule = [];

        foreach($query_result as $key => $value){
            $resultModule[] = new Module($value['IdMod'], $value['JudulMod'], $value['isiMod']);
        }
        return $resultModule;

    }

    public function add_enroll(){
        $IdM = $_POST['IdM'];
        $IdC = $_POST['IdC'];
        $hargaCourse = $_POST['hargaCourse'];

        $queryEnrollment = "INSERT INTO enrollment(IdE, wktEnrollment) VALUES (DEFAULT, curdate())";
        $query_resultEnrollment = $this->db->executeNonSelectQuery($queryEnrollment);

        $queryEnrollmentMember = "INSERT INTO enrollment_member(IdM, IdE) VALUES ($IdM, (SELECT max(IdE) from enrollment))";
        $query_resultEnrollmentMember = $this->db->executeNonSelectQuery($queryEnrollmentMember);

        $queryCourseEnrollment = "INSERT INTO course_enrollment(IdE, IdC) VALUES ((SELECT max(IdE) from enrollment), $IdC)";
        $query_resultCourseEnrollment = $this->db->executeNonSelectQuery($queryCourseEnrollment);

        $queryUpdateWallet = "UPDATE member SET wallet = wallet - $hargaCourse WHERE IdM = $IdM";
        $queryUpdateWallet_result = $this->db->executeNonSelectQuery($queryUpdateWallet);

    }

    public function getAllExam(){
        $queryExam =    "SELECT 
	                        DISTINCT isi_courseUjian.IdC, pertanyaan_ujian.id_pertanyaan, pertanyaan_ujian.isi_pertanyaan, option_ujian.isi_option, option_ujian.jawaban
                        FROM 
	                        isi_courseUjian INNER JOIN pertanyaan_ujian ON isi_courseUjian.IdC = pertanyaan_ujian.IdC 
	                        INNER JOIN option_ujian ON option_ujian.id_pertanyaan = pertanyaan_ujian.id_pertanyaan
                        WHERE
	                        isi_courseUjian.IdC = (SELECT(max(isi_courseUjian.IdC))FROM isi_courseUjian)";        
        $query_result = $this->db->executeSelectQuery($queryExam);
        $resultExam = [];
        foreach($query_result as $key => $value){
            $resultExam[] = new Exam($value['id_pertanyaan'], $value['IdC'], $value['isi_pertanyaan'], $value['isi_option'], $value['jawaban']);
        }
        return $resultExam;
    }
}
?>