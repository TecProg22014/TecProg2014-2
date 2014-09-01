<?php
class ENaturezaListarTodosVazio extends Exception{

	/**
	 * Constructor to set a message error for listing all the natures 
	 */
	public function __construct(){
		$this->message = "Erro ao listar natureza.";
	}
}
