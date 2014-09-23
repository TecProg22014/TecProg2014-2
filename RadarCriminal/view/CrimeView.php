<?php


include_once "/controller/crimeControllerntroller.php";
class CrimeView{
	
	/**
	 * Variable to instance one object of crime controller
	 * @var crimeController
	 */
	private $crimeControllerntroller;

	/**
	 * Constructor to instance a new object of crime controller
	 */
	public function __construct(){
		$this->crimeController = new crimeControllerntroller();
	}

	/**
	 * Function to get data of crimes that will be represented on a graph
	 * @return String $dataGraph  *refactor
	 */
	public function getCrimesData(){
		return $this->crimeController-> SOLVE>>>>>>>>>>>>>>>>>>>>>>> getCrimesData();
	}

	/**
	 * Function to get the sum of all crimes per year
	 * @param String $year
	 * @return int $SumOfCrimes  *refactor
	 */
	public function sumCrimesPerYear($year){
		return $this->crimeController->_sumCrimesPerYear($year);
	}
	
	/**
	 * Function to get the sum of crimes related with onte type of nature
	 * @param string $nature
	 * @return int $numberOfCrimes   *refactor
	 */
	public function sumCrimesPerNature($nature){
		return $this->crimeController->_sumCrimesByNature($nature);
	}
	
	/**
	 * Function to get the sum of crimes of all years
	 * @return int $numberOfCrimes    *refactor
	 **/
	public function _sumAllTimesCrimes(){
		return $this->crimeController->_sumCrimesOfAllYears();
	}

	/**
	 * Function to get the sum of how many crimes happened between 2010 and 2011
	 * @return int $numberOfCrimes    *refactor
	 */
	public function _sumCrimes2010_2011(){
		return $this->crimeController->_sumCrimes2010_2011();
	}
	
	/**
	 * Function to get the sum of how many homicides happened between 2010 and 2011
	 * @return int $numberOfCrimes    *refactor
	 **/
	public function _sumHomicides2010_2011(){
		return $this->crimeController->_sumHomicides2010_2011();
	}

	/**
	 * Function to get the sum of all homicides 
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _sumAllHomicides(){
		return $this->crimeController->_sumAllHomicides();
	}

	/**
	 * Function to get the sum of all injury
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _sumAllInjury(){
		return $this->crimeController->_sumAllInjury();
	}

	/**
	 * Function to get the sum of all injury between 2010 and 2011
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _sumInjury2010_2011(){
		return $this->crimeController->_sumInjury2010_2011();
	}

	/**
	 * Function to get the sum of all murder attempts
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _sumAllMurderAttempts(){
		return $this->crimeController->_sumAllMurderAttempts();
	}

	/**
	 * Function to get the sum of all murder attempts between 2010 and 2011
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _sumMurderAttepmts2010_2011(){
		return $this->crimeController->_sumMurderAttepmts2010_2011();
	}

	/**
	 * Function to get the sum of all crimes
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _sumAllCrimes(){
		return $this->crimeController->_sumAllCrimes();
	}
}
