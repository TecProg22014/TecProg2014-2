<?php


include_once "/controller/CrimeController.php";
class CrimeView{
	
	/**
	 * Variable to instance one object of crime controller
	 * @var crimeCO
	 */
	private $crimeCO;

	/**
	 * Constructor to instance a new object of crime controller
	 */
	public function __construct(){
		$this->crimeCO = new CrimeController();
	}

	/**
	 * Function to get data of crimes that will be represented on a graph
	 * @return String $dataGraph  *refactor
	 */
	public function retornarDadosCrimeSomadoFormatoNovo(){
		return $this->crimeCO->_retornarDadosDeSomaFormatoNovo();
	}

	/**
	 * Function to get the sum of all crimes per year
	 * @param String $ano
	 * @return int $SumOfCrimes  *refactor
	 */
	public function somaDeCrimePorAno($ano){
		return $this->crimeCO->_somaDeCrimePorAno($ano);
	}
	
	/**
	 * Function to get the sum of crimes related with onte type of nature
	 * @param string $natureza
	 * @return int $numberOfCrimes   *refactor
	 */
	public function somaDeCrimePorNatureza($natureza){
		return $this->crimeCO->_somaDeCrimePorNatureza($natureza);
	}
	
	/**
	 * Function to get the sum of crimes of all years
	 * @return int $numberOfCrimes    *refactor
	 **/
	public function _somaCrimeTodosAnos(){
		return $this->crimeCO->_somaCrimeTodosAnos();
	}

	/**
	 * Function to get the sum of how many crimes happened between 2010 and 2011
	 * @return int $numberOfCrimes    *refactor
	 */
	public function _somaCrime2010_2011(){
		return $this->crimeCO->_somaCrime2010_2011();
	}
	
	/**
	 * Function to get the sum of how many homicides happened between 2010 and 2011
	 * @return int $numberOfCrimes    *refactor
	 **/
	public function _somaHomicidios2010_2011(){
		return $this->crimeCO->_somaHomicidios2010_2011();
	}

	/**
	 * Function to get the sum of all homicides 
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _somaTotalHomicidios(){
		return $this->crimeCO->_somaTotalHomicidios();
	}

	/**
	 * Function to get the sum of all injury
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _somaLesaoCorporal(){
		return $this->crimeCO->_somaLesaoCorporal();
	}

	/**
	 * Function to get the sum of all injury between 2010 and 2011
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _somaLesaoCorporal2010_2011(){
		return $this->crimeCO->_somaLesaoCorporal2010_2011();
	}

	/**
	 * Function to get the sum of all murder attempts
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _somaTotalTentativasHomicidio(){
		return $this->crimeCO->_somaTotalTentativasHomicidio();
	}

	/**
	 * Function to get the sum of all murder attempts between 2010 and 2011
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _somaTotalTentativasHomicidio2010_2011(){
		return $this->crimeCO->_somaTotalTentativasHomicidio2010_2011();
	}

	/**
	 * Function to get the sum of all crimes
	 * @return int $numberOfCrimes   *refactor
	 */
	public function _somarGeral(){
		return $this->crimeCO->_somarGeral();
	}
}