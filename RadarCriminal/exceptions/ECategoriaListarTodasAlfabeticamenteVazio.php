<?php
/**
 * Class select all categories on a null object excpection
 */
class ECategoriaListarTodasAlfabeticamenteVazio extends Exception{

	/**
	 * Constructor to set a message error for alphabetically searching for a category 
	 */
	public function __construct( ){
		$this->message = "Problema ao listar categorias alfabeticamente.";
	}
}