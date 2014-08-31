<?php
class ECategoriaListarConsultaPorIdVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a null category id 
	 */
	public function __construct(){
		$this->message = "ID nao encontrado.";
	}
}