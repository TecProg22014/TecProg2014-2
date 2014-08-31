<?php
class ETipoErrado extends Exception{

	/**
	 * Constructor to set a message error forwrong variable type 
	 */
	public function __construct(){
		$this->message = "Erro no tipo de variavel";
	}
}