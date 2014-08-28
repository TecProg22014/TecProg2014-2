<?php
class EFalhaLeituraSerieCrime extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de crime da planilha serie historica!";
	}
}