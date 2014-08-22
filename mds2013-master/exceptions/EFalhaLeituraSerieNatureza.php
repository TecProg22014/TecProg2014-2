<?php
class EFalhaLeituraSerieNatureza extends Exception{
	
	public function __construct(){
		$this->message = "Falha na leitura de naturezas da planilha serie historica!";
	}
}