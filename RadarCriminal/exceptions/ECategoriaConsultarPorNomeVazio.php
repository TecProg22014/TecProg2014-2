<?php
/**
 * Class select on null category name excpection
 */
class ECategoriaConsultarPorNomeVazio extends Exception{
	
	/**
	 * Constructor to set a message error for searching for a null category nome 
	 */
	public function __construct( ){
		$this->message = "Erro ao consultar categoria por nome.";
	}
}

