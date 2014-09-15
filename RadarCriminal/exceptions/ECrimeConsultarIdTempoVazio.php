<?php
/**
 * Class select on null time id excpection
 */
class ECrimeConsultarIdTempoVazio extends Exception{

	/**
	 * Constructor to set a message error for searching for a null period of time 
	 */
	public function __construct( ){
		$this->message = "Erro ao consultar tempo do crime.";
	}
}