<?php

$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
require_once "/persistence/TempoDAO.php";
include_once "/persistence/Conexao.php";

class TempoDAOTeste extends PHPUnit_Framework_TestCase{
	
	public function testConstruct(){
		$tempoDAO = new TempoDAO();
		$this->assertObjectHasAttribute('conexao', $tempoDAO);
		$this->assertInstanceOf('TempoDAO', $tempoDAO);
	}
	public function testListarTodas(){
		$tempoDAO = new TempoDAO();
		$this->assertObjectHasAttribute('conexao', $tempoDAO);
		$this->assertInstanceOf('TempoDAO', $tempoDAO);
		$this->assertNotEmpty($tempoDAO->listarTodos());
		$this->assertNotNull($tempoDAO->listarTodos());
	}
	public function testListarTodasEmOrdem()
	{
		$tempoDAO = new TempoDAO();
		$this->assertObjectHasAttribute('conexao', $tempoDAO);
		$this->assertInstanceOf('TempoDAO', $tempoDAO);
		$this->assertNotEmpty($tempoDAO->listarTodasEmOrdem());
		$this->assertNotNull($tempoDAO->listarTodasEmOrdem());
	}
	public function testConsultarPorId(){
		$tempoDAO = new TempoDAO();
		$this->assertObjectHasAttribute('conexao', $tempoDAO);
		$this->assertInstanceOf('TempoDAO', $tempoDAO);
		$this->assertInstanceOf('Tempo', $tempoDAO->consultarPorId(1));
		$this->assertObjectHasAttribute('idTempo',$tempoDAO->consultarPorId(1));
	}
	public function testConsultarPorIntervalo(){
		$tempoDAO = new TempoDAO();
		$this->assertObjectHasAttribute('conexao', $tempoDAO);
		$this->assertInstanceOf('TempoDAO', $tempoDAO);
		$this->assertInstanceOf('Tempo', $tempoDAO->consultarPorIntervalo(2001));
		$this->assertObjectHasAttribute('idTempo',$tempoDAO->consultarPorIntervalo(2001));
	}
	
	 public function testeInserirTempo(){
	$tempoDAO = new TempoDAO();
	$tempoDAO->__constructTeste();
	$this->assertObjectHasAttribute('conexao', $tempoDAO);
	$this->assertInstanceOf('TempoDAO', $tempoDAO);
	$tempoDAO->inserirTempo(new Tempo());
	}
}