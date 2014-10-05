<?php
/**
 * Class select on null nature id excpection
 */
class ENaturezaConsultarPorIdVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a null nature id  
	 */
	public function __construct( ){
		$this->message = "Erro ao consultar ID da natureza.";
	}
}