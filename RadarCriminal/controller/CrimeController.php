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
	public function __constructTeste() {
		$this->crimeDAO->__constructTeste ();
	}
	
	/**
	 * Function to select all crimes
	 * 
	 * @return Array $resultado
	 */
	public function _listarTodos() {
		return $this->crimeDAO->listarTodos ();
	}
	
	/**
	 * Function to select one crime by the id
	 * 
	 * @param int $id        	
	 * @return Object $crime
	 */
	public function _consultarPorId($id) {
		return $this->crimeDAO->consultarPorId ( $id );
	}
	
	/**
	 * Function to select crimes by the id of one nature
	 * 
	 * @param int $idNature        	
	 * @return Object Crime
	 */
	public function _consultarPorIdNatureza($natureza) {
		return $this->crimeDAO->consultarPorIdNatureza ( $natureza );
	}
	
	/**
	 * Function to select crimes by the id of one period
	 * 
	 * @param int $idTempo        	
	 * @return Object Crime
	 */
	public function _consultarPorIdTempo($tempo) {
		return $this->crimeDAO->consultarPorIdNatureza ( $tempo );
	}
	
	/**
	 * Function to insert a new crime in the database
	 * 
	 * @param Crime $crime        	
	 * @return boolean $registered *refactor
	 */
	public function _inserirCrime(Crime $crime) {
		return $this->crimeDAO->inserirCrime ( $crime );
	}
	
	/**
	 * Function to return the sum of one type of nature crimes
	 * 
	 * @param String $natureza        	
	 * @return number $sumOfCrimes *refactor
	 */
	public function _somaDeCrimePorNatureza($natureza) {
		return $this->crimeDAO->somaDeCrimePorNatureza ( $natureza );
	}
	
	/**
	 * Function to return the sum of one type of nature crimes in one period of time
	 * 
	 * @param String $natureza        	
	 * @param String $ano        	
	 * @return number $sumOfCrimes *refactor
	 */
	public function _somaDeCrimePorNaturezaEmAno($natureza, $ano) {
		return $this->crimeDAO->somaDeCrimePorNaturezaEmAno ( $natureza, $ano );
	}
	
	/**
	 * Funtion to return the sum of crimes per period of time
	 * 
	 * @param String $ano        	
	 * @return number $sumOfCrimes *refactor
	 */
	public function _somaDeCrimePorAno($ano) {
		return $this->crimeDAO->somaDeCrimePorAno ( $ano );
	}
	
	/**
	 * Function to return the sum of all time crimes
	 * 
	 * @return number $sumOfAllCrimes *refactor
	 *        
	 */
	public function _somaCrimeTodosAnos() {
		for($i = 2001; $i < 2012; $i ++) {
			$somaTodosAnos [] = $this->_somaDeCrimePorAno ( $i );
		}
		
		$retornoSomaTodosAnos = array_sum ( $somaTodosAnos );
		return $retornoSomaTodosAnos;
	}
	
	/**
	 * Function to insert in the database the separate values of an array of crimes
	 * 
	 * @param Array $arrayCrime        	
	 * @return number 0 *refactor
	 */
	public function _inserirCrimeArrayParseSerieHistorica($arrayCrime) {
		for($i = 0, $arrayKey = $arrayCrime, $inicio = 0; $i < count ( $arrayCrime ); $i ++) {
			$natureza = key ( $arrayKey );
			$dadosNatureza = new Natureza ();
			$naturezaDAO = new NaturezaDAO ();
			$dadosNatureza = $naturezaDAO->consultarPorNome ( $natureza );
			$arrayTempo = $arrayCrime [$natureza];
			for($j = 0; $j < count ( array_keys ( $arrayCrime [$natureza] ) ); $j ++) {
				$tempo = key ( $arrayTempo );
				$dadosTempo = new Tempo ();
				$tempoDAO = new TempoDAO ();
				$dadosTempo = $tempoDAO->consultarPorIntervalo ( $tempo );
				$dadosCrime = new Crime ();
				$dadosCrime->__setIdNatureza ( $dadosNatureza->__getIdNatureza () );
				$dadosCrime->__setIdTempo ( $dadosTempo->__getIdTempo () );
				$dadosCrime->__setQuantidade ( $arrayCrime [$natureza] [$tempo] );
				$this->_inserirCrime ( $dadosCrime );
				next ( $arrayTempo );
			}
			next ( $arrayKey );
		}
		return 0;
	}
	
	/**
	 * Function to insert in the database the separate values of an array of crimes ordered by four months periods of time
	 * 
	 * @param Array $arrayCrime        	
	 */
	public function _inserirCrimeArrayParseQuadrimestral($arrayCrime) {
		for($i = 0, $arrayKey = $arrayCrime, $inicio = 0; $i < count ( $arrayCrime ); $i ++) {
			$natureza = key ( $arrayKey );
			$dadosNatureza = new Natureza ();
			$naturezaDAO = new NaturezaDAO ();
			$dadosNatureza = $naturezaDAO->consultarPorNome ( $natureza );
			$arrayTempo = $arrayCrime [$natureza];
			for($j = 0; $j < count ( array_keys ( $arrayCrime [$natureza] ) ); $j ++) {
				$tempo = key ( $arrayTempo );
				$dadosTempo = new Tempo ();
				$tempoDAO = new TempoDAO ();
				$dadosTempo = $tempoDAO->consultarPorMes ( $tempo );
				$dadosCrime = new Crime ();
				$dadosCrime->__setIdNatureza ( $dadosNatureza->__getIdNatureza () );
				$dadosCrime->__setIdTempo ( $dadosTempo->__getIdTempo () );
				$dadosCrime->__setQuantidade ( $arrayCrime [$natureza] [$tempo] );
				$this->inserirCrime ( $dadosCrime );
				next ( $arrayTempo );
			}
			next ( $arrayKey );
		}
	}
	
	/**
	 * Function to insert in the database the separate values of an array of crimes ordered by administrative regions
	 * 
	 * @param Array $arrayCrime        	
	 */
	public function _inserirCrimeArrayParseRA($arrayCrime) {
		for($i = 0, $arrayKey = $arrayCrime, $inicio = 0; $i < count ( $arrayCrime ); $i ++) {
			$natureza = key ( $arrayKey );
			$dadosNatureza = new Natureza ();
			$naturezaDAO = new NaturezaDAO ();
			$dadosNatureza = $naturezaDAO->consultarPorNome ( $natureza );
			$arrayRegiao = $arrayCrime [$natureza];
			for($j = 0; $j < count ( array_keys ( $arrayCrime [$natureza] ) ); $j ++) {
				$regiao = key ( $arrayRegiao );
				$dadosRegiao = new RegiaoAdministrativa ();
				$regiaoDAO = new RegiaoAdministrativaDAO ();
				$dadosRegiao = $regiaoDAO->consultarPorNome ( $regiao );
				$arrayTempo = $arrayCrime [$natureza] [$regiao];
				for($x = 0; $x < count ( array_keys ( $arrayCrime [$natureza] [$regiao] ) ); $x ++) {
					$tempo = key ( $arrayTempo );
					$dadosTempo = new Tempo ();
					$tempoDAO = new TempoDAO ();
					$dadosTempo = $tempoDAO->consultarPorIntervalo ( $tempo );
					$dadosCrime = new Crime ();
					$dadosCrime->__setIdNatureza ( $dadosNatureza->__getIdNatureza () );
					$dadosCrime->__setIdRegiaoAdministrativa ( $dadosRegiao->__getIdRegiaoAdministrativa () );
					$dadosCrime->__setIdTempo ( $dadosTempo->__getIdTempo () );
					$dadosCrime->__setQuantidade ( $arrayCrime [$natureza] [$regiao] [$tempo] );
					$this->crimeDAO->inserirCrime ( $dadosCrime );
					next ( $arrayTempo );
				}
				
				next ( $arrayRegiao );
			}
			next ( $arrayKey );
		}
	}
	
	/**
	 * Function to return the sum of crimes that will be represented in a graph
	 * 
	 * @return string $dadosCrimeFormatado
	 */
	public function _retornarDadosDeSomaFormatoNovo() {
		$tempoDAO = new TempoDAO ();
		$dadosTempo = new Tempo ();
		$arrayDadosTempo = $tempoDAO->listarTodos ();
		for($i = 0; $i < count ( $arrayDadosTempo ); $i ++) {
			$dadosTempo = $arrayDadosTempo [$i];
			$dados [$i] = $dadosTempo->__getIntervalo ();
		}
		for($i = 0; $i < count ( $dados ); $i ++) {
			$dadosCrime [$i] = $this->_somaDeCrimePorAno ( $dados [$i] );
			$dadosCrimeTitle [$i] = number_format ( $dadosCrime [$i], 0, ',', '.' );
		}
		
		for($i = 0; $i < count ( $dadosCrime ); $i ++) {
			/**
			 * Loop that defines what will be represented in the graph
			 * the string ("\"bar\"") defines the graphs full bar and
			 * the string ("\"bar simple\"") defines the graphs dotted bar
			 * The conditional 'if($i%2==0)' grants that the dotted and full bars will be intercalated.
			 * Returns the concatenated strings array
			 */
			if ($i % 2 == 0) {
				$varbar = "\"bar\"";
			} else {
				$varbar = "\"bar simple\"";
			}
			$dadosCrimeFormatado [] = "<div class=" . $varbar . "title=\"" . $dadosCrimeTitle [$i] . " Ocorrencias\">
									   		<div class=\"title\">" . $dados [$i] . "</div>
									   		<div class=\"value\">" . $dadosCrime [$i] . "</div>
									   </div>";
			if ($i != 0) {
				$dadosCrimeFormatado [0] = $dadosCrimeFormatado [0] . $dadosCrimeFormatado [$i];
			} else {
				//nothing to do here
			}
		}
		
		return $dadosCrimeFormatado [0];
	}
	
	/**
	 * Function to sum all the homicides between 2010 and 2011
	 * @return  int $retornoHomicidios2010_2011
	 */
	public function _somaHomicidios2010_2011() {
		for($i = 2010; $i < 2012; $i ++) {
			$somaHomicidios2010_2011 [] = $this->crimeDAO->somaTotalHomicidios ( $i );
		}
		
		$retornoHomicidios2010_2011 = array_sum ( $somaHomicidios2010_2011 );
		return $retornoHomicidios2010_2011;
	}
	
	/**
	 * Function to sum all the crimes between 2010 and 2011
	 * @return int $retornoSomaCrime2010_2011
	 */
	public function _somaCrime2010_2011() {
		for($i = 2010; $i < 2012; $i ++) {
			$somaCrime2010_2011 [] = $this->_somaDeCrimePorAno ( $i );
		}
		$retornoSomaCrime2010_2011 = array_sum ( $somaCrime2010_2011 );
		return $retornoSomaCrime2010_2011;
	}
	
	/**
	 * Function to sum all the homicides
	 * @return int $retornoSomaTotalHomicidios
	 */
	public function _somaTotalHomicidios() {
		for($i = 2001; $i < 2012; $i ++) {
			$somaTotalHomicidios [] = $this->crimeDAO->somaTotalHomicidios ( $i );
		}
		
		$retornoSomaTotalHomicidios = array_sum ( $somaTotalHomicidios );
		return $retornoSomaTotalHomicidios;
	}
	
	/**
	 * Function to sum all the injury 
	 * @return int $retornoSomaLesaoCorporal
	 */
	public function _somaLesaoCorporal() {
		for($i = 2001; $i < 2012; $i ++) {
			$somaLesaoCorporal [] = $this->crimeDAO->somaLesaoCorporal ( $i );
		}
		$retornoSomaLesaoCorporal = array_sum ( $somaLesaoCorporal );
		return $retornoSomaLesaoCorporal;
	}
	
	/**
	 * Function to sum all the injury between 2010 and 2011
	 * @return number
	 */
	public function _somaLesaoCorporal2010_2011() {
		for($i = 2010; $i < 2012; $i ++) {
			$somaLesaoCorporal2010_2011 [] = $this->_somaLesaoCorporal ( $i );
		}
		$retornoLesaoCorporal2010_2011 = array_sum ( $somaLesaoCorporal2010_2011 );
		return $retornoLesaoCorporal2010_2011;
	}
	
	/**
	 * Function to sum all the murder attempts
	 * @return int $retornoSomaTotalTentativasHomicidio
	 */
	public function _somaTotalTentativasHomicidio() {
		for($j = 2001; $j < 2012; $j ++) {
			$somaTotalTentativasHomicidio [] = $this->_somaTotalTentativasHomicidio ( $j );
		}
		$retornoSomaTotalTentativasHomicidio = array_sum ( $somaTotalTentativasHomicidio );
		return $retornoSomaTotalTentativasHomicidio;
	}
	
	/**
	 * Function to sum all the murder attempts between 2010 and 2011
	 * @return int $retornoSomaTotalTentativasHomicidio2010_2011
	 */
	public function _somaTotalTentativasHomicidio2010_2011() {
		for($i = 2010; $i < 2012; $i ++) {
			$somaTotalTentativasHomicidio2010_2011 [] = $this->crimeDAO->somaTotalTentativasHomicidio ( $i );
		}
		$retornoSomaTotalTentativasHomicidio2010_2011 = array_sum ( $somaTotalTentativasHomicidio2010_2011 );
		return $retornoSomaTotalTentativasHomicidio2010_2011;
	}
	
	/**
	 * Function to sum all the crimes
	 * @return int $totalCrimes
	 */
	public function _somarGeral() {
		return $this->crimeDAO->somarGeral ();
	}
}