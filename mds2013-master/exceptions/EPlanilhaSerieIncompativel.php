<?php
class EPlanilhaSerieIncompativel extends Exception{
	
	public function __construct(){
		$this->message = "Esta planilha n�o e de serie historica!";
	}
}