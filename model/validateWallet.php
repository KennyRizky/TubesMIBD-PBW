<?php

class validateWallet{
    protected $IdM;
	protected $username;
    protected $wallet;
    protected $payment_method;
    protected $IdTR;

    protected $validate_wallet;

	public function __construct($IdM,$username,$wallet,$payment_method,$IdTR,$validate_wallet){
        $this->IdM = $IdM;
		$this->username = $username;
        $this->wallet = $wallet;
        $this->payment_method = $payment_method;
        $this->IdTR = $IdTR;
        $this->validate_wallet = $validate_wallet;
	}

	public function getID(){
		return $this->IdM;
	}

    public function getIDTR(){
		return $this->IdTR;
	}

	public function getUsername(){
		return $this->username;
	}

    public function getWallet(){
		return $this->wallet;
	}

    public function getPaymentMethod(){
		return $this->payment_method;
	}

    public function getValidate_Wallet(){
		return $this->validate_wallet;
	}

    
}


?>