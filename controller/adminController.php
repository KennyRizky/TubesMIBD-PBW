<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/validateWallet.php";
require_once "model/validateNilai.php";
require_once "model/Enrollment.php";


class adminController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_admin(){
        $result = $this->getAllWallet();
        $resultEnrollment = $this->getAllEnrollment();
        $resultNilai = $this->getAllNilai();
        
        return View::createView('admin.php',['result'=>$result, 'resultEnrollment'=>$resultEnrollment,'resultNilai'=>$resultNilai]);
    }

    public function getNilai(){
        $queryNilai = "SELECT nilai.IdN, nilai_member.IdM, course.IdC, course.judulCourse, nilai.jumlah_nilai, course.batas_nilai FROM nilai INNER JOIN nilai_member ON nilai.IdN = nilai_member.IdN INNER JOIN course ON course.IdC = nilai.IdC WHERE nilai.IdN = (SELECT max(nilai.IdN) FROM nilai)";
        $queryNilai_result = $this->db->executeSelectQuery($queryNilai);
        $resultNilai = [];
        foreach($queryNilai_result as $key => $value){
            $resultNilai[] = new validateNilai($value['IdM'],$value['IdN'],$value['IdC'],$value['jumlah_nilai'],$value['judulCourse'],$value['batas_nilai'],0);
        }
        return $resultNilai;

    }

    public function getAllWallet(){
        $query = "SELECT 
                    admin.namaAdmin, member.IdM,member.nama, validasi_transaksikupon.IdTR_validasi,transaksi_kupon.IdK, transaksi_kupon.payment_method, transaksi_kupon.IdTR  
                FROM 
                    admin CROSS JOIN Transaksi_kupon INNER JOIN Member ON Member.IdM = Transaksi_kupon.IdM INNER join validasi_transaksikupon ON validasi_transaksikupon.IdTR = transaksi_kupon.IdTR WHERE validasi_transaksikupon.IdTR_validasi = 0";
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
        $query = "UPDATE validasi_transaksikupon SET IdTR_validasi = 1 WHERE IdTR = $idTR";
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

    public function getAllEnrollment(){
        $query = "SELECT * FROM enrollment INNER JOIN enrollment_member ON enrollment_member.IdE = enrollment.IdE INNER JOIN course_enrollment ON course_enrollment.IdE = enrollment.IdE INNER JOIN course ON course.IdC = course_enrollment.IdC INNER JOIN member ON member.IdM = enrollment_member.IdM";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new Enrollment($value['IdE'], $value['wktEnrollment'],$value['IdC'],$value['IdM'],$value['judulCourse'], $value['nama']);
        }
        return $result;
    }

    public function getAllNilai(){
        $query = "SELECT nilai.IdN,nilai.jumlah_nilai,nilai.IdC,nilai_member.IdM,validasi_nilai.IdN_validasi, course.batas_nilai FROM nilai INNER JOIN nilai_member ON nilai.IdN = nilai_member.IdN INNER JOIN validasi_nilai ON nilai_member.IdN = validasi_nilai.IdN INNER JOIN course ON course.IdC = nilai.IdC WHERE IdN_validasi = 0;";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new validateNilai($value['IdM'], $value['IdN'],$value['IdC'],$value['jumlah_nilai'],$value['batas_nilai'], $value['IdN_validasi']);
        }
        return $result;
    }

    public function validate_nilai(){
        $IdN = $_POST['IdN'];
        $query = "UPDATE validasi_nilai SET IdN_validasi = 1 WHERE IdN = $IdN";
        $query_result = $this->db->executeNonSelectQuery($query);

    }
    
}


?>