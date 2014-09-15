<?php
/**
 * Class nature controller error excpection
 */
class EFalhaNaturezaController extends Exception{

	/**
	 * Constructor to set a message error for functions failure on nature controller 
	 */
	public function __construct( ){
		$this->message = "Erro em alguma funcao na classe Natureza";
	}
}