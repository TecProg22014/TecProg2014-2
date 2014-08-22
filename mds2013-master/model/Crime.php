<?php
include_once('/../exceptions/EFalhaLeituraSerieCrime.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');

class Crime{
	private $idCrime;
	private $quantidade;
	private $idTempo;
	private $idNatureza;
	private $idRA;
	private $exceptionCrime;
	
	
	public function __setIdCrime($idCrime){

		if(!is_numeric($idCrime)){
			throw new ETipoErrado();
		}
		$this->idCrime = $idCrime;
	}
	public function __getIdCrime(){
		return $this->idCrime;
	}
	public function __setQuantidade($quantidade){
	
		$this->quantidade = $quantidade;
	}
	public function __getQuantidade(){
		return $this->quantidade;
	}
	public function __setIdTempo($idTempo){
		
		$this->idTempo = $idTempo;
	}
	public function __getIdTempo(){
		return $this->idTempo;
	}
	public function __setIdNatureza($idNatureza){
		
		$this->idNatureza = $idNatureza;
	}
	public function __getIdNatureza(){
		return $this->idNatureza;
	}
	public function __setIdRegiaoAdministrativa($idRA){
		$this->idRA = $idRA;
	}
	public function __getIdRegiaoAdministrativa(){
		return $this->idRA;
	}
	public function __construct(){
		
	}
	public function __constructOverload($idCrime,$idTempo,$idNatureza,$quantidade){
		$this->idCrime = $idCrime;
		$this->idTempo = $idTempo;
		$this->idNatureza = $idNatureza;
		$this->quantidade = $quantidade;
	}
}