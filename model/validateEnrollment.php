<?php

class validateEnrollment{
    protected $IdE;
	protected $wktEnrollment;
    protected $IdC;
    protected $IdM;

    protected $IdE_validasi;

	public function __construct($IdE,$wktEnrollment,$IdC,$IdM,$IdE_validasi){
        $this->IdE = $IdE;
		$this->wktEnrollment = $wktEnrollment;
        $this->IdC = $IdC;
        $this->IdM = $IdM;
        $this->IdE_validasi = $IdE_validasi;
	}

	public function getIdE(){
		return $this->IdE;
	}

    public function getwktEnrollment(){
		return $this->wktEnrollment;
	}

	public function getIdC(){
		return $this->IdC;
	}

    public function getIdM(){
		return $this->IdM;
	}

    public function getIdE_validasi(){
		return $this->IdE_validasi;
	}
 
}


?>