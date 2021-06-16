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
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthDate = $_POST['birthDate'];
        $alamat = $_POST['alamat'];

        $query = "SELECT *
                    from member
                    where nama = $username && pass = $password
        )";
        $this->db->executeNonSelectQuery($query);
    }
}


?>