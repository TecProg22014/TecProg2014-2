<?php
include_once "/controller/TempoController.php";

class TempoView {
	/**
	 * Variable to instance an object of time controller
	 * @var $timeController
	 */
	private $timeController;
	
	/**
	 * Constructor to instance an object of time controller
	 */
	public function __construct() {
		$this->timeController = new TempoController ();
	}
	
	/**
	 * Function to get data of all periods of time organized in labels
	 * @return String $dataInLabels
	 */
	public function getFormatedTimeData() {
		return $this->timeController->_formatDataList ();
	}
}