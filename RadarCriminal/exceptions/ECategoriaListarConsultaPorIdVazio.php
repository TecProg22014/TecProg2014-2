<?php
class ECategoriaListarConsultaPorIdVazio extends Exception{

	public function __construct(){
		$this->message = "ID nao encontrado.";
	}
}