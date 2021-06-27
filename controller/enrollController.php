<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/member.php";
require_once "model/Enrollment.php";

class enrollController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function add_enroll(){
        if($this->alreadyEnrolled()[0] == 1){
            echo "You Are Already Enrolled.";
            echo"<br>";
            echo "<a href='index'>Back</a>";
            die;
        }

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

    public function alreadyEnrolled(){
        $nama = $_SESSION['username'];
        $IdC = $_POST['IdC'];

        $queryIdM = "SELECT IdM FROM member WHERE nama = '$nama'";
        $queryIdM_result = $this->db->executeNonSelectQuery($queryIdM);
        $resultIdM = [];
        foreach($queryIdM_result as $key => $value){
            $resultIdM[] = $value['IdM'];
        }

        $queryEnroll = "SELECT * FROM enrollment_member INNER JOIN enrollment ON enrollment_member.IdE = enrollment.IdE INNER JOIN course_enrollment ON course_enrollment.IdE = enrollment.IdE WHERE enrollment_member.IdM = $resultIdM[0] AND course_enrollment.IdC = $IdC";
        $queryEnroll = $this->db->executeSelectQuery($queryEnroll);
        $resultAttempt = [];
        foreach($queryEnroll as $key => $value){
            if(isset($queryEnroll)){
                $resultAttempt[] = 1;
            }else{
                $resultAttempt[] = 0;
            }
        }
        return $resultAttempt;
    }
}
?>