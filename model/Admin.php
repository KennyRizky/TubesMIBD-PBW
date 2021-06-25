<?php

class Admin{
    protected $IdA;
	protected $username;
	protected $password;
    protected $email;

	public function __construct($IdA,$username,$password,$email){
        $this->IdA = $IdA;
		$this->username = $username;
        $this->password = $password;
        $this->email = $email;

	}

	public function getIDA(){
		return $this->IdA;
	}

    public function getUsername(){
		return $this->username;
	}

    public function getPassword(){
		return $this->password;
	}

    public function getEmail(){
		return $this->email;
	}


?>