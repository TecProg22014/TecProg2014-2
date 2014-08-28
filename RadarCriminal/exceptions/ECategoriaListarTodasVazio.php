<?php
class ECategoriaListarTodasVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao listar categorias.";
	}
}