<?php

include_once "/persistence/NaturezaDAO.php";
include_once "/persistence/CategoriaDAO.php";
include_once "/model/Natureza.php";
include_once "/model/Categoria.php";
include_once "/controller/CrimeController.php";
include_once "/exceptions/EErroConsulta.php";
include_once "/exceptions/EFalhaNaturezaController.php";

/**
 * The NaturezaController class is the class that controls the CRUD of natures of crimes.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $natureDAO.
 */
class NaturezaController {
	
	/**
	 * Variable to instance a object to percist in the database
	 * @var natureDAO
	 */
	private $natureDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct() {
		$this->natureDAO = new NaturezaDAO  ();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTest() {
		$this->natureDAO->__constructTest ();
	}
	
	/**
	 * Function to select all the natures of crimes
	 * @return Array $result
	 */
	public function _getAllNatures() {
		$result = $this->natureDAO->listAll ();
		
		return $result;
	}
	
	/**
	 * Function to alphabetically list all the natures of crimes
	 * @return Array $result
	 */
	public function _getNaturesAlphabetically() {
		$result = $this->natureDAO->alphabeticallyListAll ();
		return $result;
	}
	
	/**
	 * Function to select one nature of crime by the id
	 * @param int $id        	
	 * @throws Exception EErroConsulta
	 * @return String $nature
	 */
	public function _getNatureById($id) {
		if (! is_numeric ( $id )) {
			throw new EErroConsulta ();
		}else{
			$nature = $this->natureDAO->idFind ( $id );
		}
		return $nature;
	}
	
	/**
	 * Function to select one nature of crime by the name
	 * @param String $natureName
	 * @return String $nature
	 */
	public function getNatureByName( $natureName ) {
		$nature = $this->natureDAO->nameFind ( $natureName  );
		return $nature;
	}
	
	/**
	 * Function to select all the natures of crimes by one category's id
	 * @param int $id        	
	 * @return Array $returnNaturesByCategoryId
	 */
	public function getNatureByCategoryId( $id ) {
		return $this->natureDAO->idCategoryFind ( $id  );
	}
	
	/**
	 * Function to insert in the database one new nature of crime
	 * @param  Object Natureza $nature
	 * @return boolean $registered *refactor
	 */
	public function _saveNature(Natureza $nature ) {
		return $this->natureDAO->addNature ( $nature  );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of natures
	 * @param Array $natureArray        	
	 * @throws Exception EFalhaNaturezaController
	 * @return boolean $registered *refactor
	 */
	public function _inserirArrayParse( $natureArray ) {
		if (! is_array ( $natureArray  ) ) {
			throw new EFalhaNaturezaController ();
		} else {
			for($i = 0, $arrayKey = $natureArray, $begining = 0; $i < count ( $natureArray ); $i ++) {
				$key = key ( $arrayKey );
				$categoryDAO = new CategoriaDAO ();
				$categoryData = new Categoria ();
				$categoryData = $categoryDAO->nameFind ( $key );
				for($j = $begining; $j < (count ( $natureArray [$key] ) + $begining); $j ++) {
					$natureData = new Natureza ();
					$natureData->__setNatureza ( $natureArray [$key] [$j] );
					$natureData->__setIdCategoria ( $categoryData->__getIdCategoria () );
					$this->natureDAO->addNature ( $natureData );
				}
				$begining = $begining + count ( $natureArray [$key] );
				next ( $arrayKey );
			}
		}
		return $categoryData;
	}
	
	/**
	 * Function to list one matrix of related crime, title and time
	 * @param String $nature        	
	 * @return Array $dado
	 */
	public function _retornarDadosDeNaturezaFormatado( $nature ) {
		$timeDAO = new TempoDAO ();
		$crimeCO = new CrimeController ();
		$timeDataArray = $timeDAO->listAll ();
		$data;
		for( $i = 0; $i < count ( $timeDataArray  ); $i ++ ) {
			$data ['tempo'] [$i] = $timeDataArray [$i]->__getIntervalo ();
			$data ['crime'] [$i] = $crimeCO->_somaDeCrimePorNaturezaEmAno ( $nature, $data ['tempo'] [$i]  );
			$data ['title'] [$i] = number_format ( $data ['crime'] [$i], 0, ',', '.'  );
		}
		return $data;
	}
}