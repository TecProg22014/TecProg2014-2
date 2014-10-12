<?php

include_once "/exceptions/ETipoErrado.php";

/**
 * The class Natureza is the model class of nature.
 * All natures in the system are objects of this.
 */
class Natureza{
	
	/**
	 * Variables that define the nature of one crime
	 * @var int natureId
	 * @var String nature
	 * @var int categoryId
	 */
	private $natureId; //Identifier of a nature of crime
	private $nature; //Name of nature
	private $categoryId; //Identifier of a category of crime
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct( ){
		
	}
	
	/**
	 * Full constructor of an object Nature that defines a crime
	 * @param int $natureId
	 * @param String $natureName
	 * @param int $categoryNatureId
	 */
	public function __constructOverload( $natureId,$natureName,$categoryNatureId ){
		$this->natureId = $natureId;
		$this->nature = $natureName;
		$this->categoryId = $categoryNatureId;
	}
	
	/**
	 * Function to set the id of a nature of a crime
	 * @param int $natureId
	 * @throws Exception ETipoErrado
	 */
	public function __setNatureId( $natureId ){
		if( !is_numeric( $natureId ) ){
			throw new ETipoErrado(); 
		}else{
			//nothing to do here
		}
		$this->natureId = $natureId;
	}
	
	/**
	 * Function to get the id of a nature of a crime
	 * @return Object Category var $natureId
	 */
	public function __getNatureId( ){
		return $this->natureId;
	}
	
	/**
	 * Function to set the id of the category of a crime
	 * @param int $categoryId
	 * @throws Exception ETipoErrado
	 */
	public function __setCategoryId( $categoryId ){
	
		if(!is_numeric( $categoryId ) ){
			throw new ETipoErrado();
		}else{
			//nothing to do here
		}
		$this->categoryId = $categoryId;
	}
	
	/**
	 * Function to get the id of a category of a crime
	 * @return Object Category var $categoryId
	 */
	public function __getCategoryId( ){
		return $this->categoryId;
	}
	
	/**
	 * Function to set the name of one nature of a crime
	 * @param String $nature
	 * @throws Exception ETipoErrado
	 */
	public function __setNature( $nature ){
		if( !is_string( $nature ) ){
			throw new ETipoErrado();
		}else{
			//nothing to do here
		}
		$this->nature = $nature;
	}
	
	/**
	 * Function to get the name of a nature of a crime
	 * @return unknown
	 */
	public function __getNature( ){
		return $this->nature;
	}
}