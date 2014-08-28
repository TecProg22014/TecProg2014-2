<?php
class ECategoriaListarTodasAlfabeticamenteVazio extends Exception{

	public function __construct(){
		$this->message = "Problema ao listar categorias alfabeticamente.";
	}
}