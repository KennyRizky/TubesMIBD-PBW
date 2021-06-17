<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class signInController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_signIn(){
        return View::createView('signin.php',[]);
    }

    public function check_signIn(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT IdM
                    from member
                    where nama = '$username' && pass = '$password'
        ";
       $query_result = $this->db->executeSelectQuery($query);
       $result = [];
        foreach($query_result as $key => $value){
            if($value['IdM'] !== NULL){
                echo("SIA BENER");
            }
            else{
                echo("SIA SALAH");
            }
        }
        return $result;
        // if($query == null){
        //     header('Location: signin');
        // }
        // else{
        //     header('Location: index');
        // }
    }
}


?>