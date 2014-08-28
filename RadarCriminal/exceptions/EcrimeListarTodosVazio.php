<?php
class EcrimeListarTodosVazio extends Exception{

	public function __construct(){
		$this->message = "Problema ao listar crimes.";
	}
}