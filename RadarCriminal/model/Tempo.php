<?php
include_once('C:/xampp/htdocs/mds2013/exceptions/ETipoErrado.php');
class Tempo{
	private $idTempo;
	private $intervalo;
	private $mes;
	
	
	public function __setIdTempo($idTempo){
		
		if(!is_numeric($idTempo)){
			throw new ETipoErrado();
		}
		$this->idTempo = $idTempo;
	}
	public function __getIdTempo(){
		return $this->idTempo;
	}
	public function __setIntervalo($intervalo){
		
		if(!is_numeric($intervalo)){
			throw new ETipoErrado();
		}
		$this->intervalo = $intervalo;
	}
	public function __getIntervalo(){
		return $this->intervalo;
	}
	public function __setMes($mes){
		$this->mes = $mes;
	}
	public function __getMes(){
		return  $this->mes;
	}
	public function __construct(){
		
	}
	public function __constructOverload($idTempo,$intervalo,$mes){
		
		$this->idTempo = $idTempo;
		$this->intervalo = $intervalo;
		$this->mes = $mes;
	}
}