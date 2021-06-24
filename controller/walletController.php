<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class walletController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }
    
	public function view_wallet(){
        $result = $this->getWallet();
        return View::createView('buyCredit.php',['result'=>$result]);
    }

    public function getWallet(){
        $nama = $_SESSION['username'];

        $query = "SELECT wallet FROM Member WHERE nama = '$nama'";
        $query_result = $this->db->executeSelectQuery($query);
        
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = $value['wallet'];
        }
        return $result;
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

        $queryAdmin = "INSERT INTO admin (idA, IdTR, IdTR_validasi) VALUES (DEFAULT, (SELECT max(Transaksi_kupon.IdTR) FROM Transaksi_kupon), 0)";
        $this->db->executeNonSelectQuery($queryAdmin);
        
        
        if($amount == '1'){
            $nominal = 10000;
        }
        else if($amount == '2'){
            $nominal = 50000;
        }
        else if($amount == '3'){
            $nominal = 100000;
        }
        
    }
}
?>