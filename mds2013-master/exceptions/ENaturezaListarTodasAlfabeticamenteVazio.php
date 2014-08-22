<?php
class ENaturezaListarTodasAlfabeticamenteVazio extends Exception{

	public function __construct(){
		$this->message = "Ocorreu um problema ao tentar organizar natureza alfabeticamente.";
	}
}