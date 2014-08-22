<?php
class ECrimeConsultarIdNaturezaVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao consultar o ID da natureza.";
	}
}