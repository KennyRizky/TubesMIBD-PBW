<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/member.php";


class profileMemberController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_profileMember(){
        $result = $this->getProfile();
        return View::createView('profileMember.php',['result'=>$result]);
    }
    
    public function getProfile(){
        session_start();
        $nama = $_SESSION['username'];

        $query = "SELECT * FROM Member WHERE nama = '$nama'";
        $query_result = $this->db->executeSelectQuery($query);
        
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Member($value['IdM'], $value['email'], $value['nama'], $value['pass'], $value['alamat'],$value['tgllahir'],$value['wallet']);
        }
        return $result;
    }

    public function delete_account(){
        $nama = $_SESSION['username'];
        $query1 = "SELECT IdM FROM Member WHERE nama = '$nama'";
        $query_result1 = $this->db->executeSelectQuery($query1);    
        $resultIdM = [];
        foreach($query_result1 as $key => $value){
            $resultIdM[] = $value['IdM'];
        }
        $query2 = "SELECT IdTR FROM Transaksi_kupon WHERE IdM = '$resultIdM[0]'";
        $query_result2 = $this->db->executeSelectQuery($query2);
        $resultIdTR = [];
        foreach($query_result2 as $key => $value){
            $resultIdTR[] = $value['IdTR'];
        }
        
        for($i = 0; $i < sizeof($resultIdTR); $i++){
            $query3 = "DELETE FROM admin WHERE IdTR = '$resultIdTR[$i]'";
            $query_result3 = $this->db->executeNonSelectQuery($query3);
        }

        $query4 = "DELETE FROM Transaksi_kupon WHERE IdM = '$resultIdM[0]'";
        $query_result4 = $this->db->executeNonSelectQuery($query4);

        $query5 = "DELETE FROM Member WHERE nama = '$nama'";
        $query_result5 = $this->db->executeNonSelectQuery($query5);
        session_destroy();
    }
    
}


?>