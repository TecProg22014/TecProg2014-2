<?php

include_once "/exceptions/ETipoErrado.php";

/**
 * The class Categoria is the model class of category.
 * All categories in the system are objects of this.
 */
class Categoria{
	
	/**
	 * Variables to specify the category of the crime
	 * @var int idCategoria
	 * @var String nomeCategoria
	 */
	private $idCategoria;
	private $nomeCategoria;
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct( ){
	
	}
	
	/**
	 * Full constructor to the object Categoria
	 * @param int $idCategoria
	 * @param String $nomeCategoria
	 */
	public function __constructOverload( $idCategoria,$nomeCategoria ){
	
		$this->idCategoria = $idCategoria;
		$this->nomeCategoria = $nomeCategoria;
	}
	
	/**
	 * Function to set the id of the category of the crime
	 * @param int $idCategoria
	 * @throws Exception ETipoErrado
	 */
	public function __setIdCategoria( $idCategoria ){
		
		if (!is_numeric( $idCategoria ) ){
			throw new ETipoErrado( );
		}
		$this->idCategoria = $idCategoria;
	}
	
	/**
	 * Function to get the id of the category of the crime
	 */
	public function __getIdCategoria( ){
		return $this->idCategoria;
	}
	
	/**
	 * Function to set the name of the category of the crime
	 * @param String $nomeCategoria
	 * @throws Exception ETipoErrado
	 */
	public function __setNomeCategoria( $nomeCategoria ){
		
		if(!is_string( $nomeCategoria ) ){
			throw new ETipoErrado( );
		}
		$this->nomeCategoria = $nomeCategoria;
	}
	
	/**
	 * Function to get the name of the category of the crime
	 * @return Object Categoria var $nomeCategoria 
	 */
	public function __getNomeCategoria( ){
		return $this->nomeCategoria;
	}
	
}