<?php
include_once "/controller/RegiaoAdministrativaController.php";

class RegiaoAdministrativaView {
	/**
	 * Variable to instance a new object of administrative region controller
	 * @var $administrativeRegionController
	 */
	private $administrativeRegionController;
	
	/**
	 * Constructor to instance a new object of administrative region controller
	 */
	public function __construct() {
		$this->administrativeRegionController = new RegiaoAdministrativaController ();
	}
	
	/**
	 * unction to get alphabetically all the administrative regions
	 * @return string $administrativeRegionReturn
	 */
	public function getAllAdministrativeRegionsAlphabetically() {
		$administrativeRegionName = $this->administrativeRegionController->_getAdministrativeRegionsAlphabetically ();
		for($i = 0, $administrativeRegionReturn = ""; $i < count ( $administrativeRegionName ); $i ++) {
			$administrativeRegionReturn = $administrativeRegionReturn . "<li><a class=\"submenu\" href=\"?pag=u\"><i class=\"icon-map-marker\"></i><span class=\"hidden-tablet\">" . $administrativeRegionName [$i] . "</span></a></li>";
		}
		return $administrativeRegionReturn;
	}
	
	/**
	 * Function to get the count of administrative region regists exist
	 * @return int $countRA
	 */
	public function countAdministrativeRegions() {
		return $this->administrativeRegionController->_countAdministrativeRegions ();
	}
}