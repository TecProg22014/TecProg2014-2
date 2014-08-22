<?php
class EFalhaCrimeController extends Exception{

	public function __construct(){
		$this->message = "Problema em alguma funcao de crime controller";
	}
}