<?php
require_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
require_once('C:/xampp/htdocs/mds2013/model/Crime.php');


class CrimeControllerTeste extends PHPUnit_Framework_Testcase{
	
	public function testConstruct()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
	}
	public function testListarTodas()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertNotEmpty($crimeController->_listarTodos());
	}
	public function testConsultarPorId()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertInstanceOf('Crime', $crimeController->_consultarPorId(1));
	}
	public function testConsultarPorIdNatureza()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertInstanceOf('Crime',$crimeController->_consultarPorIdNatureza(1));
	}
	public function testSomaCrimeTodosAnos(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(1403323,$crimeController->_somaCrimeTodosAnos());
	}
	public function testRetornarDadosDeSomaFormatoNovo(){
$scriptTeste = "<div class=\"bar\"title=\"107.661 Ocorrencias\">
\t\t\t\t\t\t\t\t\t\t<div class=\"title\">2001</div>
										<div class=\"value\">107661</div>
										</div><div class=\"bar simple\"title=\"116.628 Ocorrencias\">
										<div class=\"title\">2002</div>
										<div class=\"value\">116628</div>
										</div><div class=\"bar\"title=\"135.033 Ocorrencias\">
										<div class=\"title\">2003</div>
										<div class=\"value\">135033</div>
										</div><div class=\"bar simple\"title=\"133.676 Ocorrencias\">
										<div class=\"title\">2004</div>
										<div class=\"value\">133676</div>
										</div><div class=\"bar\"title=\"129.797 Ocorrencias\">
										<div class=\"title\">2005</div>
										<div class=\"value\">129797</div>
										</div><div class=\"bar simple\"title=\"136.812 Ocorrencias\">
										<div class=\"title\">2006</div>
										<div class=\"value\">136812</div>
										</div><div class=\"bar\"title=\"129.592 Ocorrencias\">
										<div class=\"title\">2007</div>
										<div class=\"value\">129592</div>
										</div><div class=\"bar simple\"title=\"131.684 Ocorrencias\">
										<div class=\"title\">2008</div>
										<div class=\"value\">131684</div>
										</div><div class=\"bar\"title=\"131.976 Ocorrencias\">
										<div class=\"title\">2009</div>
										<div class=\"value\">131976</div>
										</div><div class=\"bar simple\"title=\"125.272 Ocorrencias\">
										<div class=\"title\">2010</div>
										<div class=\"value\">125272</div>
										</div><div class=\"bar\"title=\"125.192 Ocorrencias\">
										<div class=\"title\">2011</div>
										<div class=\"value\">125192</div>
										</div><div class=\"bar simple\"title=\"125.192 Ocorrencias\">
										<div class=\"title\">2011</div>
										<div class=\"value\">125192</div>
										</div><div class=\"bar\"title=\"0 Ocorrencias\">
										<div class=\"title\">2012</div>
										<div class=\"value\"></div>
										</div>";
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals($scriptTeste,$crimeController->_retornarDadosDeSomaFormatoNovo());
	}
	public function testConsultarPorIdTempo()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertInstanceOf('Crime', $crimeController->_consultarPorIdTempo(1));
	}
	public function testInserirCrime()
	{
		$crimeController = new CrimeController();
		$crimeController->__constructTeste();
		$this->assertNull($crimeController->_inserirCrime(new Crime()));
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
	}
	public function testSomaDeCrimePorAno(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(125192,$crimeController->_somaDeCrimePorAno(2011));
	}
	public function testSomaDeCrimePorNatureza(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(6633,$crimeController->_somaDeCrimePorNatureza('Estupro'));
	}
	/*
	public function testinserirCrimeArrayParseSerieHistorica()
	{
		$crimeController = new CrimeController();
		$crimeController->__constructTeste();
		$array['Estupro']['2001'] = 1;
		$this->assertEquals(0,$crimeController->_inserirCrimeArrayParseSerieHistorica($array));
	}*/
	public function testSomaHomicidios2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(13122,$crimeController->_somaHomicidios2010_2011());
	}
	public function testSomaCrime2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(250464,$crimeController->_somaCrime2010_2011());
	}
	public function testSomaTotalHomicidios(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(72171,$crimeController->_somaTotalHomicidios());
	}
	public function testSomaLesaoCorporal(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(1450746,$crimeController->_somaLesaoCorporal());
	}
	public function testSomaLesaoCorporal2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(2901492,$crimeController->_somaLesaoCorporal2010_2011());
	}
	public function testSomaTotalTentativasHomicidios2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(20400,$crimeController->_somaTotalTentativasHomicidio2010_2011());
	}
	public function testSomarGeral(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(69758681,$crimeController->_somarGeral());
	}
}
