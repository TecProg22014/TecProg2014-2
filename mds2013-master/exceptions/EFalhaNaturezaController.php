<?php
class EFalhaNaturezaController extends Exception{

	public function __construct(){
		$this->message = "Erro em alguma funcao na classe Natureza";
	}
}