<?php
class ECrimeConsultarPorIdVazio extends Exception{

	public function __construct(){
		$this->message = "Problema ao consultar ID de crime.";
	}
}