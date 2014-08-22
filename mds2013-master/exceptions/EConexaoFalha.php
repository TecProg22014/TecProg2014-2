<?php
class EConexaoFalha extends Exception{

	public function __construct(){
		$this->message = "Conexao com o Banco Falhou";
	}
}