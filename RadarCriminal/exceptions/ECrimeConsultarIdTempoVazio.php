<?php
class ECrimeConsultarIdTempoVazio extends Exception{

	public function __construct(){
		$this->message = "Erro ao consultar tempo do crime.";
	}
}