<?php

class Course{
    protected $IdC;
	protected $batas_nilai;
	protected $judulCourse;
	protected $hargaCourse;
    protected $courseDesc;
    protected $IdP;


	public function __construct($IdC,$batas_nilai,$judulCourse,$hargaCourse,$courseDesc,$IdP){
        $this->IdC = $IdC;
		$this->batas_nilai = $batas_nilai;
		$this->judulCourse = $judulCourse;
		$this->hargaCourse = $hargaCourse;
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

    public function getCourseDesc(){
		return $this->courseDesc;
	}

    public function getIdP(){
		return $this->IdP;
	}
}


?>