<?php
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Natureza{
	private $idNatureza;
	private $natureza;
	private $idCategoria;
	
	public function __construct(){
		
	}
	public function __constructOverload($idNatureza,$nomeNatureza,$idCategoriaNatureza){
		$this->idNatureza = $idNatureza;
		$this->natureza = $nomeNatureza;
		$this->idCategoria = $idCategoriaNatureza;
	}
	public function __setIdNatureza($idNatureza){
		if(!is_numeric($idNatureza)){
			throw new ETipoErrado();
		}
		$this->idNatureza = $idNatureza;
	}
	public function __getIdNatureza(){
		return $this->idNatureza;
	}
	public function __setIdCategoria($idCategoria){
	
		if(!is_numeric($idCategoria)){
			throw new ETipoErrado();
		}
		$this->idCategoria = $idCategoria;
	}
	public function __getIdCategoria(){
		return $this->idCategoria;
	}
	public function __setNatureza($natureza){
		
		if(!is_string($natureza)){
			throw new ETipoErrado();
		}
		$this->natureza = $natureza;
	}
	public function __getNatureza(){
		return $this->natureza;
	}
}