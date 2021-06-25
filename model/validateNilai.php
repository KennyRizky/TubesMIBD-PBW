<?php

class validateNilai{
    protected $IdM;
    protected $IdN;
    protected $IdC;
    protected $JumlahNilai;
    protected $JudulCourse;
	protected $PassingGrade;
    protected $IdN_validasi;

	public function __construct($IdM,$IdN,$IdC,$JumlahNilai,$JudulCourse,$PassingGrade,$IdN_validasi){
        $this->IdM = $IdM;
		$this->IdN = $IdN;
        $this->IdC = $IdC;
        $this->JumlahNilai = $JumlahNilai;
		$this->JudulCourse = $JudulCourse;
        $this->PassingGrade = $PassingGrade;
        $this->IdN_validasi = $IdN_validasi;

	}

	public function getIdM(){
		return $this->IdM;
	}

    public function getIdN(){
		return $this->IdN;
	}

	public function getIdC(){
		return $this->IdC;
	}


    public function getJumlahNilai(){
		return $this->JumlahNilai;
	}

	public function getJudulCourse(){
		return $this->JudulCourse;
	}

    public function getPassingGrade(){
		return $this->PassingGrade;
	}

    public function getIdN_validasi(){
		return $this->IdN_validasi;
	}

}


?>