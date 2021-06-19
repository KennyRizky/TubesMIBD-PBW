<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class walletController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }
    
	public function view_wallet(){
        return View::createView('buyCredit.php',[]);
    }
    
}
?>