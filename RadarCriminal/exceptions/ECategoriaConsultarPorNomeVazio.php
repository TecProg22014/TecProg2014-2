<?php
class ECategoriaConsultarPorNomeVazio extends Exception{
	
	public function __construct(){
		$this->message = "Erro ao consultar categoria por nome.";
	}
}

