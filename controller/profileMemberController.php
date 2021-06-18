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
        session_start();
        $nama = $_SESSION['username'];

        $query = "DELETE FROM Member WHERE nama = '$nama'";
        $query_result = $this->db->executeNonSelectQuery($query);
        session_destroy();
    }
    
}


?>