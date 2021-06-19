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
    
    public function add_transaksiKupon(){
        $paymentMethod = $_POST['paymentMethod'];
        $amount = $_POST['amount'];
        $nama = $_SESSION['username'];
        $queryIdMember = "SELECT IdM from member where nama = '$nama'";
        $queryIdMemberResult = $this->db->executeSelectQuery($queryIdMember);
        foreach($queryIdMemberResult as $key => $value){
            if($value['IdM'] !== NULL){
                $IdM = $value['IdM'];
            }
        }
        
        $query = "INSERT INTO transaksi_kupon (IdTR, waktu_transaksi, IdM, IdK, payment_method) VALUES 
                    (DEFAULT, curdate(), '$IdM', '$amount', '$paymentMethod')";
        
        $this->db->executeNonSelectQuery($query);
    }
}
?>