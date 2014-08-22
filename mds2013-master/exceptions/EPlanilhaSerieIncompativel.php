<?php
class EPlanilhaSerieIncompativel extends Exception{
	
	public function __construct(){
		$this->message = "Esta planilha não e de serie historica!";
	}
}