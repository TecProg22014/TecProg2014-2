<?php

include_once "/exceptions/ETipoErrado.php";

/**
 * The class RegiaoAdministrativa is the model class of administrative regions.
 * All administrative regions in the system are objects of this.
 */
class RegiaoAdministrativa{
	
	/**
	 * Variables that describe one Administrative Region where one crime has occurred
	 * @var int administrativeRegionId
	 * @var String administrativeRegionName
	 */
	private $administrativeRegionId;
	private $administrativeRegionName;
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct( ){
	
	}
	
	/**
	 * Full constructor of an object Administrative Region that describes where one crime has occurred
	 * @param int $raId
	 * @param String $administrativeRegionName
	 */
	public function __constructOverLoad( $raId, $administrativeRegionName ){
		
		$this->administrativeRegionId = $raId;
		$this->administrativeRegionName = $administrativeRegionName;
	}
	
	/**
	 * Function to set the id of an administrative region where one crime has occurred
	 * @param int $administrativeRegionId
	 * @throws Exception ETipoErrado
	 */
	public function __setAdministrativeRegionId( $administrativeRegionId ){
	
		if( !is_numeric( $administrativeRegionId ) ){
			throw new ETipoErrado();
		}else{
			$this->administrativeRegionId = $administrativeRegionId;
		}
	}
	
	/**
	 * Function to get the id of an administrative region where one crime has occurred
	 * @return Object RegiaoAdministrativa var $administrativeRegionId
	 */
	public function __getAdministrativeRegionId( ){
		return $this->administrativeRegionId;
	}
	
	/**
	 * Function to set the name of an administrative region where one crime has occurred
	 * @param String $administrativeRegionName
	 * @throws Exception ETipoErrado
	 */
	public function __setAdministrativeRegionName( $administrativeRegionName ){
		
		if( !is_string( $administrativeRegionName ) ){
			throw new ETipoErrado();
		}else{
			$this->administrativeRegionName = $administrativeRegionName;

		}
	}
	
	/**
	 * Function to get the name of an administrative region where one crime has occurred
	 * @return Object RegiaoAdministrativa var $administrativeRegionName
	 */
	public function __getAdministrativeRegionName( ){

		return $this->administrativeRegionName;
	}
}