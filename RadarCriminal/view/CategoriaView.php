<?php
include_once "/controller/categoriaController.php";
include_once "/exceptions/EErroConsulta.php";

class CategoriaView {
	
	/**
	 * Variable to instance one object of category controller
	 * 
	 * @var $categoryController
	 */
	private $categoryController;
	
	/**
	 * Constructor to instance a new category controller
	 */
	public function __construct() {
		$this->categoryController = new CategoriaController();
	}
	
	/**
	 * Function to list all the categories
	 * @throws Exception EErroConsulta
	 * @return Array $categoryArray
	 */
	public function listAllCategories() {
		if (! is_array ( $categoryArray )) {
			throw new EErroConsulta ();
		}else{
			//nothing to do here
		}
		$categoryArray = $this->categoryController->_getAllCategories ();
		return $categoryArray;
	}
	
	/**
	 * Function to show alphabetically all the categories
	 * @return string $categoryReturn
	 */
	public function showAphabeticallyAllCategories() {
		$categoryArray = $this->categoryController->_getAlphabeticallyAllCategories ();
		for($i = 0, $categoryReturn = ""; $i < count ( $categoryArray ); $i ++) {
			$auxCategory = $categoryArray [$i];
			$categoryName = $auxCategory->__getNomeCategoria ();
			$categoryId = $auxCategory->__getIdCategoria ();
			$categoryReturn = $categoryReturn . "<li><a class=\"submenu\" 
							  href=\"?pag=cCat&id=$i\"><i class=\"icon-inbox\">
							  </i><span class=\"hidden-tablet\">$categoryName
							  </span></a></li>";
		}
		return $categoryReturn;
	}
	
	/**
	 * Function to select alphabetically all the categories
	 * @return Array $categoryArray
	 */
	public function listAphabeticallyAllCategories() {
		$categoryArray = $this->categoryController->_getAlphabeticallyAllCategories ();
		return $categoryArray;
	}
	
	/**
	 * Function to select one category by the id
	 * @param int $id
	 * @throws Exception EErroConsulta
	 * @return String $category
	 */
	public function _selectCategoryById($id) {
		if (get_class ( $category ) != 'Categoria') {
			throw new EErroConsulta ();
		}else{
			//nothing to do here
		}
		$category = $this->categoryController->getCategoryById ( $id );
		return $category;
	}
	
	/**
	 * Function to select one category by the name
	 * @param String $categoryName
	 * @throws Exception EErroConsulta
	 * @return String $category
	 */
	public function _selectCategoryByName($categoryName) {
		if (get_class ( $category ) != 'Categoria') {
			throw new EErroConsulta ();
		}else{
			//nothing to do here
		}
		$category = $this->categoryController->_consultarPorNome ( $categoryName );
		return $category;
		
	}
	
	/**
	 * Function to count how many categories exists
	 * @return int $number    *refactor
	 */
	public function countCategories() {
		return $this->categoryController->_countCategories ();
	}
	
	/**
	 * Function to get the sum all the sexual crimes
	 * @return int $number    *refactor
	 */
	public function _sumAllSexualCrimes() {
		return $this->categoryController->_sumAllSexualCrimes ();
	}
	
	/**
	 * Function to get the sum of sexual crimes between 2010 and 2011
	 * @return int $number  *refactor
	 */
	public function sumAllSexualCrimes2010_2011() {
		return $this->categoryController->sumSexualCrimes2010_2011 ();
	}
	
	/**
	 * Function to get the sum all the cops actions
	 * @return int $number    *refactor
	 */
	public function _sumAllCopsActions() {
		return $this->categoryController->_sumAllCopsActions ();
	}
	
	/**
	 * Function to get the sum of all cops actions between 2010 and 2011
	 * @return int $number    *refactor
	 */
	public function _sumAllCopsActions2010_2011() {
		return $this->categoryController->_sumCopsActions2010_2011 ();
	}
	
	/**
	 * Function to get the sum of all crimes against citizens
	 * * @return int $number    *refactor
	 */
	public function _sumAllCrimesAgainstCitizens() {
		return $this->categoryController->_sumAllCrimesAgainsCitizens ();
	}
	
	/**
	 * Function to get the sum of all the crimes against the citizens 
	 * between 2010 and 2011
	 * @return int $number    *refactor
	 */
	public function _sumAllCrimesAgainsCitizens2010_2011() {
		return $this->categoryController->_sumCrimesAgainsCitizens2010_2011 ();
	}
	
	/**
	 * Function to get the sum of all the theft crimes
	 * @return int $number    *refactor
	 */
	public function _sumAllTheft() {
		return $this->categoryController->_sumAllTheft ();
	}
	
	/**
	 * Function to get the sum of all the theft crimes between 2010 and 2011
	 * @return int $number    *refactor
	 */
	public function _sumAllTheft2010_2011() {
		return $this->categoryController->_sumTheft2010_2011 ();
	}
	
	/**
	 * Function to sum all the stealing crimes
	 * @return int $number    *refactor
	 */
	public function _sumAllStealing() {
		return $this->categoryController->_sumAllStealing ();
	}
	
	/**
	 * Function to get a String of all the categories organized in labels
	 */
	public function _listCategoriesInLabels() {
		return $this->categoryController->_listCategories ();
	}
}