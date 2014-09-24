<?php

include_once "/persistence/CrimeDAO.php";
include_once "/persistence/TempoDAO.php";
include_once "/persistence/NaturezaDAO.php";
include_once "/persistence/CategoriaDAO.php";
include_once "/persistence/RegiaoAdministrativaDAO.php";
include_once "/model/Crime.php";
include_once "/model/Tempo.php";
include_once "/model/Natureza.php";
include_once "/model/Categoria.php";
include_once "/model/RegiaoAdministrativa.php";

/**
 * The CrimeController class is the class that controls the CRUD of crimes.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $crimeDAO.
 */
class CrimeController {
	
	/**
	 * Variable to instance a object to percist in the database
	 * 
	 * @var crimeDAO
	 */
	private $crimeDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct() {
		$this->crimeDAO = new CrimeDAO ();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTest() {
		$this->crimeDAO->__constructTest ();
	}
	
	/**
	 * Function to select all crimes
	 * 
	 * @return Array $result
	 */
	public function _getAllCrimes() {
		return $this->crimeDAO->listAll ();
	}
	
	/**
	 * Function to select one crime by the id
	 * 
	 * @param int $id        	
	 * @return Object $crime
	 */
	public function _getCrimeById( $id ) {
		return $this->crimeDAO->idFind ( $id  );
	}
	
	/**
	 * Function to select crimes by the id of one nature
	 * 
	 * @param int $idNature        	
	 * @return Object Crime
	 */
	public function _getCrimesByNatureId( $idNature ) {
	}
	
	/**
	 * Function to select crimes by the id of one period
	 * 
	 * @param int $timeId        	
	 * @return Object Crime
	 */
	public function _getCrimesByTimeId( $timeId ) {
		return $this->crimeDAO->timeIdFind ( $timeId  );
	}
	
	/**
	 * Function to insert a new crime in the database
	 * 
	 * @param Crime $crime        	
	 * @return boolean $registered *refactor
	 */
	public function _saveCrime(Crime $crime ) {
		return $this->crimeDAO->addCrime ( $crime  );
	}
	
	/**
	 * Function to return the sum of one type of nature crimes
	 * 
	 * @param String $nature        	
	 * @return number $sumOfCrimes *refactor
	 */
	public function _sumCrimesByNature( $nature) {
		return $this->crimeDAO->totalNatureCrime ( $nature );
	}
	
	/**
	 * Function to return the sum of one type of nature crimes in one period of time
	 * 
	 * @param String $nature        	
	 * @param String $year     	
	 * @return number $sumOfCrimes *refactor
	 */
	public function _sumCrimesByNaturePerYear( $nature, $year ) {
		return $this->crimeDAO->totalNatureInYearCrime ( $nature, $year  );
	}
	
	/**
	 * Funtion to return the sum of crimes per period of time
	 * 
	 * @param String $year        	
	 * @return number $sumOfCrimes *refactor
	 */
	public function _sumCrimesPerYear( $year ) {
		return $this->crimeDAO->totalYearCrime ( $year  );
	}
	
	/**
	 * Function to return the sum of all time crimes
	 * 
	 * @return number $sumOfAllCrimes *refactor
	 *        
	 */
	public function _sumCrimesOfAllYears() {
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfCrimesOfAllYears [] = $this->_sumCrimesPerYear ( $i  );
		}
		
		$returnSumOfCrimesOfAllYears = array_sum ( $sumOfCrimesOfAllYears  );
		return $returnSumOfCrimesOfAllYears;
	}
	
	/**
	 * Function to insert in the database the separate values of an array of crimes
	 * 
	 * @param Array $crimeArray        	
	 * @return number 0 *refactor
	 */
	public function _saveParseArrayOfCrimes( $crimeArray ) {
		for( $i = 0, $arrayKey = $crimeArray, $inicio = 0; $i < count ( $crimeArray  ); $i ++ ) {
			$nature = key ( $arrayKey  );
			$natureData = new Natureza ();
			$natureDAO = new NaturezaDAO ();
			$natureData = $natureDAO->nameFind ( $nature  );
			$timeArray = $crimeArray [$nature];
			for( $j = 0; $j < count ( array_keys ( $crimeArray [$nature]  )  ); $j ++ ) {
				$time = key ( $timeArray  );
				$timeData = new Tempo ();
				$timeDAO = new TempoDAO ();
				$timeData = $timeDAO->intervalFind ( $time  );
				$crimeData = new Crime ();
				$crimeData->setNatureId ( $natureData->getNatureId ()  );
				$crimeData->setTimeId ( $timeData->__getIdTempo ()  );
				$crimeData->setAmount ( $crimeArray [$nature] [$time]  );
				$this->_saveCrime ( $crimeData  );
				next ( $timeArray  );
			}
			next ( $arrayKey  );
		}
		return 0;
	}
	
	/**
	 * Function to insert in the database the separate values of an array of crimes ordered by four months periods of time
	 * 
	 * @param Array $crimeArray        	
	 */
	public function saveQuarterlyParseArrayOfCrimes( $crimeArray ) {
		for( $i = 0, $arrayKey = $crimeArray, $inicio = 0; $i < count ( $crimeArray  ); $i ++ ) {
			$nature = key ( $arrayKey  );
			$natureData = new Natureza ();
			$natureDAO = new NaturezaDAO ();
			$natureData = $natureDAO->nameFind ( $nature  );
			$timeArray = $crimeArray [$nature];
			for( $j = 0; $j < count ( array_keys ( $crimeArray [$nature]  )  ); $j ++ ) {
				$time = key ( $timeArray  );
				$timeData = new Tempo ();
				$timeDAO = new TempoDAO ();
				$timeData = $timeDAO->consultarPorMes ( $time  );
				$crimeData = new Crime ();
				$crimeData->setNatureId ( $natureData->getNatureId ()  );
				$crimeData->setTimeId ( $timeData->__getIdTempo ()  );
				$crimeData->setAmount ( $crimeArray [$nature] [$time]  );
				$this->inserirCrime ( $crimeData  );
				next ( $timeArray  );
			}
			next ( $arrayKey  );
		}
	}
	
	/**
	 * Function to insert in the database the separate values of an array of crimes ordered by administrative regions
	 * 
	 * @param Array $crimeArray        	
	 */
	public function saveParseArrayOfCrimesInOneAdministrativeRegion( $crimeArray ) {
		for( $i = 0, $arrayKey = $crimeArray, $inicio = 0; $i < count ( $crimeArray  ); $i ++ ) {
			$nature = key ( $arrayKey  );
			$natureData = new Natureza ();
			$natureDAO = new NaturezaDAO ();
			$natureData = $natureDAO->nameFind ( $nature  );
			$arrayRegiao = $crimeArray [$nature];
			for( $j = 0; $j < count ( array_keys ( $crimeArray [$nature]  )  ); $j ++ ) {
				$regiao = key ( $arrayRegiao  );
				$dadosRegiao = new RegiaoAdministrativa ();
				$regiaoDAO = new RegiaoAdministrativaDAO ();
				$dadosRegiao = $regiaoDAO->nameFind ( $regiao  );
				$timeArray = $crimeArray [$nature] [$regiao];
				for( $x = 0; $x < count ( array_keys ( $crimeArray [$nature] [$regiao]  )  ); $x ++ ) {
					$time = key ( $timeArray  );
					$timeData = new Tempo ();
					$timeDAO = new TempoDAO ();
					$timeData = $timeDAO->intervalFind ( $time  );
					$crimeData = new Crime ();
					$crimeData->setNatureId ( $natureData->getNatureId ()  );
					$crimeData->__setIdRegiaoAdministrativa ( $dadosRegiao->__getIdRegiaoAdministrativa ()  );
					$crimeData->setTimeId ( $timeData->__getIdTempo ()  );
					$crimeData->setAmount ( $crimeArray [$nature] [$regiao] [$time]  );
					$this->crimeDAO->inserirCrime ( $crimeData  );
					next ( $timeArray  );
				}
				
				next ( $arrayRegiao  );
			}
			next ( $arrayKey  );
		}
	}
	
	/**
	 * Function to return the sum of crimes that will be represented in a graph
	 * 
	 * @return string $FormatedCrimeData
	 */
	public function sumCrimesToGraph() {
		$timeDAO = new TempoDAO ();
		$timeData = new Tempo ();
		$timeDataArray = $timeDAO->listarTodos ();
		for( $i = 0; $i < count ( $timeDataArray  ); $i ++ ) {
			$timeData = $timeDataArray [$i];
			$dados [$i] = $timeData->getInterval ();
		}
		for( $i = 0; $i < count ( $dados  ); $i ++ ) {
			$crimeData [$i] = $this->sumCrimesPerYear ( $dados [$i]  );
			$crimeDataTitle [$i] = number_format ( $crimeData [$i], 0, ',', '.'  );
		}
		
		for( $i = 0; $i < count ( $crimeData  ); $i ++ ) {
			/**
			 * Loop that defines what will be represented in the graph
			 * the string ("\"bar\"" ) defines the graphs full bar and
			 * the string ("\"bar simple\"" ) defines the graphs dotted bar
			 * The conditional 'if( $i%2==0 )' grants that the dotted and full bars will be intercalated.
			 * Returns the concatenated strings array
			 */
			if ( $i % 2 == 0 ) {
				$varbar = "\"bar\"";
			} else {
				$varbar = "\"bar simple\"";
			}
			$FormatedCrimeData [] = "<div class=" . $varbar . "title=\"" . $crimeDataTitle [$i] . " Ocorrencias\">
									   		<div class=\"title\">" . $dados [$i] . "</div>
									   		<div class=\"value\">" . $crimeData [$i] . "</div>
									   </div>";
			if ($i != 0) {
				$FormatedCrimeData [0] = $FormatedCrimeData [0] . $FormatedCrimeData [$i];
			} else {
				//nothing to do here
			}
		}
		
		return $FormatedCrimeData [0];
	}
	
	/**
	 * Function to sum all the homicides between 2010 and 2011
	 * @return  int $returnSumOfAllHomicides2010_2011
	 */
	public function _sumHomicides2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllHomicides2010_2011 [] = $this->crimeDAO->totalMurder ( $i  );
		}
		
		$returnSumOfAllHomicides2010_2011 = array_sum ( $sumOfAllHomicides2010_2011  );
		return $returnSumOfAllHomicides2010_2011;
	}
	
	/**
	 * Function to sum all the crimes between 2010 and 2011
	 * @return int $returnSumOfAllCrimes2010_2011
	 */
	public function _sumCrimes2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllCrimes2010_2011 [] = $this->sumCrimesPerYear ( $i  );
		}
		$returnSumOfAllCrimes2010_2011 = array_sum ( $sumOfAllCrimes2010_2011  );
		return $returnSumOfAllCrimes2010_2011;
	}
	
	/**
	 * Function to sum all the homicides
	 * @return int $returnSumOfAllHomicides
	 */
	public function _sumAllHomicides() {
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfAllHomicides [] = $this->crimeDAO->totalMurder ( $i  );
		}
		
		$returnSumOfAllHomicides = array_sum ( $sumOfAllHomicides  );
		return $returnSumOfAllHomicides;
	}
	
	/**
	 * Function to sum all the injury 
	 * @return int $retornSumOfAllInjury
	 */
	public function _sumAllInjury() {
		for( $i = 2001; $i < 2012; $i ++ ) {
			$sumOfAllInjury [] = $this->crimeDAO->totalInjury ( $i  );
		}
		$retornSumOfAllInjury = array_sum ( $sumOfAllInjury  );
		return $retornSumOfAllInjury;
	}
	
	/**
	 * Function to sum all the injury between 2010 and 2011
	 * @return number
	 */
	public function _sumIjnury2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllInjury2010_2011 [] = $this->_somaLesaoCorporal ( $i  );
		}
		$retornSumOfAllInjury2010_2011 = array_sum ( $sumOfAllInjury2010_2011  );
		return $retornSumOfAllInjury2010_2011;
	}
	
	/**
	 * Function to sum all the murder attempts
	 * @return int $retornSumOfAllMurderAttempts
	 */
	public function _sumAllMurderAttempts() {
		for( $j = 2001; $j < 2012; $j ++ ) {
			$sumOfAllMurderAttempts [] = $this->_sumAllMurderAttempts ( $j  );
		}
		$retornSumOfAllMurderAttempts = array_sum ( $sumOfAllMurderAttempts  );
		return $retornSumOfAllMurderAttempts;
	}
	
	/**
	 * Function to sum all the murder attempts between 2010 and 2011
	 * @return int $retornSumOfAllMurderAttempts2010_2011
	 */
	public function _sumMurderAttempts2010_2011() {
		for( $i = 2010; $i < 2012; $i ++ ) {
			$sumOfAllMurderAttempts2010_2011 [] = $this->crimeDAO->totalAttemptedMurder ( $i  );
		}
		$retornSumOfAllMurderAttempts2010_2011 = array_sum ( $sumOfAllMurderAttempts2010_2011  );
		return $retornSumOfAllMurderAttempts2010_2011;
	}
	
	/**
	 * Function to sum all the crimes
	 * @return int $totalCrimes
	 */
	public function _sumAllCrimes() {
		return $this->crimeDAO->totalCrime ();
	}
}