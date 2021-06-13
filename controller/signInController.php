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

}


?>