<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class IndexController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","library");
    }

    public function view_index(){
        return View::createView('index.php',[]);
    }

    public function view_company_profile(){
        return View::createView('companyprofile.php',[]);
    }
}


?>