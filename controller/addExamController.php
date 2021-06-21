<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class addExamController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_addExam(){
        return View::createView('addExam.php',[]);
    }


    
}


?>