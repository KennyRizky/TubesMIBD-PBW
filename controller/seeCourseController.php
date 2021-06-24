<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/member.php";
require_once "model/Enrollment.php";

class seeCourseController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_seeCourse(){
        $result = $this->getCourse();
        return View::createView('seeCourse.php',['result'=>$result]);
    }

    public function getCourse(){
        $IdC = $_POST['IdC'];
        $queryCourse = "SELECT * FROM course WHERE IdC = $IdC";
        $queryCourseResult = $this->db->executeSelectQuery($queryCourse);
        $result = [];
        foreach($queryCourseResult as $key => $value){
            $result[] = new Course($value['IdC'], $value['batas_nilai'], $value['judulCourse'], $value['hargaCourse'],$value['IdS'], $value['waktu_terbit_sertif'], $value['courseDesc'], $value['IdP']);
        }
        return $result;

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
}
?>