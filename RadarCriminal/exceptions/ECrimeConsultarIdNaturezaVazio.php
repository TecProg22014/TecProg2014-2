<?php
class ECrimeConsultarIdNaturezaVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a null nature id 
	 */
	public function __construct(){
		$this->message = "Erro ao consultar o ID da natureza.";
	}
}