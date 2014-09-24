<?php

include_once "/persistence/RegiaoAdministrativaDAO.php";
include_once "/exceptions/EErroConsulta.php";
include_once "/model/RegiaoAdministrativa.php";

/**
 * The RegiaoAdministrativaController class is the class that controls the CRUD of administrative
 * regions where where some crime has occurred.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $administratveRegionsDAO.
 */
class RegiaoAdministrativaController {
	
	/**
	 * Variable to instance a object to percist in the database
	 * @var administrativeRegionDAO
	 */
	private $administrativeRegionDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct() {
		$this->administrativeRegionDAO = new RegiaoAdministrativaDAO ();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTest() {
		$this->administrativeRegionDAO->__constructTest ();
	}
	
	/**
	 * Function to select all the administrative regions of the database
	 * @return Array $administratveRegionsArray
	 */
	public function getAllAdministrativeRegions() {
		$administratveRegionsArray = $this->administrativeRegionDAO->listAll ();
		return $administratveRegionsArray;
	}
	
	/**
	 * Function to alphabetically list all administrative regions
	 * @return Array $administratveRegionsNames
	 */
	public function _getAdministrativeRegionsAlphabetically() {
		$administratveRegionsArray = $this->administrativeRegionDAO->alphabeticallyListAll ();
		for( $i = 0; $i < (count ( $administratveRegionsArray  ) ); $i ++ ) {
			$administratveRegionsNames [] = $administratveRegionsArray [$i]->getRegionName ();
		}
		return $administratveRegionsNames;
	}
	
	/**
	 * Function to select one administrative region by the id
	 * @param int $id        	
	 * @throws Exception EErroConsulta
	 * @return String $administratveRegions
	 */
	public function _getAdministrativeRegionById( $id ) {
		if (! is_numeric ( $id  ) ) {
			throw new EErroConsulta ();
		} else {
			//nothing to do here
		}
		$administratveRegions = $this->administrativeRegionDAO->idFind ( $id );
		return $administratveRegions;
	}
	
	/**
	 * Function to select one administrative region by the name
	 * @param int $nome        	
	 * @throws Exception EErroConsulta
	 * @return String $administratveRegions
	 */
	public function _getAdministrativeRegionByName( $nome ) {
		if (! is_string ( $nome  ) ) {
			throw new EErroConsulta ();
		} else {
			//nothing to do here
		}
		$administratveRegions = $this->administrativeRegionDAO->nameFind ( $nome );
		return $administratveRegions;
	}
	
	/**
	 * Function to count how many administrative regions exists in the database
	 * @return int $sum
	 */
	public function _countAdministrativeRegions() {
		return $this->administrativeRegionDAO->countAdministrativeRegions ();

	}
	
	/**
	 * Function to insert a new administrative region in the database
	 * @param RegiaoAdministrativa $administratveRegions        	
	 * @return boolean $registered *refactor
	 */
	public function _saveAdministrativeRegion(RegiaoAdministrativa $administratveRegions ) {
		return $this->administrativeRegionDAO->addAdministrativeRegion ( $administratveRegions  );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of administrative regions
	 * @param Array $administratveRegionsArray
	 *       
	 */
	public function _saveAdministrativeRegionParseArray( $administratveRegionsArray ) {
		for( $i = 0; $i < count ( $administratveRegionsArray  ); $i ++ ) {
			$administrativeRegionData = new RegiaoAdministrativa ();
			$administrativeRegionData->__setRegionName ( $administratveRegionsArray [$i]  );
			$this->administrativeRegionDAO->addAdministrativeRegion ( $administrativeRegionData  );
		}
	}
}