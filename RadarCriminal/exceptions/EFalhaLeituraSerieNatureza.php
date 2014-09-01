<?php
class EFalhaLeituraSerieNatureza extends Exception{
	
	/**
	 * Constructor to set a message error for functions failure on reading natures in one serie spreadsheet 
	 */
	public function __construct(){
		$this->message = "Falha na leitura de naturezas da planilha serie historica!";
	}
}