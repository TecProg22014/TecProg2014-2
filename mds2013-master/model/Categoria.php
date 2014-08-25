<?php
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Categoria{
	
	/**
	 * Variables to specify the category of the delict
	 * @var idCategoria
	 * @var nomeCategoria
	 */
	private $idCategoria;
	private $nomeCategoria;
	
	/**
	 * Function to set the id of the category of the delict
	 * @param int $idCategoria
	 * @throws ETipoErrado
	 */
	public function __setIdCategoria($idCategoria){
		
		if (!is_numeric($idCategoria)){
			throw new ETipoErrado();
		}
		$this->idCategoria = $idCategoria;
	}
	
	/**
	 * Function to return the id of the category of the delict
	 */
	public function __getIdCategoria(){
		return $this->idCategoria;
	}
	
	/**
	 * Function to set the name of the category of the delict
	 * @param unknown $nomeCategoria
	 * @throws ETipoErrado
	 */
	public function __setNomeCategoria($nomeCategoria){
		
		if(!is_string($nomeCategoria)){
			throw new ETipoErrado();
		}
		$this->nomeCategoria = $nomeCategoria;
	}
	
	/**
	 * Function to return the name of the category of the delict
	 * @return Object Categoria var nomeCategoria 
	 */
	public function __getNomeCategoria(){
		return $this->nomeCategoria;
	}
	
	/**
	 * Constructor to the object Categoria 
	 * @param unknown $idCategoria
	 * @param unknown $nomeCategoria
	 */
	public function __constructOverload($idCategoria,$nomeCategoria){
		
		$this->idCategoria = $idCategoria;
		$this->nomeCategoria = $nomeCategoria;
	}
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct(){
		
	}
}