<?php
include_once('./controller/NaturezaController.php');
include_once('./views/CategoriaView.php');
include_once('./views/CrimeView.php');
class NaturezaView{
	private $naturezaCO;
	private $crimeCO;
	public function __construct(){
		$this->naturezaCO = new NaturezaController();
		$this->crimeCO = new CrimeController();
	}
	
	public function listarTodasAlfabicamente(){
		$todasNaturezas= $this->naturezaCO->_listarTodasAlfabicamente();
		for($i=0,$retornoTipos = "";$i<count($todasNaturezas);$i++){
			$dadosCrime = $this->crimeCO->_somaDeCrimePorNatureza($todasNaturezas[$i]->__getNatureza());
			$retornoTipos = $retornoTipos."<h3>".$todasNaturezas[$i]->__getNatureza()."</h3>
				<div class=\"progress\" title=\"".number_format($dadosCrime, 0 , ',','.')."\">
				<div class=\"bar\" style=\"width: ".(100 * $dadosCrime / 450000)."%;\"></div>
				</div>";
		}
		
		return $retornoTipos;
	}
	public function consultarPorNome($natureza){
		$natureza = $this->naturezaCO->_consultarPorNome($natureza);
		return $natureza->__getNatureza();
	}
	public function consultarPorId($id){
		$natureza = $this->naturezaCO->_consultarPorId($id);
		return $natureza->__getNatureza();
	}
	public function consultarPorIdCategoria($id){
		return $this->naturezaCO->_consultarPorIdCategoria($id);
	}
	public function _retornarDadosDeNaturezaFormatado($natureza){
		$dadosDeNatureza = $this->naturezaCO->_retornarDadosDeNaturezaFormatado($natureza);
		$dadosCrimeFormatado = "";
		$retornoFormatado = "";
		for($i=0;$i<count($dadosDeNatureza['title']); $i++){
			/**
			 * Laço que escreve os dados do grafico de ocorrencias por ano.
			 * a string ("\"bar\"") define a barra cheia do grafico e
			 * a string ("\"bar simple\"") define a barra pontilhada.
			 * A condicional 'if($i%2==0)' garante que as barras pontilhadas e cheias sejam intercaladas.
			 * Retorna-se o vetor de strings concatenado.
			 * @author Eliseu
			 * @copyright RadarCriminal 2013
			 */
			if($i%2==0){
				$varbar="\"bar\"";
			}else {
				$varbar="\"bar simple\"";
			}
			$dadosCrimeFormatado[$i]="
				<div class=".$varbar." title=\"".$dadosDeNatureza['title'][$i]." Ocorrencias\">
					<div class=\"title\">".$dadosDeNatureza['tempo'][$i]."</div>
					<div class=\"value\">".$dadosDeNatureza['crime'][$i]."</div>
				</div>";
			$retornoFormatado .= $dadosCrimeFormatado[$i];
		}
		return $retornoFormatado;
	}
	public function aposBarraLateral($idCategoria){
		
		$categoriaVW = new CategoriaView();
		$crimeVW = new CrimeView();
		$arrayCategorias = $categoriaVW->listarTodasAlfabeticamentePuro();
		$auxCategoria = $arrayCategorias[$idCategoria];
		$arrayNaturezas = $this->consultarPorIdCategoria($auxCategoria->__getIdCategoria());
		for($i=0;$i<count($arrayNaturezas);$i++){
				$naturezaAtual = $arrayNaturezas[$i];
				$auxBarra[] ="
				<div class=\"row-fluid\">
		
				<div class=\"box span12\">
							<div class=\"box-header\">
								<h2><a href=\"#\" class=\"btn-minimize\"><i class=\"icon-tasks\"></i>".$naturezaAtual->__getNatureza()."</a></h2>
								<div class=\"box-icon\">
									<a href=\"#\" class=\"btn-close\"><i class=\"icon-remove\"></i></a>
								</div>
							</div>
							<div class=\"box-content\" style=\"display: none;\">
								<h3>Por Ano</h3></br>
									<div class=\"chart-natureza\">
									
									 ".$this->_retornarDadosDeNaturezaFormatado($naturezaAtual->__getNatureza())." </div>
									
		
							</div>
				</div>
		
				</div>";
		}
		return $auxBarra;
	}
}

//</br><h3>Por Regiao Administrativa</h3></br>
//".$this->listarTodasAlfabicamente()."