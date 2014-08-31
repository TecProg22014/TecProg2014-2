<?php
class EConexaoFalha extends Exception{

	/**
	 * Constructor to set a message error for a database connection failed 
	 */
	public function __construct(){
		$this->message = "Conexao com o Banco Falhou";
	}
}