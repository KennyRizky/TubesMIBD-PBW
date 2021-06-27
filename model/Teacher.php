<?php

class Teacher{
    protected $IdP;
	protected $email;
	protected $username;
	protected $birthDate;
    protected $CV;

	public function __construct($IdP,$email,$username,$birthDate,$CV){
        $this->IdP = $IdP;
		$this->email = $email;
		$this->username = $username;
		$this->birthDate = $birthDate;
        $this->CV = $CV;

	}

	public function getIdP(){
		return $this->IdM;
	}

    public function getEmail(){
		return $this->email;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getBirthDate(){
		return $this->birthDate;
	}

    public function getCV(){
		return $this->CV;
	}
}


?>