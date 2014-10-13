<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/exceptions/ETipoErrado.php";

/**
 * The class Categoria is the model class of category.
 * All categories in the system are objects of this.
 */
class Categoria{
	
	/**
	 * Variables to specify the category of the crime
	 * @var int categoryId
	 * @var String categoryName
	 */
	private $categoryId; //Identifier of a category object
	private $categoryName; //Name of a category object
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct( ){
	
	}
	
	/**
	 * Full constructor to the object Categoria
	 * @param int $categoryId
	 * @param String $categoryName
	 */
	public function __constructOverload( $categoryId,$categoryName ){
	
		$this->categoryId = $categoryId;
		$this->categoryName = $categoryName;
	}
	
	/**
	 * Function to set the id of the category of the crime
	 * @param int $categoryId
	 * @throws Exception ETipoErrado
	 */
	public function __setCategoryId( $categoryId ){
		
		if ( !is_numeric( $categoryId ) ){
			throw new ETipoErrado();
		}else{
			//nothing to do here
		}
		$this->$categoryId = $categoryId;
	}
	
	/**
	 * Function to get the id of the category of the crime
	 */
	public function __getCategoryId( ){
		return $this->categoryId;
	}
	
	/**
	 * Function to set the name of the category of the crime
	 * @param String $categoryName
	 * @throws Exception ETipoErrado
	 */
	public function __setCategoryName( $categoryName ){
		
		if( !is_string( $categoryName ) ){
			throw new ETipoErrado();
		}else{
			//nothig to do here
		}
		$this->categoryName = $categoryName;
	}
	
	/**
	 * Function to get the name of the category of the crime
	 * @return Object Categoria var $categoryName 
	 */
	public function __getCategoryName( ){
		return $this->categoryName;
	}
	
}