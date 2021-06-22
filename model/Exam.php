<?php

class Exam{
    protected $id_pertanyaan;
    protected $IdC;
	protected $isi_pertanyaan;
	protected $option_pertanyaan;
    protected $jawaban;

	public function __construct($IdC,$batas_nilai,$judulCourse,$hargaCourse,$IdS,$waktu_terbit_sertif,$courseDesc,$IdP){
        $this->id_pertanyaan = $id_pertanyaan;
        $this->IdC = $IdC;
        $this->isi_pertanyaan = $isi_pertanyaan;
		$this->option_pertanyaan = $option_pertanyaan;
        $this->jawaban = $jawaban;
	}

    public function getid_pertanyaan(){
		return $this->id_pertanyaan;
	}

	public function getIdC(){
		return $this->IdC;
	}

    public function getisi_pertanyaan(){
		return $this->isi_pertanyaan;
	}

	public function getoption_pertanyaan(){
		return $this->option_pertanyaan;
	}

    public function getjawaban(){
		return $this->jawaban;
	}

}


?>