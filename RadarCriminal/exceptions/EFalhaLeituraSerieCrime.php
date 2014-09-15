<?php
/**
 * Class reading crime error excpection
 */
class EFalhaLeituraSerieCrime extends Exception{
	
	/**
	 * Constructor to set a message error for functions failure on reading crime in one serie spreadsheet
	 */
	public function __construct( ){
		$this->message = "Falha na leitura de crime da planilha serie historica!";
	}
}