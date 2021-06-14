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
}


?>