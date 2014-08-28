<?php
class ENomePlanilhaIncompativel extends Exception{
	
	public function __construct(){
		$this->message = "Planilha nao compativel com o parse!";
	}
}