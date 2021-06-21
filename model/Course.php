<?php

class Course{
    protected $IdC;
	protected $batas_nilai;
	protected $judulCourse;
	protected $hargaCourse;
	protected $IdS;
	protected $waktu_terbit_sertif;
    protected $courseDesc;
    protected $IdP;


	public function __construct($IdC,$batas_nilai,$judulCourse,$hargaCourse,$IdS,$waktu_terbit_sertif,$courseDesc,$IdP){
        $this->IdC = $IdC;
		$this->batas_nilai = $batas_nilai;
		$this->judulCourse = $judulCourse;
		$this->hargaCourse = $hargaCourse;
		$this->IdS = $IdS;
		$this->waktu_terbit_sertif = $waktu_terbit_sertif;
        $this->courseDesc = $courseDesc;
        $this->IdP = $IdP;

	}

	public function getIdC(){
		return $this->IdC;
	}

    public function getBatasNilai(){
		return $this->batas_nilai;
	}

	public function getJudulCourse(){
		return $this->judulCourse;
	}

	public function gethargaCourse(){
		return $this->hargaCourse;
	}

	public function getIdS(){
		return $this->IdS;
	}

	public function getWaktuTerbitSertif(){
		return $this->waktu_terbit_sertif;
	}

    public function getCourseDesc(){
		return $this->courseDesc;
	}

    public function getIdP(){
		return $this->IdP;
	}
}


?>