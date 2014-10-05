<?php
/**
 * Class select on null category id excpection
 */
class ECategoriaListarConsultaPorIdVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a null category id 
	 */
	public function __construct( ){
		$this->message = "ID nao encontrado.";
	}
}