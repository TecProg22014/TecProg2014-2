<?php
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Categoria{
	private $idCategoria;
	private $nomeCategoria;
	
	public function __setIdCategoria($idCategoria){
		
		if (!is_numeric($idCategoria)){
			throw new ETipoErrado();
		}
		$this->idCategoria = $idCategoria;
	}
	public function __getIdCategoria(){
		return $this->idCategoria;
	}
	public function __setNomeCategoria($nomeCategoria){
		
		if(!is_string($nomeCategoria)){
			throw new ETipoErrado();
		}
		$this->nomeCategoria = $nomeCategoria;
	}
	public function __getNomeCategoria(){
		return $this->nomeCategoria;
	}
	public function __constructOverload($idCategoria,$nomeCategoria){
		
		$this->idCategoria = $idCategoria;
		$this->nomeCategoria = $nomeCategoria;
	}
	public function __construct(){
		
	}
}