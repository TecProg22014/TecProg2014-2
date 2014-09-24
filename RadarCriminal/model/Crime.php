<?php

include_once "/exceptions/EFalhaLeituraSerieCrime.php";
include_once "/exceptions/ETipoErrado.php";

/**
 * The class Crime is the model class of crime.
 * All crimes in the system are objects of this.
 */
class Crime{
	
	/**
	 * Variables to that define a crime
	 * @var int crimeId
	 * @var int amount
	 * @var int timeId
	 * @var int natureId
	 * @var int raId
	 * @var String exceptionCrime
	 */
	private $crimeId; //Identifier of a crime
	private $amount; //Amount of crime
	private $timeId; //Identifier of the time of a crime
	private $natureId; //Identifier of the nature of a crime
	//RA = brazilian acronym for administrative region, a kind of city
	private $raId; //Identifier of the administrative regions of a crime 
	private $exceptionCrime; //Variable to throws exception of a crime
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct( ){
	
	}
	
	/**
	 * Full constuctor of an object Crime
	 * @param int $crimeId
	 * @param int $timeId
	 * @param int $natureId
	 * @param int $amount
	 */
	public function __constructOverload( $crimeId,$timeId,$natureId,$amount ){
		$this->crimeId = $crimeId;
		$this->timeId = $timeId;
		$this->natureId = $natureId;
		$this->amount = $amount;
	}
	
	/**
	 * Function to set the id of the crime
	 * @param int $crimeId
	 * @throws Exception ETipoErrado
	 */
	public function __setCrimeId( $crimeId ){


		if( !is_numeric( $crimeId ) ){
			throw new ETipoErrado();
		}else{
			//nothing to do here
		}
		$this->idCrime = $idCrime;
	}
	
	/**
	 * Function to get the value of the id of some crime
	 */
	public function __getCrimeId( ){
		return $this->crimeId;
	}
	
	/**
	 * Function to set the sum of how many times one crime has occurred
	 * @param int $amount
	 */
	public function __setAmount( $amount ){
	
		$this->amount = $amount;
	}
	
	/**
	 * Function to get the quantity of times one crime has occurred
	 * @return Object Crime var $amount
	 */
	public function __getAmount( ){
		return $this->amount;
	}
	
	/**
	 * Function to set one array of periods of time counted to show percents of crimes
	 * @param int $timeId
	 */
	public function __setTimeId( $timeId ){
		
		$this->timeId = $timeId;
	}
	
	/**
	 * Function to get the arrays of periods related to crimes
	 * @return Object Crime var $timeId
	 */
	public function __getTimeId( ){
		return $this->timeId;
	}
	
	/**
	 * Function to set the id of the nature of one crime
	 * @param int $natureId
	 */
	public function __setNatureId( $natureId ){
		
		$this->natureId = $natureId;
	}
	
	/**
	 * Function to get the id of the nature of one crime
	 * @return Object Crime var $natureId
	 */
	public function __getNatureId( ){
		return $this->natureId;
	}
	
	/**
	 * Function to set the Administrative Region of one crime has occurred
	 * @param int $raId
	 */
	public function __setRaId( $raId ){
		$this->raId = $raId;
	}
	
	/**
	 * Function to get the Administrative Region of one crime has occurred
	 */
	public function __getRaId( ){
		return $this->raId;
	}
	
}