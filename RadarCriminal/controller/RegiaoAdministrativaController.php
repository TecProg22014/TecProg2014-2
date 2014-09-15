<?php

include_once "/persistence/RegiaoAdministrativaDAO.php";
include_once "/exceptions/EErroConsulta.php";
include_once "/model/RegiaoAdministrativa.php";

/**
 * The RegiaoAdministrativaController class is the class that controls the CRUD of administrative
 * regions where where some crime has occurred.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $raDAO.
 */
class RegiaoAdministrativaController {
	
	/**
	 * Variable to instance a object to percist in the database
	 * @var raDAO
	 */
	private $raDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct( ) {
		$this->raDAO = new RegiaoAdministrativaDAO ( );
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste( ) {
		$this->raDAO->__constructTeste ( );
	}
	
	/**
	 * Function to select all the administrative regions of the database
	 * @return Array $arrayRA
	 */
	public function _listarTodas( ) {
		$arrayRA = $this->raDAO->listarTodas ( );
		return $arrayRA;
	}
	
	/**
	 * Function to alphabetically list all administrative regions
	 * @return Array $nomeRA
	 */
	public function _listarTodasAlfabeticamente( ) {
		$arrayRA = $this->raDAO->listarTodasAlfabeticamente ( );
		for( $i = 0; $i < (count ( $arrayRA  ) ); $i ++ ) {
			$nomeRA [] = $arrayRA [$i]->__getNomeRegiao ( );
		}
		return $nomeRA;
	}
	
	/**
	 * Function to select one administrative region by the id
	 * @param int $id        	
	 * @throws Exception EErroConsulta
	 * @return String $RA
	 */
	public function _consultarPorId( $id ) {
		if (! is_numeric ( $id  ) ) {
			throw new EErroConsulta ( );
		} else {
		}
		
		$RA = $this->raDAO->consultarPorId ( $id  );
		return $RA;
	}
	
	/**
	 * Function to select one administrative region by the name
	 * @param int $nome        	
	 * @throws Exception EErroConsulta
	 * @return String $RA
	 */
	public function _consultarPorNome( $nome ) {
		if (! is_string ( $nome  ) ) {
			throw new EErroConsulta ( );
		} else {
		}
		$RA = $this->raDAO->consultarPorNome ( $nome  );
		return $RA;
	}
	
	/**
	 * Function to count how many administrative regions exists in the database
	 * @return int $sum
	 */
	public function _contarRegistrosRA( ) {
		return $this->raDAO->contarRegistrosRA ( );
	}
	
	/**
	 * Function to insert a new administrative region in the database
	 * @param RegiaoAdministrativa $RA        	
	 * @return boolean $registered *refactor
	 */
	public function _inserirRA(RegiaoAdministrativa $RA ) {
		return $this->raDAO->inserirRA ( $RA  );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of administrative regions
	 * @param Array $arrayRA
	 *        	*refactor
	 */
	public function _inserirRegiaoArrayParseRA( $arrayRA ) {
		for( $i = 0; $i < count ( $arrayRA  ); $i ++ ) {
			$dadosRegiao = new RegiaoAdministrativa ( );
			$dadosRegiao->__setNomeRegiao ( $arrayRA [$i]  );
			$this->raDAO->inserirRA ( $dadosRegiao  );
		}
	}
}