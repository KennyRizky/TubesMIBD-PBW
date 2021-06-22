<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";

class addModuleController{
    protected $db;

    public function __construct(){
        $this->db = new MySQLDB("localhost","root","","online_course");
    }

    public function view_addModule(){
        return View::createView('addModule.php',[]);
    }

    public function addModule(){
        $judulModul = $_POST['judulModul'];
        $moduleContent = $_POST['moduleContent'];

        $query = "INSERT INTO modul VALUES (DEFAULT, '$judulModul', '$moduleContent')";
        $query_result = $this->db->executeNonSelectQuery($query);

        $queryIdMod = "SELECT IdMod FROM modul WHERE IdMod = (SELECT max(IdMod) FROM modul)";
        $query_resultIdMod = $this->db->executeSelectQuery($queryIdMod);
        $resultIdMod = [];
        foreach($query_resultIdMod as $key => $value){
            $resultIdMod[] = $value['IdMod'];
        }

        $queryIdC = "SELECT IdC FROM course WHERE IdC = (SELECT max(IdC) FROM course)";
        $query_resultIdC = $this->db->executeSelectQuery($queryIdC);
        $resultIdC = [];
        foreach($query_resultIdC as $key => $value){
            $resultIdC[] = $value['IdC'];
        }


        $query2 = "INSERT INTO isi_course VALUES ('$resultIdC[0]', '$resultIdMod[0]', NULL)";
        $query_result2 = $this->db->executeNonSelectQuery($query2);
    }
    

}


?>