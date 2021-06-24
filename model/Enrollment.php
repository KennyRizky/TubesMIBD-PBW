<?php

class Enrollment{
    protected $IdE;
	protected $wktEnrollment;
    protected $IdC;
    protected $IdM;
	protected $namaCourse;
	protected $username;

	public function __construct($IdE,$wktEnrollment,$IdC,$IdM,$namaCourse,$username){
        $this->IdE = $IdE;
		$this->wktEnrollment = $wktEnrollment;
        $this->IdC = $IdC;
        $this->IdM = $IdM;
		$this->namaCourse = $namaCourse;
		$this->username = $username;
		
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

	public function getnamaCourse(){
		return $this->namaCourse;
	}

	public function getusername(){
		return $this->username;
	}
}


?>