<?php
class EFalhaLeituraSerieTempo extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de tempo da planilha serie historica!";
	}
}