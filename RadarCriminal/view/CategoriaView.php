<?php
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT']; /** Returns the physical address of the web server */
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/CategoriaController.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/exceptions/EErroConsulta.php";
class CategoriaView {
	/**
	 * Variable to instance one object of category controller
	 * 
	 * @var categoriaCO
	 */
	private $categoriaCO;
	
	/**
	 * Constroctor to instance a new category controller
	 */
	public function __construct() {
		$this->categoriaCO = new CategoriaController ();
	}
	
	/**
	 * Function to list all the categories
	 * @throws Exception EErroConsulta
	 * @return Array $arrayCategoria
	 */
	public function listarTodas() {
		$arrayCategoria = $this->categoriaCO->_listarTodas ();
		if (! is_array ( $arrayCategoria )) {
			throw new EErroConsulta ();
		}else{
		}
		return $arrayCategoria;
	}
	
	/**
	 * Function to show alphabetically all the categories
	 * @return string $retornoCategoria
	 */
	public function listarTodasAlfabicamente() {
		$arrayCategoria = $this->categoriaCO->_listarTodasAlfabicamente ();
		for($i = 0, $retornoCategoria = ""; $i < count ( $arrayCategoria ); $i ++) {
			$auxCategoria = $arrayCategoria [$i];
			$nomeCategoria = $auxCategoria->__getNomeCategoria ();
			$idCategoria = $auxCategoria->__getIdCategoria ();
			$retornoCategoria = $retornoCategoria . "<li><a class=\"submenu\" href=\"?pag=cCat&id=$i\"><i class=\"icon-inbox\"></i><span class=\"hidden-tablet\">$nomeCategoria</span></a></li>";
		}
		return $retornoCategoria;
	}
	
	/**
	 * Function to select alphabetically all the categories
	 * @return Array $arrayCategoria
	 */
	public function listarTodasAlfabeticamentePuro() {
		$arrayCategoria = $this->categoriaCO->_listarTodasAlfabicamente ();
		return $arrayCategoria;
	}
	
	/**
	 * Function to select one category by the id
	 * @param int $id
	 * @throws Exception EErroConsulta
	 * @return String $categoria
	 */
	public function consultarPorId($id) {
		$categoria = $this->categoriaCO->_consultarPorId ( $id );
		if (get_class ( $categoria ) != 'Categoria') {
			throw new EErroConsulta ();
		}else{
		}
		return $categoria;
	}
	
	/**
	 * Function to select one category by the name
	 * @param String $nomeCategoria
	 * @throws Exception EErroConsulta
	 * @return String $categoria
	 */
	public function _consultarPorNome($nomeCategoria) {
		$categoria = $this->categoriaCO->_consultarPorNome ( $nomeCategoria );
		if (get_class ( $categoria ) != 'Categoria') {
			throw new EErroConsulta ();
		}else{
		}
		return $categoria;
	}
	
	/**
	 * Function to count how many categories exists
	 * @return int $number    *refactor
	 */
	public function contarRegistros() {
		return $this->categoriaCO->_contarRegistros ();
	}
	
	/**
	 * Function to get the sum all the sexual crimes
	 * @return int $number    *refactor
	 */
	public function _somaTotalDignidadeSexual() {
		return $this->categoriaCO->_somaTotalDignidadeSexual ();
	}
	
	/**
	 * Function to get the sum of sexual crimes between 2010 and 2011
	 * @return int $number  *refactor
	 */
	public function _somaTotalDignidadeSexual2010_2011() {
		return $this->categoriaCO->_somaTotalDignidadeSexual2010_2011 ();
	}
	
	/**
	 * Function to get the sum all the cops actions
	 * @return int $number    *refactor
	 */
	public function _somaTotalAcaoPolicial() {
		return $this->categoriaCO->_somaTotalAcaoPolicial ();
	}
	
	/**
	 * Function to get the sum of all cops actions between 2010 and 2011
	 * @return int $number    *refactor
	 */
	public function _somaTotalAcaoPolicial2010_2011() {
		return $this->categoriaCO->_somaTotalAcaoPolicial2010_2011 ();
	}
	
	/**
	 * Function to get the sum of all crimes against citizens
	 * * @return int $number    *refactor
	 */
	public function _somaGeralCrimeContraPessoa() {
		return $this->categoriaCO->_somaGeralCrimeContraPessoa ();
	}
	
	/**
	 * Function to get the sum of all the crimes against the citizens between 2010 and 2011
	 * @return int $number    *refactor
	 */
	public function _somaGeralCrimeContraPessoa2010_2011() {
		return $this->categoriaCO->_somaGeralCrimeContraPessoa2010_2011 ();
	}
	
	/**
	 * Function to get the sum of all the theft crimes
	 * @return int $number    *refactor
	 */
	public function _somaTotalRoubo() {
		return $this->categoriaCO->_somaTotalRoubo ();
	}
	
	/**
	 * Function to get the sum of all the theft crimes between 2010 and 2011
	 * @return int $number    *refactor
	 */
	public function _somaTotalRoubo2010_2011() {
		return $this->categoriaCO->_somaTotalRoubo2010_2011 ();
	}
	
	/**
	 * Function to sum all the stealing crimes
	 * @return int $number    *refactor
	 */
	public function _somaTotalFurtos() {
		return $this->categoriaCO->_somaTotalFurtos ();
	}
	
	/**
	 * Function to get a String of all the categories organized in labels
	 */
	public function _listarTotalDeCategoria() {
		return $this->categoriaCO->_listarTotalDeCategoria ();
	}
}