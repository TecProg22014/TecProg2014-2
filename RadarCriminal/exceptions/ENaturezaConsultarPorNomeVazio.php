<?php
class ENaturezaConsultarPorNomeVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a null nature description 
	 */
	public function __construct(){
		$this->message = "Erro ao consultar Descrição da natureza.";
	}
}