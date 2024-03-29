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
        $query = "SELECT nama
                    from member
                    where nama = '$username' && pass = '$password'
        ";
       $query_result = $this->db->executeSelectQuery($query);
       $result = [];
        foreach($query_result as $key => $value){
            if($value['nama'] !== NULL){
                session_start();
                $_SESSION['username'] = $value['nama'];
            }
        }
        return $result;
        
    }

    public function view_signInTeacher(){
        return View::createView('signinTeacher.php',[]);
    }

    public function check_signInTeacher(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT nama
                    from pengajar
                    where nama = '$username' && pass = '$password'
        ";
       $query_result = $this->db->executeSelectQuery($query);
       $result = [];
        foreach($query_result as $key => $value){
            if($value['nama'] !== NULL){
                $_SESSION['usernameTeacher'] = $value['nama'];
            }
        }
        return $result;
    }

    public function view_signInAdmin(){
        return View::createView('signinAdmin.php',[]);
    }


    public function check_signInAdmin(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT namaAdmin
                    from admin
                    where namaAdmin = '$username' && pass = '$password'
        ";
       $query_result = $this->db->executeSelectQuery($query);
       $result = [];
        foreach($query_result as $key => $value){
            if($value['namaAdmin']!== NULL){
                $_SESSION['usernameAdmin'] = $value['namaAdmin'];
                header('Location: admin');
            }
            else{
                echo("You are not an admin!");
                echo"<a href = 'signin'>back</a>";
                die;
            }
        }
    }
}


?>