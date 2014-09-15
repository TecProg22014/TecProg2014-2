<?php

include_once "/exceptions/ETipoErrado.php";

class Natureza{
	
	/**
	 * Variables that define the nature of one crime
	 * @var int idNatureza
	 * @var String natureza
	 * @var int idCategoria
	 */
	private $idNatureza;
	private $natureza;
	private $idCategoria;
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct(){
		
	}
	
	/**
	 * Full constructor of an object Nature that defines a crime
	 * @param int $idNatureza
	 * @param String $nomeNatureza
	 * @param int $idCategoriaNatureza
	 */
	public function __constructOverload($idNatureza,$nomeNatureza,$idCategoriaNatureza){
		$this->idNatureza = $idNatureza;
		$this->natureza = $nomeNatureza;
		$this->idCategoria = $idCategoriaNatureza;
	}
	
	/**
	 * Function to set the id of a nature of a crime
	 * @param int $idNatureza
	 * @throws Exception ETipoErrado
	 */
	public function __setIdNatureza($idNatureza){
		if(!is_numeric($idNatureza)){
			throw new ETipoErrado();
		}
		$this->idNatureza = $idNatureza;
	}
	
	/**
	 * Function to get the id of a nature of a crime
	 * @return Object Category var $idNatureza
	 */
	public function __getIdNatureza(){
		return $this->idNatureza;
	}
	
	/**
	 * Function to set the id of the category of a crime
	 * @param int $idCategoria
	 * @throws Exception ETipoErrado
	 */
	public function __setIdCategoria($idCategoria){
	
		if(!is_numeric($idCategoria)){
			throw new ETipoErrado();
		}else{
		$this->idCategoria = $idCategoria;
		}
	}
	
	/**
	 * Function to get the id of a category of a crime
	 * @return Object Category var $idCategoria
	 */
	public function __getIdCategoria(){
		return $this->idCategoria;
	}
	
	/**
	 * Function to set the name of one nature of a crime
	 * @param String $natureza
	 * @throws Exception ETipoErrado
	 */
	public function __setNatureza($natureza){
		
		if(!is_string($natureza)){
			throw new ETipoErrado();
		}else{
		$this->natureza = $natureza;
		}
	}
	
	/**
	 * Function to get the name of a nature of a crime
	 * @return unknown
	 */
	public function __getNatureza(){
		return $this->natureza;
	}
}