<?php

include_once "/persistence/TempoDAO.php";
include_once "/model/Tempo.php";

class TempoController {
	
	/**
	 * Variable to instance a object to percist in the database 
	 * @var unknown
	 */
	private $tempoDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct() {
		$this->tempoDAO = new TempoDAO ();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste() {
		$this->tempoDAO->__constructTeste ();
	}
	
	/**
	 * Function to list all the periods of time checked in the database
	 * @return array $periodos
	 */
	public function _listarTodos() {
		return $this->tempoDAO->listarTodos ();
	}
	
	/**
	 * Select all the periods of time order by ascendent years of the periods
	 * @return Array $tempos
	 */
	public function _listarTodasEmOrdem() {
		return $this->tempoDAO->listarTodasEmOrdem ();
	}
	
	/**
	 * Select one specific period of time by the id
	 * @param int $id
	 * @return String $tempo
	 */
	public function _consultarPorId($id) {
		return $this->tempoDAO->consultarPorId ( $id );
	}
	
	/**
	 * Function to select a period of time by the interval 
	 * @param String $intervalo
	 * @return String $periodo    *refactor
	 */
	public function _consultarPorIntervalo($intervalo) {
		return $this->tempoDAO->consultarPorIntervalo ( $intervalo );
	}
	
	/**
	 * Function to insert a period of time that crimes had been occurred
	 * @param Tempo $tempo
	 * @return boolean $registered     *refactor
	 */
	public function _inserirTempo(Tempo $tempo) {
		return $this->tempoDAO->inserirTempo ( $tempo );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of periods of time
	 * @param Array $arrayTempo
	 * @return boolean $registered     *refactor
	 */
	public function _inserirTempoArrayParse($arrayTempo) {
		for($i = 0; $i < count ( $arrayTempo ); $i ++) {
			$dadosTempo = new Tempo ();
			$dadosTempo->__setIntervalo ( $arrayTempo [$i] );
			$this->tempoDAO->inserirTempo ( $dadosTempo );
		}
	}
	
	/**
	 * Function to insert in the database the separate values of an array of four months periods  
	 * @param Array $arrayTempo
	 * @return $registered        *refactor
	 */
	public function _inserirTempoArrayParseQuadrimestral($arrayTempo) {
		for($i = 0, $arrayAno = $arrayTempo; $i < count ( $arrayTempo ); $i ++) {
			$ano = key ( $arrayAno );
			$dadosTempo = new Tempo ();
			$dadosTempo->__setIntervalo ( $ano );
			for($j = 0; $j < count ( $arrayTempo [$ano] ); $j ++) {
				$dadosTempo->__setMes ( $arrayDadosTempo [$ano] [$j] );
				$this->tempoDAO->inserirTempo ( $dadosTempo );
			}
			next ( $arrayAno );
		}
	}
	
	/**
	 * Function to list all the periods of time applying them in labels
	 * @return String $labels     *refactor
	 */
	public function _retornarDadosFormatados() {
		$dadosTempo = new Tempo ();
		$arrayDadosTempo = $this->_listarTodos ();
		for($i = 0; $i < count ( $arrayDadosTempo ); $i ++) {
			$dadosTempo = $arrayDadosTempo [$i];
			$dados [$i] = $dadosTempo->__getIntervalo ();
		}
		return "labels : [\"$dados[0]\",\"$dados[1]\",\"$dados[2]\",\"$dados[3]\",\"$dados[4]\",\"$dados[5]\",\"$dados[6]\",\"$dados[7]\",\"$dados[8]\",\"$dados[9]\",\"$dados[10]\"]";
	}
}