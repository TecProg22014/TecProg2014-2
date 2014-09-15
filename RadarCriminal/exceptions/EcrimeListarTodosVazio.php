<?php
/**
 * Class select all crimes on null crime object excpection
 */
class EcrimeListarTodosVazio extends Exception{

	/**
	 * Constructor to set a message error for listing crimes 
	 */
	public function __construct(){
		$this->message = "Problema ao listar crimes.";
	}
}