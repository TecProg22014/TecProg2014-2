<?php

include_once "/persistence/NaturezaDAO.php";
include_once "/persistence/CategoriaDAO.php";
include_once "/model/Natureza.php";
include_once "/model/Categoria.php";
include_once "/controller/CrimeController.php";
include_once "/exceptions/EErroConsulta.php";
include_once "/exceptions/EFalhaNaturezaController.php";

/**
 * The NaturezaController class is the class that controls the CRUD of natures of crimes.
 * This class interfaces the view to the persistence in the database, and has only one atribbute
 * $naturezaDAO.
 */
class NaturezaController {
	
	/**
	 * Variable to instance a object to percist in the database
	 * @var naturezaDAO
	 */
	private $naturezaDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct( ) {
		$this->naturezaDAO = new NaturezaDAO ( );
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste( ) {
		$this->naturezaDAO->__constructTeste ( );
	}
	
	/**
	 * Function to select all the natures of crimes
	 * @return Array $resultado
	 */
	public function _listarTodas( ) {
		$resultado = $this->naturezaDAO->listAll ( );
		
		return $resultado;
	}
	
	/**
	 * Function to alphabetically list all the natures of crimes
	 * @return Array $resultado
	 */
	public function _listarTodasAlfabicamente( ) {
		$resultado = $this->naturezaDAO->alphabeticallyListAll ( );
		return $resultado;
	}
	
	/**
	 * Function to select one nature of crime by the id
	 * @param int $id        	
	 * @throws Exception EErroConsulta
	 * @return String $natureza
	 */
	public function _consultarPorId($id) {
		if (! is_numeric ( $id )) {
			throw new EErroConsulta ();
		}else{
			//nothing to do here
		}
		$natureza = $this->naturezaDAO->idFind ( $id );
		return $natureza;
	}
	
	/**
	 * Function to select one nature of crime by the name
	 * @param String $naturezaConsulta        	
	 * @return String $natureza
	 */
	public function _consultarPorNome( $naturezaConsulta ) {
		$natureza = $this->naturezaDAO->nameFind ( $naturezaConsulta  );
		return $natureza;
	}
	
	/**
	 * Function to select all the natures of crimes by one category's id
	 * @param int $id        	
	 * @return Array $retornaNaturezas
	 */
	public function _consultarPorIdCategoria( $id ) {
		return $this->naturezaDAO->idCategoryFind ( $id  );
	}
	
	/**
	 * Function to insert in the database one new nature of crime
	 * @param  Object Natureza $natureza
	 * @return boolean $registered *refactor
	 */
	public function _inserirNatureza(Natureza $natureza ) {
		return $this->naturezaDAO->addNature ( $natureza  );
	}
	
	/**
	 * Function to insert in the database the separate values of an array of natures
	 * @param Array $arrayNatureza        	
	 * @throws Exception EFalhaNaturezaController
	 * @return boolean $registered *refactor
	 */
	public function _inserirArrayParse( $arrayNatureza ) {
		if (! is_array ( $arrayNatureza  ) ) {
			throw new EFalhaNaturezaController ( );
		} else {
			//nothing to do here
		}
		for($i = 0, $arrayKey = $arrayNatureza, $inicio = 0; $i < count ( $arrayNatureza ); $i ++) {
			$chave = key ( $arrayKey );
			$categoriaDAO = new CategoriaDAO ();
			$dadosCategoria = new Categoria ();
			$dadosCategoria = $categoriaDAO->consultarPorNome ( $chave );
			for($j = $inicio; $j < (count ( $arrayNatureza [$chave] ) + $inicio); $j ++) {
				$dadosNatureza = new Natureza ();
				$dadosNatureza->__setNatureza ( $arrayNatureza [$chave] [$j] );
				$dadosNatureza->__setIdCategoria ( $dadosCategoria->__getIdCategoria () );
				$this->naturezaDAO->addNature ( $dadosNatureza );
			}
			$inicio = $inicio + count ( $arrayNatureza [$chave] );
			next ( $arrayKey );
		}
		return $dadosCategoria;
	}
	
	/**
	 * Function to list one matrix of related crime, title and time
	 * @param String $natureza        	
	 * @return Array $dados
	 */
	public function _retornarDadosDeNaturezaFormatado( $natureza ) {
		$tempoDAO = new TempoDAO ( );
		$crimeCO = new CrimeController ( );
		$arrayDadosTempo = $tempoDAO->listarTodos ( );
		$dados;
		for( $i = 0; $i < count ( $arrayDadosTempo  ); $i ++ ) {
			$dados ['tempo'] [$i] = $arrayDadosTempo [$i]->__getIntervalo ( );
			$dados ['crime'] [$i] = $crimeCO->_somaDeCrimePorNaturezaEmAno ( $natureza, $dados ['tempo'] [$i]  );
			$dados ['title'] [$i] = number_format ( $dados ['crime'] [$i], 0, ',', '.'  );
		}
		return $dados;
	}
}