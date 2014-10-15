<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/exceptions/ETipoErrado.php";

/**
 * The class Tempo is the model class of time.
 * All times in the system are objects of this.
 */
class Tempo{
	
	/**
	 * Variables that define the time of one crime
	 * @var int timeId
	 * @var int interval
	 * @var String month
	 */

	private $timeId; //Identifier of the time of a crime
	private $interval; //Value of one interval of time
	private $month; //Value of one month
	
	/**
	 * Function to set the id of the time of a crime
	 * @param int $timeId
	 * @throws Exception ETipoErrado
	 */
	public function __setTimeId( $timeId ){
		if(!is_numeric($timeId)){
			throw new ETipoErrado();
		}else{
			//nothing to do here
		}
		$this->timeId = $timeId;
	}
	/**
	 * Function to get the id of a time of a crime
	 * @return Object Time var $timeId
	 */
	public function __getTimeId( ){
		return $this->timeId;
	}
	/**
	 * Function to set the range of the time of a crime
	 * @param int $interval
	 * @throws Exception ETipoErrado
	 */
	public function __setInterval( $interval ){
		
		if(!is_numeric($interval)){
			throw new ETipoErrado();
		}else{
			//nothing to do here
		}
		$this->interval = $interval;
	}
	
	/**
	 * Function to get the range of a time of a crime
	 * @return Object Time var $interval
	 */
	public function __getInterval( ){
		return $this->interval;
	}
	
	/**
	 * Function to set the name of a month of a crime
	 *@param String month
	 */
	public function __setMonth( $month ){
		$this->month = $month;
	}
	
	/**
	 * Function to get the name of a month of a crime
	 * @return unknown
	 */
	public function __getMonth( ){
		return  $this->month;
	}

	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct( ){
		
	}
	
	/**
	 * Full constructor of an object Time that defines a crime
	 * @param int timeId
	 * @param int interval
	 * @param String month
	 */
	public function __constructOverload( $timeId,$interval,$month ){
		
		$this->timeId = $timeId;
		$this->interval = $interval;
		$this->month = $month;
	}
}