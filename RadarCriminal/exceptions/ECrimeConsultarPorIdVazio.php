<?php
class ECrimeConsultarPorIdVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a nonexistent crime id 
	 */
	public function __construct(){
		$this->message = "Problema ao consultar ID de crime.";
	}
}