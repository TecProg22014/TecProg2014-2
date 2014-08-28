<?php
require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');
include_once ('C:/xampp/htdocs/mds2013/controller/CategoriaController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/NaturezaController.php');
include_once ('C:/xampp/htdocs/mds2013/controller/TempoController.php');

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
		
		/*
		$this->parse = new Parse("série histórica - 2001 - 2012 2.xls");
		$this->categoriaCO->_inserirCategoriaArrayParseSerie($this->parse->__getCategoria());
		echo "Categoria inserida com sucesso";
		$this->tempoCO->_inserirTempoArrayParse($this->parse->__getTempo());
		echo "Tempo inserido com sucesso";
		$this->naturezaCO->_inserirArrayParse($this->parse->__getNatureza());
		echo "Natureza inserida com sucesso";
		$this->crimeCO->_inserirCrimeArrayParseSerieHistorico($this->parse->__getCrime());
		echo "Crime inserida com sucesso";
		echo "Parse RA rodando".'</br>';
		*/
		
		$this->parse = new Parse("JAN_SET_2011_12  POR REGIAO ADM_2.xls");
		//$this->categoriaCO->_inserirCategoriaArrayParse($this->parse->__getCategoria());
		//echo "CategoriaRA inserida com sucesso";
		print_r($this->parse->__getRegiao());
		//$this->naturezaCO->_inserirArrayParse($this->parse->__getNatureza());
		//echo "NaturezaRA inserida com sucesso";
		//$this->tempoCO->_inserirTempoArrayParse($this->parse->__getTempo());
		//echo "TempoRA inserido com sucesso";
		
	}
}
