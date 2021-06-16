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
        $query = "SELECT *
                    from member
                    where nama = '$username' && pass = '$password'
        ";
        $this->db->executeSelectQuery($query);
        if($query==null){
            header('Location: signin');
        }
        else{
            header('Location: index');
        }
    }
}


?>