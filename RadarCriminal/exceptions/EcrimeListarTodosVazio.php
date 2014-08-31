<?php
class EcrimeListarTodosVazio extends Exception{

	/**
	 * Constructor to set a message error for listing crimes 
	 */
	public function __construct(){
		$this->message = "Problema ao listar crimes.";
	}
}