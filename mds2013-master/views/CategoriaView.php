<?php
include_once('C:/xampp/htdocs/mds2013/controller/CategoriaController.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');

class CategoriaView{
	private $categoriaCO;
	
	public function __construct(){
		$this->categoriaCO = new CategoriaController();
	}
	public function listarTodas(){
		$arrayCategoria = $this->categoriaCO->_listarTodas();
		if(!is_array($arrayCategoria)){
			throw new  EErroConsulta();
		}
		return $arrayCategoria;
	}
	public function listarTodasAlfabicamente(){
		$arrayCategoria = $this->categoriaCO->_listarTodasAlfabicamente();
		for($i = 0,$retornoCategoria = ""; $i < count($arrayCategoria); $i++){
			$auxCategoria = $arrayCategoria[$i];
			$nomeCategoria = $auxCategoria->__getNomeCategoria();
			$idCategoria = $auxCategoria->__getIdCategoria();
			$retornoCategoria = $retornoCategoria."<li><a class=\"submenu\" href=\"?pag=cCat&id=$i\"><i class=\"icon-inbox\"></i><span class=\"hidden-tablet\">$nomeCategoria</span></a></li>";
		}
		return $retornoCategoria;
	}
	public function listarTodasAlfabeticamentePuro(){
		$arrayCategoria = $this->categoriaCO->_listarTodasAlfabicamente();
		return $arrayCategoria;
	}
	public function consultarPorId($id){
		$categoria = $this->categoriaCO->_consultarPorId($id);
		if(get_class($categoria)!= 'Categoria'){
			throw new EErroConsulta();
		}
		return $categoria;
	}
	public function _consultarPorNome($nomeCategoria){
		$categoria =  $this->categoriaCO->_consultarPorNome($nomeCategoria);
		if(get_class($categoria)!= 'Categoria'){
			throw new EErroConsulta();
		}
		return $categoria;
	}
	public function contarRegistros(){
		return $this->categoriaCO->_contarRegistros();
	}

	public function _somaTotalDignidadeSexual(){
		return $this->categoriaCO->_somaTotalDignidadeSexual();
	}

	public function _somaTotalDignidadeSexual2010_2011(){
		return $this->categoriaCO->_somaTotalDignidadeSexual2010_2011();
	}

	public function _somaTotalAcaoPolicial(){
		return $this->categoriaCO->_somaTotalAcaoPolicial();
	}

	public function _somaTotalAcaoPolicial2010_2011(){
		return $this->categoriaCO->_somaTotalAcaoPolicial2010_2011();
	}

	public function _somaGeralCrimeContraPessoa(){
		return $this->categoriaCO->_somaGeralCrimeContraPessoa();
	}

	public function _somaGeralCrimeContraPessoa2010_2011(){
		return $this->categoriaCO->_somaGeralCrimeContraPessoa2010_2011();
	}

	public function _somaTotalRoubo(){
		return $this->categoriaCO->_somaTotalRoubo();
	}

	public function _somaTotalRoubo2010_2011(){
		return $this->categoriaCO->_somaTotalRoubo2010_2011();
	}

	public function _somaTotalFurtos(){
		return $this->categoriaCO->_somaTotalFurtos();
	}
	
	public function _listarTotalDeCategoria(){
		return $this->categoriaCO->_listarTotalDeCategoria();
	}
}