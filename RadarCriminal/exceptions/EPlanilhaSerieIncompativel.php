<?php
class EPlanilhaSerieIncompativel extends Exception{
	
	/**
	 * Constructor to set a message error for inompatible serie spreadsheet 
	 */
	public function __construct(){
		$this->message = "Esta planilha n�o e de serie historica!";
	}
}