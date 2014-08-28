<?php
class ENaturezaConsultarPorNomeVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao consultar Descrição da natureza.";
	}
}