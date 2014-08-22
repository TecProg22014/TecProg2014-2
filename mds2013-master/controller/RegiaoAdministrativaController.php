<?php
include_once('C:/xampp/htdocs/mds2013/persistence/RegiaoAdministrativaDAO.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EErroConsulta.php');
include_once('C:/xampp/htdocs/mds2013/model/RegiaoAdministrativa.php');

class RegiaoAdministrativaController {
	private $raDAO;
	
	public function __construct(){
		$this->raDAO = new RegiaoAdministrativaDAO();
	}
	
	public function _listarTodas(){
		$arrayRA = $this->raDAO->listarTodas();
		return $arrayRA;
	}
	public function __constructTeste(){
		$this->raDAO->__constructTeste();
	}
	public function _listarTodasAlfabeticamente(){
		$arrayRA = $this->raDAO->listarTodasAlfabeticamente();
		for($i=0;$i<(count($arrayRA));$i++){
			$nomeRA[] = $arrayRA[$i]->__getNomeRegiao();
		}
		return $nomeRA;
	}
	public function _consultarPorId($id){
		
		if(!is_numeric($id)){
			throw new EErroConsulta();
		}
	
		$RA =  $this->raDAO->consultarPorId($id);
		return $RA;
	}
	public function _consultarPorNome($nome){
	
		if(!is_string($nome)){
			throw new EErroConsulta();
		}
		$RA = $this->raDAO->consultarPorNome($nome);
		return $RA;
	}
	
	public function _contarRegistrosRA(){
		return $this->raDAO->contarRegistrosRA();
	}
	public function _inserirRA(RegiaoAdministrativa $RA){
		return $this->raDAO->inserirRA($RA);
	}
	
	public function _inserirRegiaoArrayParseRA($arrayRA){
		for($i=0; $i <count($arrayRA); $i++){
			$dadosRegiao = new RegiaoAdministrativa();
			$dadosRegiao->__setNomeRegiao($arrayRA[$i]);
			$this->raDAO->inserirRA($dadosRegiao);
		}
	}
}