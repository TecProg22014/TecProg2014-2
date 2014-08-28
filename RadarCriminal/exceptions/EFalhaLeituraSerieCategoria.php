<?php
class EFalhaLeituraSerieCategoria extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de categoria da planilha de serie historica!";
	}
}