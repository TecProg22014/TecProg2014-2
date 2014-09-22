<?php

include_once "persistence/categoriaDAO.php";
include_once "model/Categoria.php";
include_once "exceptions/EErroConsulta.php";
/**
 * The CategoriaController class is the class that controls the CRUD of categories of crimes.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $categoryDAO.
 */
class CategoriaController {
	
	/**
	 * Variable to instance a object to percist in the database
	 * @var categoryDAO
	 */
	private $categoryDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct() {
		$this->categoryDAO = new CategoriaDAO ();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste() {
		$this->categoryDAO->__constructTeste ();
	}
	
	/**
	 * Function to list all categories of crimes
	 * @return Array $categoryArray
	 */
	public function getAllCategories() {
		$categoryArray = $this->categoryDAO->listAll ();
		return $categoryArray;
	}
	
	/**
	 * Function to alphabetically list all categories of crimes
	 * @return Array $categories
	 */
	public function _getAlphabeticallyAllCategories() {
		return $this->categoryDAO->alphabeticallyListAll ();
	}
	
	/**
	 * Function to select one category by the id
	 * @param int $id        	
	 * @throws Exception EErroConsulta
	 * @return String $category
	 */
	public function _getCategoryById( $id ) {
		if (! is_numeric ( $id  ) ) {
			throw new EErroConsulta ();
		} else {
			$category = $this->categoryDAO->idFind ( $id );
		}
		return $category;
	}
	
	/**
	 * Function to select one category by the name
	 * @param String $nomeCategoria        	
	 * @throws Exception EErroConsulta
	 * @return string $category
	 */
	public function _getCategoryByName( $categoryName ) {
		if (! is_string ( $categoryName  ) ) {
			throw new EErroConsulta ();
		} else {
			$category = $this->categoryDAO->nameFind ( $categoryName );
		}
		return $category;
	}
	
	/**
	 * Function to insert one category in the database
	 * @param Categoria $category        	
	 * @return boolean $result
	 */
	public function _saveCategory(Categoria $category ) {
		return $this->categoryDAO->addCategory ( $category  );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of categories
	 * @param Array $categoryArray        	
	 * @throws Exception EErroConsulta
	 * @return boolean $return
	 */
	public function _saveCategoriesParseArray( $categoryArray ) {
		if (! is_array ( $categoryArray  ) ) {
			throw new EErroConsulta ();
		} else {
		$dadosCategoria = new Categoria ();
			for($i = 0; $i < count ( $categoryArray ); $i ++) {
				$categoryData->__setNomeCategoria ( $categoryArray [$i] );
				$return = $this->categoryDAO->addCategory ( $categoryData );
			}
		}
		
		return $return;
	}
	
	/**
	 * Function to sum all the stealing
	 * @return int $returnSumOfAllStealing
	 */
	public function _sumAllStealing() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllStealing [] = $this->categoryDAO->totalStealing ( $i  );
		}
		$returnSumOfAllStealing = array_sum ( $sumOfAllStealing  );
		return $returnSumOfAllStealing;
	}
	
	/**
	 * Function to sum the total of sexual crimes
	 * @return int $returnSumOfAllSexualCrimes
	 */
	public function _sumAllSexualCrimes() {
		$sumOfAllSexualCrimes;
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfAllSexualCrimes [] = $this->_sumAllSexualCrimes ( $i  );
		}
		$returnSumOfAllSexualCrimes = array_sum ( $sumOfAllSexualCrimes  );
		return $returnSumOfAllSexualCrimes;
	}
	
	/**
	 * Function to sum the total of sexual crimes between 2010 and 2011
	 * @return $returnSumOfSexualCrimes2010_2011
	 */
	public function _sumSexualCrimes2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfSexualCrimes2010_2011 [] = $this->_sumAllSexualCrimes ( $i  );
		}
		$returnSumOfSexualCrimes2010_2011 = array_sum ( $sumOfSexualCrimes2010_2011  );
		return $returnSumOfSexualCrimes2010_2011;
	}
	
	/**
	 * Function to sum all the cops interventions
	 * @return int $returnSumOfAllCopsActions
	 */
	public function _sumAllCopsActions() {
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfAllCopsActions [] = $this->_sumAllCopsActions ( $i  );
		}
		$returnSumOfAllCopsActions = array_sum ( $sumOfAllCopsActions  );
		return $returnSumOfAllCopsActions;
	}
	
	/**
	 * Function to sum all the cops interventions between 2010 and 2011
	 * @return int $returnSumOfAllCopsActions2010_2011
	 */
	public function _sumAllCopsActions2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllCopsActions2010_2011 [] = $this->_sumAllCopsActions ( $i  );
		}
		$returnSumOfAllCopsActions2010_2011 = array_sum ( $sumOfAllCopsActions2010_2011  );
		return $returnSumOfAllCopsActions2010_2011;
	}
	
	/**
	 * Function to sum all the crimes against citizens
	 * @return int $returnSumOfAllCrimesAgainsCitizens
	 */
	public function _sumAllCrimesAgainsCitizens() {
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfAllCrimesAgainsCitizens [] = $this->categoryDAO->totalCrimeInPerson ( $i  );
		}
		$returnSumOfAllCrimesAgainsCitizens = array_sum ( $sumOfAllCrimesAgainsCitizens  );
		return $returnSumOfAllCrimesAgainsCitizens;
	}
	
	/**
	 * Function to sum all the crimes against citizens between 2010 and 2011
	 * @return int $returnSumOfAllCrimesAgainsCitizens2010_2011
	 */
	public function _sumAllCrimesAgainsCitizens2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllCrimesAgainsCitizens2010_2011 [] = $this->categoryDAO->totalCrimeInPerson ( $i  );
		}
		$returnSumOfAllCrimesAgainsCitizens2010_2011 = array_sum ( $sumOfAllCrimesAgainsCitizens2010_2011  );
		return $returnSumOfAllCrimesAgainsCitizens2010_2011;
	}
	
	/**
	 * Function to sum the total of theft crimes
	 * @return int $returnSumOfAllTheft
	 */
	public function _sumAllTheft() {
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfAllTheft [] = $this->categoryDAO->totalTheft ( $i  );
		}
		$returnSumOfAllTheft = array_sum ( $sumOfAllTheft  );
		return $returnSumOfAllTheft;
	}
	
	/**
	 * Function to sum the total of theft crimes between 2010 and 2011
	 * @return int $returnSumOfAllTheft2010_2011
	 */
	public function _sumAllTheft2010_2011() {
		for( $i = 2010; $i < 2012; $i ++  ) {
			$sumOfAllTheft2010_2011 [] = $this->totalTheft ( $i );
		}
		$returnSumOfAllTheft2010_2011 = array_sum ( $sumOfAllTheft2010_2011  );
		return $returnSumOfAllTheft2010_2011;
	}
	
	/**
	 * Function to count how many categories exists in the database
	 * @return int $total
	 */
	public function _countCategories() {
		return $this->categoryDAO->recordsCount ();
	}
	
	/**
	 * Function to list all the categories applying them in labels
	 * @return String $labels      
	 */
	public function _listCategories() {
		$categories = $this->categoryDAO->totalCategories ();
		return "
		var data = [
		{ label: \"" . $categories ["nome"] [0] . "\",  data: " . $categories ["quantidade"] [0] . "},
		{ label: \"" . $categories ["nome"] [1] . "\",  data: " . $categories ["quantidade"] [1] . "},
		{ label: \"" . $categories ["nome"] [2] . "\",  data: " . $categories ["quantidade"] [2] . "},
		{ label: \"" . $categories ["nome"] [3] . "\",  data: " . $categories ["quantidade"] [3] . "},
		{ label: \"" . $categories ["nome"] [4] . "\",  data: " . $categories ["quantidade"] [4] . "}
		];";
	}
}