<?php
class ETipoErrado extends Exception{

	public function __construct(){
		$this->message = "Erro no tipo de variavel";
	}
}