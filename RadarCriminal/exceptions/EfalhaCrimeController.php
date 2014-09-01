<?php
class EFalhaCrimeController extends Exception{

	/**
	 * Constructor to set a message error for functions failure on crime controller 
	 */
	public function __construct(){
		$this->message = "Problema em alguma funcao de crime controller";
	}
}