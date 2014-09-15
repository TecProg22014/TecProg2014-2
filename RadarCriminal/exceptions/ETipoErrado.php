<?php
/**
 * Class wrong variable type exception
 */
class ETipoErrado extends Exception{

	/**
	 * Constructor to set a message error for wrong variable type 
	 */
	public function __construct( ){
		$this->message = "Erro no tipo de variavel";
	}
}