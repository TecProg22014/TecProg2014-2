<?php
class EFalhaLeituraSerieTempo extends Exception{
	
	/**
	 * Constructor to set a message error for functions failure on reading period of time in one serie spreadsheet 
	 */
	public function __construct(){
		$this->message = "Falha na leitura de tempo da planilha serie historica!";
	}
}