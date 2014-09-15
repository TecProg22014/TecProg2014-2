<?php
/**
 * Class reading category error excpection
 */
class EFalhaLeituraSerieCategoria extends Exception{
	
	/**
	 * Constructor to set a message error for functions failure on reading category in one serie spreadsheet 
	 */
	public function __construct( ){
		$this->message = "Falha na leitura de categoria da planilha de serie historica!";
	}
}