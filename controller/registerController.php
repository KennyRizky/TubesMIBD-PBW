<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class registerController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","library");
    }

    public function view_register(){
        return View::createView('register.php',[]);
    }

}


?>