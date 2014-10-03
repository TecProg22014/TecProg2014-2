<?php

include_once "/persistence/TempoDAO.php";
include_once "/model/Tempo.php";

/**
 * The TempoController class is the class that controls the CRUD of times of crimes.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $timeDAO.
 */
class TempoController {
	
	/**
	 * Variable to instance a object to percist in the database 
	 * @var unknown
	 */
	private $timeDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct() {
		$this->timeDAO = new TempoDAO ();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTest() {
		$this->timeDAO->__constructTest ();
	}
	
	/**
	 * Function to list all the periods of time checked in the database
	 * @return array $periodos
	 */
	public function _getAllTimes() {
		return $this->timeDAO->listAll ();
	}
	
	/**
	 * Select all the periods of time order by ascendent years of the periods
	 * @return Array $times
	 */
	public function _getTimesOrderedByTimePeriods() {
		return $this->timeDAO->OrderListAll ();
	}
	
	/**
	 * Select one specific period of time by the id
	 * @param int $id
	 * @return String $time
	 */
	public function _consultarPorId( $id ) {
		return $this->timeDAO->consultarPorId ( $id  );
	}
	
	/**
	 * Function to select a period of time by the interval 
	 * @param String $idInterval
	 * @return String $periodo    *refactor
	 */
	public function _getTimeById( $idInterval ) {
		return $this->timeDAO->idFind ( $idInterval  );
	}
	
	/**
	 * Function to insert a period of time that crimes had been occurred
	 * @param Tempo $time
	 * @return boolean $registered     *refactor
	 */
	public function _savePeriodOfTime( Tempo $time ) {
		return $this->timeDAO->addTime ( $time  );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of periods of time
	 * @param Array $timeArray
	 * @return boolean $registered     *refactor
	 */
	public function _saveArrayParsePeriodsOfTime( $timeArray ) {
		for( $i = 0; $i < count ( $timeArray  ); $i ++ ) {
			$timeData = new Tempo ();
			$timeData->__setInterval ( $timeArray [$i]  );
			$this->timeDAO->addTime ( $timeData  );
		}
	}
	
	/**
	 * Function to insert in the database the separate values of an array of four months periods  
	 * @param Array $timeArray
	 * @return $registered        *refactor
	 */
	public function saveQuarterlyArrayParsePeriodsOfTime( $timeArray ) {
		for( $i = 0, $yearArray = $timeArray; $i < count ( $timeArray  ); $i ++ ) {
			$year = key ( $yearArray  );
			$timeData = new Tempo ();
			$timeData->__setIntervalo ( $year  );
			for( $j = 0; $j < count ( $timeArray [$year]  ); $j ++ ) {
				$timeData->__setMes ( $timeDataArray [$year] [$j]  );
				$this->timeDAO->addTime ( $timeData  );
			}
			next ( $yearArray  );
		}
	}
	
	/**
	 * Function to list all the periods of time applying them in labels
	 * @return String $labels 
	 */
	public function _formatDataList() {
		$timeData = new Tempo ();
		$timeDataArray = $this->_getAllTimes ();
		for( $i = 0; $i < count ( $timeDataArray  ); $i ++ ) {
			$timeData = $timeDataArray [$i];
			$data [$i] = $timeData->__getInterval ();
		}
		return "labels : [\"$data[0]\",\"$data[1]\",\"$data[2]\",\"$data[3]\",\"$data[4]\",\"$data[5]\",
						   \"$data[6]\",\"$data[7]\",\"$data[8]\",\"$data[9]\",\"$data[10]\"]";
	}
}