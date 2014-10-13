<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/exceptions/ETipoErrado.php";

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
	private $administrativeRegionId; //Identifier of the administrative regions of a crime, a kind of city
	private $administrativeRegionName; //Name of a adminitrative region of crime
	
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
	public function __constructOverLoad( $administrativeRegionId, $administrativeRegionName ){
		
		$this->administrativeRegionId = $administrativeRegionId;
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
			//nothing to do here
		}
		$this->administrativeRegionId = $administrativeRegionId;
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
			//nothing to do here
		}
		$this->nomeRegiao = $nomeRegiao;
	}
	
	/**
	 * Function to get the name of an administrative region where one crime has occurred
	 * @return Object RegiaoAdministrativa var $administrativeRegionName
	 */
	public function __getAdministrativeRegionName( ){

		return $this->administrativeRegionName;
	}
}