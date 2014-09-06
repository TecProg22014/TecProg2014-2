<?php
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/TempoController.php";
class TempoView {
	/**
	 * Variable to instance an object of time controller
	 * @var tempoCO
	 */
	private $tempoCO;
	
	/**
	 * Constructor to instance an object of time controller
	 */
	public function __construct() {
		$this->tempoCO = new TempoController ();
	}
	
	/**
	 * Function to get data of all periods of time organized in labels
	 * @return String $dataInLabels
	 */
	public function retornarDadosTempoFormatado() {
		return $this->tempoCO->_retornarDadosFormatados ();
	}
	
	/**
	 * Function to get data of periods of time organized in new labels to construct diferent graphs
	 */
	public function retornarDadosTempoFormatoNovo() {
		return $this->tempoCO->_retornarDadosFormatoNovo ();
	}
}