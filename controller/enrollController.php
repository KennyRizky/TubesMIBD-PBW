<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/member.php";

class enrollController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function add_enroll(){
        $username = $_SESSION['username'];
        $queryEnrollment = "INSERT INTO enrollment(IdE, wktEnrollment)
                            VALUES (DEFAULT, curdate())";
        $queryEnrollmentMember = "INSERT INTO enrollment_member(IdM, IdE)
                                    VALUES ($_POST['IdM'], (SELECT max(IdE) from enrollment))";
        $queryCourseEnrollment = "INSERT INTO course_enrollment(IdE, IdC)
                                    VALUES ((SELECT max(IdE) from enrollment), $_POST['IdC'])";
    }

    public function getWallet(){
        $nama = $_SESSION['username'];

        $query = "SELECT wallet FROM Member WHERE nama = '$nama'";
        $query_result = $this->db->executeSelectQuery($query);
        
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = $value['wallet'];
        }
        return $result;
    }

    public function sisaWallet(){
        $wallet = $this->getWallet();
        $hargaCourse = $_POST['IdC'];
    }

    $queryAdmin = "INSERT INTO admin (idA, IdE, IdE_validasi) VALUES (DEFAULT, (SELECT max(enrolment.IdE) FROM enrollment), 0)";
        $this->db->executeNonSelectQuery($queryAdmin);

}
?>