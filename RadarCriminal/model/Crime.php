<?php
include_once('/../exceptions/EFalhaLeituraSerieCrime.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Crime{
	
	/**
	 * Variables to that define a crime
	 * @var int idCrime
	 * @var int quantidade
	 * @var int idTempo
	 * @var int idNatureza
	 * @var int idRA
	 * @var String exceptionCrime
	 */
	private $idCrime;
	private $quantidade;
	private $idTempo;
	private $idNatureza;
	private $idRA;
	private $exceptionCrime;
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct(){
	
	}
	
	/**
	 * Full constuctor of an object Crime
	 * @param int $idCrime
	 * @param int $idTempo
	 * @param int $idNatureza
	 * @param int $quantidade
	 */
	public function __constructOverload($idCrime,$idTempo,$idNatureza,$quantidade){
		$this->idCrime = $idCrime;
		$this->idTempo = $idTempo;
		$this->idNatureza = $idNatureza;
		$this->quantidade = $quantidade;
	}
	
	/**
	 * Function to set the id of the crime
	 * @param int $idCrime
	 * @throws Exception ETipoErrado
	 */
	public function __setIdCrime($idCrime){

		if(!is_numeric($idCrime)){
			throw new ETipoErrado();
		}
		$this->idCrime = $idCrime;
	}
	
	/**
	 * Function to get the value of the id of some crime
	 */
	public function __getIdCrime(){
		return $this->idCrime;
	}
	
	/**
	 * Function to set the sum of how many times one crime has occurred
	 * @param int $quantidade
	 */
	public function __setQuantidade($quantidade){
	
		$this->quantidade = $quantidade;
	}
	
	/**
	 * Function to get the quantity of times one crime has occurred
	 * @return Object Crime var $quantidade
	 */
	public function __getQuantidade(){
		return $this->quantidade;
	}
	
	/**
	 * Function to set one array of periods of time counted to show percents of crimes
	 * @param int $idTempo
	 */
	public function __setIdTempo($idTempo){
		
		$this->idTempo = $idTempo;
	}
	
	/**
	 * Function to get the arrays of periods related to crimes
	 * @return Object Crime var $idTempo
	 */
	public function __getIdTempo(){
		return $this->idTempo;
	}
	
	/**
	 * Function to set the id of the nature of one crime
	 * @param int $idNatureza
	 */
	public function __setIdNatureza($idNatureza){
		
		$this->idNatureza = $idNatureza;
	}
	
	/**
	 * Function to get the id of the nature of one crime
	 * @return Object Crime var $idNatureza
	 */
	public function __getIdNatureza(){
		return $this->idNatureza;
	}
	
	/**
	 * Function to set the Administrative Region of one crime has occurred
	 * @param int $idRA
	 */
	public function __setIdRegiaoAdministrativa($idRA){
		$this->idRA = $idRA;
	}
	
	/**
	 * Function to get the Administrative Region of one crime has occurred
	 */
	public function __getIdRegiaoAdministrativa(){
		return $this->idRA;
	}
	
}