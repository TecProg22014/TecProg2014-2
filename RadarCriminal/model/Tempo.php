<?php

include_once "/exceptions/ETipoErrado.php";

class Tempo{
	
	/**
	 * Variables that define the time of one crime
	 * @var int idTempo
	 * @var int intervalo
	 * @var String mes
	 */

	private $idTempo;
	private $intervalo;
	private $mes;
	
	/**
	 * Function to set the id of the time of a crime
	 * @param int $idTempo
	 * @throws Exception ETipoErrado
	 */
	public function __setIdTempo($idTempo){
		
		if(!is_numeric($idTempo)){
			throw new ETipoErrado();
		}
		$this->idTempo = $idTempo;
	}
	/**
	 * Function to get the id of a time of a crime
	 * @return Object Time var $idTempo
	 */
	public function __getIdTempo(){
		return $this->idTempo;
	}
	/**
	 * Function to set the range of the time of a crime
	 * @param int $intervalo
	 * @throws Exception ETipoErrado
	 */
	public function __setIntervalo($intervalo){
		
		if(!is_numeric($intervalo)){
			throw new ETipoErrado();
		}
		$this->intervalo = $intervalo;
	}
	/**
	 * Function to get the range of a time of a crime
	 * @return Object Time var $intervalo
	 */
	public function __getIntervalo(){
		return $this->intervalo;
	}
	/**
	 * Function to set the name of a mes of a crime
	 *@param String mes
	 */
	public function __setMes($mes){
		$this->mes = $mes;
	}
	/**
	 * Function to get the name of a mes of a crime
	 * @return unknown
	 */
	public function __getMes(){
		return  $this->mes;
	}

	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct(){
		
	}
	/**
	 * Full constructor of an object Time that defines a crime
	 * @param int idTempo
	 * @param int intervalo
	 * @param String mes
	 */
	public function __constructOverload($idTempo,$intervalo,$mes){
		
		$this->idTempo = $idTempo;
		$this->intervalo = $intervalo;
		$this->mes = $mes;
	}
}