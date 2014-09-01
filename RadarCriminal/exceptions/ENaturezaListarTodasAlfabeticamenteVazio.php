<?php
class ENaturezaListarTodasAlfabeticamenteVazio extends Exception{

	/**
	 * Constructor to set a message error for alphabetically searching for a nature 
	 */
	public function __construct(){
		$this->message = "Ocorreu um problema ao tentar organizar natureza alfabeticamente.";
	}
}