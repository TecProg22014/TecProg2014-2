<?php
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/util/Parse.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/CategoriaController.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/CrimeController.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/NaturezaController.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/TempoController.php";

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
