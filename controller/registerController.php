<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class registerController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_register(){
        return View::createView('register.php',[]);
    }

    public function view_registerTeacher(){
        return View::createView('registerTeacher.php',[]);
    }

    public function add_accountMember(){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthDate = $_POST['birthDate'];
        $alamat = $_POST['alamat'];

        $checkQuery = "SELECT nama FROM Member WHERE nama = '$username'";
        $checkQuery_result = $this->db->executeSelectQuery($checkQuery);
        foreach($checkQuery_result as $key => $value){
            if($value['nama'] == $username){
                echo 'That username is already taken';
                echo '<br>';
                echo '<a href="register">Back</a>';
                die;
            }
        }

        $query = "INSERT INTO Member (IdM, nama, pass, tgllahir, alamat, email, wallet) VALUES (DEFAULT, '$username', '$password', '$birthDate' ,'$alamat', '$email', 0)";
        $this->db->executeNonSelectQuery($query);    
    }

    public function add_accountTeacher(){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthDate = $_POST['birthDate'];
        $alamat = $_POST['alamat'];
        
        $query = "INSERT INTO pengajar (IdP, nama, pass, email) VALUES (DEFAULT, '$username', '$password', '$email')";
        $this->db->executeNonSelectQuery($query);
    }

}


?>