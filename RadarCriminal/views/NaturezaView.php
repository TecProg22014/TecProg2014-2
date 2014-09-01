<?php
include_once ('./controller/NaturezaController.php');
include_once ('./views/CategoriaView.php');
include_once ('./views/CrimeView.php');
class NaturezaView {
	
	/**
	 * Variables to instance new objects of nature and crime controllers
	 * @var NaturezaCO
	 * @var crimeCO
	 */
	private $naturezaCO;
	private $crimeCO;
	
	/** 
	 * Constructor to instance nature and crime controllers
	 */
	public function __construct() {
		$this->naturezaCO = new NaturezaController ();
		$this->crimeCO = new CrimeController ();
	}
	
	/**
	 * Function to get the alphabetical list of natures
	 * @return string $retornoTipos
	 */
	public function listarTodasAlfabicamente() {
		$todasNaturezas = $this->naturezaCO->_listarTodasAlfabicamente ();
		for($i = 0, $retornoTipos = ""; $i < count ( $todasNaturezas ); $i ++) {
			$dadosCrime = $this->crimeCO->_somaDeCrimePorNatureza ( $todasNaturezas [$i]->__getNatureza () );
			$retornoTipos = $retornoTipos . "<h3>" . $todasNaturezas [$i]->__getNatureza () . "</h3>
				<div class=\"progress\" title=\"" . number_format ( $dadosCrime, 0, ',', '.' ) . "\">
				<div class=\"bar\" style=\"width: " . (100 * $dadosCrime / 450000) . "%;\"></div>
				</div>";
		}
		
		return $retornoTipos;
	}
	
	/**
	 * Function to get one nature searching by one name
	 * @return String $nature   *refactor
	 */
	public function consultarPorNome($natureza) {
		$natureza = $this->naturezaCO->_consultarPorNome ( $natureza );
		return $natureza->__getNatureza ();
	}
	
	/**
	 * Function to get one nature searching by one id
	 * @param int $id
	 * @return String $nature  *refactor
	 */
	public function consultarPorId($id) {
		$natureza = $this->naturezaCO->_consultarPorId ( $id );
		return $natureza->__getNatureza ();
	}
	
	/**
	 * Function to get one nature searching by one category id
	 * @param int $id
	 * @return String $nature  *refactor
	 */
	public function consultarPorIdCategoria($id) {
		return $this->naturezaCO->_consultarPorIdCategoria ( $id );
	}
	
	/**
	 * Function to get data of one nature organized in labels to generate a graph 
	 * @param String $natureza
	 * @return String $retornoFormatado
	 */
	public function _retornarDadosDeNaturezaFormatado($natureza) {
		$dadosDeNatureza = $this->naturezaCO->_retornarDadosDeNaturezaFormatado ( $natureza );
		$dadosCrimeFormatado = "";
		$retornoFormatado = "";
		for($i = 0; $i < count ( $dadosDeNatureza ['title'] ); $i ++) {
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
			$dadosCrimeFormatado [$i] = "
				<div class=" . $varbar . " title=\"" . $dadosDeNatureza ['title'] [$i] . " Ocorrencias\">
					<div class=\"title\">" . $dadosDeNatureza ['tempo'] [$i] . "</div>
					<div class=\"value\">" . $dadosDeNatureza ['crime'] [$i] . "</div>
				</div>";
			$retornoFormatado .= $dadosCrimeFormatado [$i];
		}
		return $retornoFormatado;
	}
	
	/**
	 * Function to generate a lateral bar 
	 * @param String $idCategoria
	 * @return String $auxBarra
	 */
	public function aposBarraLateral($idCategoria) {
		$categoriaVW = new CategoriaView ();
		$crimeVW = new CrimeView ();
		$arrayCategorias = $categoriaVW->listarTodasAlfabeticamentePuro ();
		$auxCategoria = $arrayCategorias [$idCategoria];
		$arrayNaturezas = $this->consultarPorIdCategoria ( $auxCategoria->__getIdCategoria () );
		for($i = 0; $i < count ( $arrayNaturezas ); $i ++) {
			$naturezaAtual = $arrayNaturezas [$i];
			$auxBarra [] = "
				<div class=\"row-fluid\">
		
				<div class=\"box span12\">
							<div class=\"box-header\">
								<h2><a href=\"#\" class=\"btn-minimize\"><i class=\"icon-tasks\"></i>" . $naturezaAtual->__getNatureza () . "</a></h2>
								<div class=\"box-icon\">
									<a href=\"#\" class=\"btn-close\"><i class=\"icon-remove\"></i></a>
								</div>
							</div>
							<div class=\"box-content\" style=\"display: none;\">
								<h3>Por Ano</h3></br>
									<div class=\"chart-natureza\">
									
									 " . $this->_retornarDadosDeNaturezaFormatado ( $naturezaAtual->__getNatureza () ) . " </div>
									
		
							</div>
				</div>
		
				</div>";
		}
		return $auxBarra;
	}
}