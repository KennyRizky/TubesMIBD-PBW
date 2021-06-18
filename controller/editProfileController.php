<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class editProfileController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_editProfile(){
        return View::createView('editProfile.php',[]);
    }    

    public function edit_profile(){
        session_start();
        $nama = $_SESSION['username'];

        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthDate = $_POST['birthDate'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE Member SET email = '$email', pass = '$password', tgllahir = '$birthDate', alamat = '$alamat' WHERE nama = '$nama'";
        $query_result = $this->db->executeNonSelectQuery($query);
    }
}


?>