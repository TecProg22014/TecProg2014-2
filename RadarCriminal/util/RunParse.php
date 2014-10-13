<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

require_once $SERVER_ADRESS."/util/Parse.php";
include_once $SERVER_ADRESS."/controller/CategoriaController.php";
include_once $SERVER_ADRESS."/controller/CrimeController.php";
include_once $SERVER_ADRESS."/controller/NaturezaController.php";
include_once $SERVER_ADRESS."/controller/TempoController.php";

class RunParse{
	private $parse;
	private $categoriaCO;
	private $crimeCO;
	private $naturezaCO;
	private $tempoCO;
	public function __construct(){
	
		$this->categoriaCO = new CategoriaController();
		$this->crimeCO = new CrimeController();
		$this->naturezaCO = new NaturezaController();
		$this->tempoCO = new TempoController();
		
		$this->parse = new Parse("JAN_SET_2011_12  POR REGIAO ADM_2.xls");

		print_r($this->parse->__getRegiao());
		
	}
}
