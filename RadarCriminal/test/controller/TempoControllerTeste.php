<?php


require_once "/controller/TempoController.php";
require_once "/model/Tempo.php";

class TempoControllerTeste extends PHPUnit_Framework_Testcase{
	
	public function testConstruct()
	{
		$tempoController = new TempoController();
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
	}
	public function testListarTodas()
	{
		$tempoController = new TempoController();
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
		$this->assertNotEmpty($tempoController->_listarTodos());
	}
	public function testListarTodasEmOrdem()
	{
		$tempoController = new TempoController();
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
		$this->assertNotEmpty($tempoController->_listarTodasEmOrdem());
	}
	public function testConsultarPorId()
	{
		$tempoController = new TempoController();
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
		$this->assertInstanceOf('Tempo', $tempoController->_consultarPorId(1));
	}
	public function testConsultarPorIntervalo()
	{
		$tempoController = new TempoController();
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
		$this->assertInstanceOf('Tempo', $tempoController->_consultarPorIntervalo(2001));
	}
	public function testInserirTempo()
	{
		$tempoController = new TempoController();
		$tempoController->__constructTeste();
		$this->assertNull($tempoController->_inserirTempo(new Tempo()));
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
	}
	/*
	public function testInserirTempoArrayParse()
	{
		$tempoController = new TempoController();
		$tempoController->__constructTeste();
		$this->assertNull($tempoController->_inserirTempoArrayParse(0));
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);	
	}
	*/
	public function testRetornaDadosFormatados(){
		$tempoController = new TempoController();
		$this->assertObjectHasAttribute('tempoDAO', $tempoController);
		$this->assertInstanceOf('TempoController', $tempoController);
		$this->assertEquals($tempoController->_retornarDadosFormatados(),'labels : ["2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011"]');
	}
}