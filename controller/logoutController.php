<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class logoutController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function logout(){
        session_start();        
        session_destroy();
    }



    
}


?>