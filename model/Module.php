<?php

class Module{
    protected $IdMod;
	protected $JudulMod;
	protected $IsiMod;

	public function __construct($IdMod,$JudulMod,$IsiMod){
        $this->IdMod = $IdMod;
		$this->JudulMod = $JudulMod;
		$this->IsiMod = $IsiMod;
	}

	public function getIdMod(){
		return $this->IdMod;
	}

    public function getJudulMod(){
		return $this->JudulMod;
	}

	public function getIsiMod(){
		return $this->IsiMod;
	}
}


?>