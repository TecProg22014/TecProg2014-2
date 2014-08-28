<?php
class ENaturezaConsultarPorIdVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao consultar ID da natureza.";
	}
}