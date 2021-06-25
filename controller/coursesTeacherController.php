<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/Module.php";
require_once "model/Exam.php";

class coursesTeacherController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_coursesTeacher(){
        $pageCount = $this->getPageCount();
        $resultCourseTitle = $this->getAllCourse();
        return View::createView('myCoursesTeacher.php',['result'=>$resultCourseTitle, 'pageCount'=>$pageCount]);
    }

    public function view_add_courses(){
        return View::createView('addCoursesTeacher.php',[]);
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

    public function view_coursePage2(){
        $result = $this->getCourse();
        $resultModule = $this->getAllModule();
        $resultExam = $this->getAllExam();

        return View::createView('coursePage2.php',[
            'result'=>$result,
            'resultModule'=>$resultModule,
            'resultExam'=>$resultExam

        ]);
    }


    public function view_coursePage3(){
        $result = $this->getCourse();
        $resultModule = $this->getAllModule();
        $resultExam = $this->getAllExam();

        return View::createView('coursePage3.php',[
            'result'=>$result,
            'resultModule'=>$resultModule,
            'resultExam'=>$resultExam

        ]);
    }

    public function getAllCourse(){
        $namaIdP = $_SESSION['usernameTeacher'];
        $query = "SELECT * FROM course INNER JOIN pengajar on course.IdP = pengajar.IdP where pengajar.nama = '$namaIdP'";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        
        $start = 0;
        $show = 4;
        $pageCount = ceil(count($result) / $show);
    
        if(isset($_POST['currentPage'])){
            $currentPage = $_POST['currentPage'];
        }else{
            $currentPage = 1;
        }
    
        $currentRecords = ($currentPage - 1) * $show;
    
        $query .= " LIMIT $currentRecords, $show";
        $query_result_Limited = $this->db->executeSelectQuery($query);
    
        $resultLimited = [];
        foreach($query_result_Limited as $key => $value){
            $resultLimited[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $resultLimited;
    }

    public function getPageCount(){
        $query = "SELECT * FROM course";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
    
        $start = 0;
        $show = 4;
        $pageCount = ceil(count($result) / $show);
    
        return $pageCount;
    }

    public function getCourse(){
        $query = "SELECT * FROM course WHERE IdC = (SELECT max(IdC) FROM course)";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $result;
    }

    public function getAllModule(){
        $queryModule =  "SELECT * FROM modul INNER JOIN isi_courseMod ON modul.IdMod = isi_courseMod.IdMod WHERE (isi_courseMod.IdC = (SELECT max(isi_courseMod.IdC) FROM isi_courseMod))";        
        $query_result = $this->db->executeSelectQuery($queryModule);
        $resultModule = [];
        foreach($query_result as $key => $value){
            $resultModule[] = new Module($value['IdMod'], $value['JudulMod'], $value['isiMod']);
        }
        return $resultModule;

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

    public function add_Courses(){
        $judul = $_POST['courseTitle'];
        $passingGrade = $_POST['passingGrade'];
        $courseDescription = $_POST['courseDescription'];
        $hargaCourse = $_POST['harga'];
        $namaPengajar = $_SESSION['usernameTeacher'];
        $queryIdP = "SELECT IdP from pengajar WHERE nama = '$namaPengajar'";
        $query_result = $this->db->executeSelectQuery($queryIdP);
        $resultIdP = [];
        foreach($query_result as $key => $value){
            $resultIdP[] = $value['IdP'];
        }

        $query= "INSERT INTO course (IdC, batas_nilai, judulCourse, hargaCourse, IdS, waktu_terbit_sertif, courseDesc, IdP)
                VALUES (DEFAULT, '$passingGrade', '$judul','$hargaCourse', NULL, NULL, '$courseDescription', '$resultIdP[0]')
        ";
        $query_result2 = $this->db->executeNonSelectQuery($query);
    }
    
}


?>