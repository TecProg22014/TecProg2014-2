<?php
include_once('C:/xampp/htdocs/mds2013/persistence/CategoriaDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoriaController{
	
	/**
	 * Variable to instance a object to percist in the database
	 * @var categoriaDAO
	 */
	private $categoriaDAO;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct(){
		$this->categoriaDAO = new CategoriaDAO();
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste(){
		$this->categoriaDAO->__constructTeste();
	}
	
	/**
	 * Function to list all categories of crimes
	 * @return Array $arrayCategoria
	 */
	public function _listarTodas(){
		$arrayCategoria = $this->categoriaDAO->listarTodas();
		return $arrayCategoria;
	}
	
	/**
	 * Function to alphabetically list all categories of crimes
	 * @return Array $categorias
	 */
	public function _listarTodasAlfabicamente(){
		return  $this->categoriaDAO->listarTodasAlfabicamente();
	}
	
	/**
	 * Function to select one category by the id
	 * @param int $id
	 * @throws Exception EErroConsulta
	 * @return String $categoria
	 */
	public function _consultarPorId($id){
		
		 if(!is_numeric($id)){
			throw new EErroConsulta();
		 }else{
		 	
		 }
		 $categoria = $this->categoriaDAO->consultarPorId($id);
		 return $categoria;
	}
	
	/**
	 * Function to select one category by the name
	 * @param String $nomeCategoria
	 * @throws Exception EErroConsulta
	 * @return string $categoria
	 */
	public function _consultarPorNome($nomeCategoria){
		
		 if(!is_string($nomeCategoria)){
		 	throw new EErroConsulta();
		 }else{
		 	
		 }
		 $categoria =  $this->categoriaDAO->consultarPorNome($nomeCategoria);
		 return $categoria;
	}
	
	/**
	 * Function to  insert one category in the database
	 * @param Categoria $categoria
	 * @return boolean $resultado
	 */
	public function _inserirCategoria(Categoria $categoria){
		return $this->categoriaDAO->inserirCategoria($categoria);
	}
	
	/**
	 * Function to insert in the database the separate values of an array of categories
	 * @param Array $arrayCategoria
	 * @throws Exception EErroConsulta
	 * @return boolean $resultado 
	 */
	public function _inserirCategoriaArrayParseSerie($arrayCategoria){
		
		if(!is_array($arrayCategoria)){
			throw new EErroConsulta();
		}else{
			
		}
		$dadosCategoria = new Categoria();
		for($i=0; $i<count($arrayCategoria);$i++){
			$dadosCategoria->__setNomeCategoria($arrayCategoria[$i]);
			$retorno = $this->categoriaDAO->inserirCategoria($dadosCategoria);
		}
		return $retorno;
	}
	
	/**
	 * Function to sum all the thefts
	 * @return int $retornoSomaTotalFurtos
	 */
	public function _somaTotalFurtos(){
			for($i=2010; $i<2012; $i++){
				$somaTotalFurtos[] = $this->categoriaDAO->somaTotalFurtos($i);
			}
			$retornoSomaTotalFurtos = array_sum($somaTotalFurtos);
			return $retornoSomaTotalFurtos;
	}
	
	/**
	 * Function to sum the total of sexual crimes
	 * @return int $retornoSomaTotalDignidadeSexual
	 */
	public function _somaTotalDignidadeSexual(){
		$somaDignidadeSexual;
		for($i=2001; $i<2012; $i++){
			$somaDignidadeSexual[] = $this->_somaTotalDignidadeSexual($i);
		}
		$retornoSomaTotalDignidadeSexual = array_sum($somaDignidadeSexual);
		return $retornoSomaTotalDignidadeSexual;
	}
	
	/**
	 * Function to sum the total of sexual crimes between 2010 and 2011
	 * @return $retornoSomaTotalDignidadeSexual2010_2011
	 */
	public function _somaTotalDignidadeSexual2010_2011(){
		for($i=2010; $i<2012; $i++){
			$somaTotalDignidadeSexual2010_2011[] = $this->_somaTotalDignidadeSexual($i);
		}
		$retornoSomaTotalDignidadeSexual2010_2011 = array_sum($somaTotalDignidadeSexual2010_2011);
		return $retornoSomaTotalDignidadeSexual2010_2011;
	}
	
	/**
	 * Function to sum all the cops interventions
	 * @return int $retornoSomaTotalAcaoPolicial
	 */
	public function _somaTotalAcaoPolicial(){
		for($i=2001; $i<2012; $i++){
			$somaTotalAcaoPolicial[] = $this->_somaTotalAcaoPolicial($i);
		}
		$retornoSomaTotalAcaoPolicial = array_sum($somaTotalAcaoPolicial);
		return $retornoSomaTotalAcaoPolicial;
	}
	
	/**
	 * Function to sum all the cops interventions between 2010 and 2011
	 * @return int $retornoSomaTotalAcaoPolicial2010_2011
	 */
	public function _somaTotalAcaoPolicial2010_2011(){
		for($i=2010; $i<2012; $i++){
			$somaTotalAcaoPolicial2010_2011[] = $this->_somaTotalAcaoPolicial($i);
		}
		$retornoSomaTotalAcaoPolicial2010_2011 = array_sum($somaTotalAcaoPolicial2010_2011);
		return $retornoSomaTotalAcaoPolicial2010_2011;
	}
	
	/**
	 * Function to sum all the crimes against citizens
	 * @return int $retornoSomaGeralCrimeContraPessoa
	 */
	public function _somaGeralCrimeContraPessoa(){
		for($i=2001; $i<2012; $i++){
			$somaGeralCrimeContraPessoa[] = $this->categoriaDAO->somaGeralCrimeContraPessoa($i);
		}
		$retornoSomaGeralCrimeContraPessoa = array_sum($somaGeralCrimeContraPessoa);
		return $retornoSomaGeralCrimeContraPessoa;
	}
	
	/**
	 * Function to sum all the crimes against citizens between 2010 and 2011
	 * @return int $retornoSomaGeralCrimeContraPessoa2010_2011
	 */
	public function _somaGeralCrimeContraPessoa2010_2011(){
		for($i=2010; $i<2012; $i++){
			$somaGeralCrimeContraPessoa2010_2011[] = $this->categoriaDAO->somaGeralCrimeContraPessoa($i);
		}
		$retornoSomaGeralCrimeContraPessoa2010_2011 = array_sum($somaGeralCrimeContraPessoa2010_2011);
		return $retornoSomaGeralCrimeContraPessoa2010_2011;
	}
	
	/**
	 * Function to sum the total of theft crimes
	 * @return int $retornoSomaTotalRoubo
	 */
	public function _somaTotalRoubo(){
		for($i=2001; $i<2012; $i++){
			$somaTotalRoubo[] = $this->categoriaDAO->somaTotalRoubo($i);
		}
		$retornoSomaTotalRoubo = array_sum($somaTotalRoubo);
		return $retornoSomaTotalRoubo;
	}
	
	/**
	 * Function to sum the total of theft crimes between 2010 and 2011
	 * @return int $retornoSomaTotalRoubo2010_2011
	 */
	public function _somaTotalRoubo2010_2011(){
		for($i=2010; $i<2012; $i++){
			$somaTotalRoubo2010_2011[] = $this->_somaTotalRoubo($i);
		}
		$retornoSomaTotalRoubo2010_2011 = array_sum($somaTotalRoubo2010_2011);
		return $retornoSomaTotalRoubo2010_2011;
	}
	
	/**
	 * Function to count how many categories exists in the database
	 * @return int $total
	 */
	public function _contarRegistros(){
		return $this->categoriaDAO->contarRegistros();
	}
	
	public function _listarTotalDeCategoria(){
		$categorias = $this->categoriaDAO->listarTotalDeCategoria();
		return "
		var data = [
		{ label: \"".$categorias["nome"][0]."\",  data: ".$categorias["quantidade"][0]."},
		{ label: \"".$categorias["nome"][1]."\",  data: ".$categorias["quantidade"][1]."},
		{ label: \"".$categorias["nome"][2]."\",  data: ".$categorias["quantidade"][2]."},
		{ label: \"".$categorias["nome"][3]."\",  data: ".$categorias["quantidade"][3]."},
		{ label: \"".$categorias["nome"][4]."\",  data: ".$categorias["quantidade"][4]."}
		];";
	}
}