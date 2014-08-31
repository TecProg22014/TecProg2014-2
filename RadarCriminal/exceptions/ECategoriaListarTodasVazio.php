<?php
class ECategoriaListarTodasVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a category when the database is empty 
	 */
	public function __construct(){
		$this->message = "Erro ao listar categorias.";
	}
}