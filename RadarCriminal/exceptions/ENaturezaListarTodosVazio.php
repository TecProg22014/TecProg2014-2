<?php
class ENaturezaListarTodosVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao listar natureza.";
	}
}
