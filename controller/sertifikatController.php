<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/validateNilai.php";

class sertifikatController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_sertifikat(){
        $resultNilai = $this->get_nilaiValidasi();
        $resultNama = $this->getUsername();
        $resultWaktuSertif = $this->get_tanggalSertif();
        return View::createView('sertifikat.php',['resultNilai'=>$resultNilai,'resultNama'=>$resultNama,'resultWaktuSertif'=>$resultWaktuSertif]);
    }


    public function get_nilaiValidasi(){
        $IdN = $_POST['IdN'];
        $query = "SELECT nilai.IdN, nilai_member.IdM, course.IdC, course.judulCourse, nilai.jumlah_nilai, course.batas_nilai, validasi_nilai.IdN_validasi FROM nilai INNER JOIN nilai_member ON nilai.IdN = nilai_member.IdN INNER JOIN course ON course.IdC = nilai.IdC INNER JOIN validasi_nilai ON validasi_nilai.IdN = nilai.IdN WHERE validasi_nilai.IdN_validasi = 1 AND nilai.IdN =  $IdN";
        $query_result = $this->db->executeSelectQuery($query);
        $resultNilai = [];
        foreach($query_result as $key => $value){
            $resultNilai[] = new validateNilai($value['IdM'],$value['IdN'],$value['IdC'],$value['jumlah_nilai'],$value['judulCourse'],$value['batas_nilai'],$value['IdN_validasi']);
        }
        
        return $resultNilai;
    }

    public function getUsername(){
        $IdN = $_POST['IdN'];
        $query ="SELECT nilai.IdN, nilai_member.IdM, nilai.jumlah_nilai, validasi_nilai.IdN_validasi, member.nama FROM nilai INNER JOIN nilai_member ON nilai.IdN = nilai_member.IdN INNER JOIN validasi_nilai ON validasi_nilai.IdN = nilai.IdN INNER JOIN member ON member.IdM = nilai_member.IdM WHERE validasi_nilai.IdN_validasi = 1 AND nilai.IdN =  $IdN";
        $query_result = $this->db->executeSelectQuery($query);
        $resultNama = [];
        foreach($query_result as $key => $value){
            $resultNama[] = $value['nama'];
        }
        
        return $resultNama;
    }

    public function updateTanggalSertif(){
        $IdM = $_POST['IdM'];
        $query ="UPDATE enrollment INNER JOIN enrollment_member SET wktSertif = curdate() WHERE IdM = $IdM";
        $query_result = $this->db->executeSelectQuery($query);
    }

    public function get_tanggalSertif(){
        $this->updateTanggalSertif();
        $IdM = $_POST['IdM'];
        $IdN = $_POST['IdN'];

        $query ="SELECT DISTINCT enrollment.wktSertif, enrollment_member.IdM FROM enrollment INNER JOIN enrollment_member on enrollment.IdE = enrollment_member.IdE INNER JOIN nilai_member ON nilai_member.IdM = enrollment_member.IdM WHERE enrollment_member.IdM = $IdM AND nilai_member.IdN = $IdN";
        $query_result = $this->db->executeSelectQuery($query);
        $resultWaktuSertif = [];
        foreach($query_result as $key => $value){
            $resultWaktuSertif[] = $value['wktSertif'];
        }
        
        return $resultWaktuSertif;
    }
}


?>