<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/validateWallet.php";
require_once "model/validateEnrollment.php";


class adminController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_admin(){
        $result = $this->getAllWallet();
        return View::createView('admin.php',['result'=>$result]);
    }

    public function getAllWallet(){
        $query = "SELECT * FROM admin INNER JOIN Transaksi_kupon ON admin.IdTR = Transaksi_kupon.IdTR INNER JOIN Member ON Member.IdM = Transaksi_kupon.IdM WHERE admin.IdTR_validasi = 0";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            if($value['IdK'] == 1){
                $nominal = 10000;
            }else if($value['IdK'] == 2){
                $nominal = 50000;
            }else if($value['IdK'] == 3){
                $nominal = 100000;
            }
            $result[] = new validateWallet($value['IdM'], $value['nama'],$nominal,$value['payment_method'],$value['IdTR'],$value['IdTR_validasi']);
        }
        return $result;
    }

    public function validate_wallet(){
        $idTR = $_POST['idTR'];
        $amount = $_POST['amount'];
        $query = "UPDATE admin SET IdTR_validasi = 1 WHERE IdTR = $idTR";
        $query_result = $this->db->executeNonSelectQuery($query);

        $queryMember = "UPDATE Member SET wallet = wallet + $amount";
        $query_result = $this->db->executeNonSelectQuery($queryMember);

    }

    public function getProfile(){
        session_start();
        $nama = $_SESSION['username'];

        $query = "SELECT * FROM Member WHERE nama = '$nama'";
        $query_result = $this->db->executeSelectQuery($query);
        
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Member($value['IdM'], $value['email'], $value['nama'], $value['pass'], $value['alamat'],$value['tgllahir'],$value['wallet']);
        }
        return $result;
    }
    
}


?>