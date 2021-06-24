<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/Course.php";
require_once "model/member.php";

class orderSummaryController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_orderSummary(){
        $result = $this->getCourse();
        $resultInfoMember = $this->getMemberInfo();
        return View::createView('orderSummary.php',[
            'result'=>$result,
            'resultInfoMember'=>$resultInfoMember
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

    public function getMemberInfo(){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM member WHERE nama = '$username'";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key => $value){

            $result[] = new member($value['IdM'], $value['nama'], $value['pass'], $value['tgllahir'],$value['alamat'], $value['email'], $value['wallet']);
        }
        return $result;
    }

}
?>