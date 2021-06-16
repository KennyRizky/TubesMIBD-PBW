<?php

class Member{
    protected $IdM;
	protected $email;
	protected $username;
	protected $password;
	protected $alamat;
	protected $birthDate;
    protected $wallet;

	public function __construct($IdM,$email,$username,$password,$alamat,$birthDate,$wallet){
        $this->IdM = $IdM;
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
		$this->alamat = $alamat;
		$this->birthDate = $birthDate;
        $this->wallet = $wallet;

	}

	public function getID(){
		return $this->IdM;
	}

    public function getEmail(){
		return $this->email;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function getAlamat(){
		return $this->alamat;
	}

	public function getBirthDate(){
		return $this->birthDate;
	}

    public function getWallet(){
		return $this->wallet;
	}
}


?>