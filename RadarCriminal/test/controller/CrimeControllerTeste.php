<?php

$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
require_once $SERVER_ADRESS."/controller/CrimeController.php";
require_once $SERVER_ADRESS."/model/Crime.php";


class CrimeControllerTeste extends PHPUnit_Framework_Testcase{
	
	public function testConstruct()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
	}
	public function testGetAllCrimes()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertNotEmpty($crimeController->_getAllCrimes());
	}
	public function testGetCrimeById()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertInstanceOf('Crime', $crimeController->_getCrimeById(1));
	}
	public function testGetCrimeByNatureId()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertInstanceOf('Crime',$crimeController->_getCrimesByNatureId(1));
	}
	public function testSumCrimesOfAllYears(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(1403323,$crimeController->_sumCrimesOfAllYears());
	}
	public function testSumCrimesToGraph(){
		$scriptTeste = "<div class=\"bar\"title=\"107.661 Ocorrencias\">\t\t\t\t\t\t\t\t\t\t
					<div class=\"title\">2001</div>
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
		$this->assertEquals($scriptTeste,$crimeController->_sumCrimesToGraph());
	}
	public function testConsultarPorIdTempo()
	{
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertInstanceOf('Crime', $crimeController->_getCrimesByTimeId(1));
	}
	public function testSaveCrime()
	{
		$crimeController = new CrimeController();
		$crimeController->__constructTeste();
		$this->assertNull($crimeController->_saveCrime(new Crime()));
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
	}
	public function testSumCrimesPerYear(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(125192,$crimeController->_sumCrimesPerYear(2011));
	}
	public function testSumCrimeByNature(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(6633,$crimeController->_sumCrimesByNature('Estupro'));
	}
	
	public function testSumHomicides2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(13122,$crimeController->_sumHomicides2010_2011());
	}
	public function testSumCrimes2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(250464,$crimeController->_sumCrimes2010_2011());
	}
	public function testSumAllHomicides(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(72171,$crimeController->_sumAllHomicides());
	}
	public function testSumAllInjury(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(1450746,$crimeController->_sumAllInjury());
	}
	public function testSumInjury2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(2901492,$crimeController->_sumIjnury2010_2011());
	}
	public function testSumMurderAttempts2010_2011(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(20400,$crimeController->_sumMurderAttempts2010_2011());
	}
	public function testSumAllCrimes(){
		$crimeController = new CrimeController();
		$this->assertObjectHasAttribute('crimeDAO', $crimeController);
		$this->assertInstanceOf('CrimeController', $crimeController);
		$this->assertEquals(69758681,$crimeController->_sumAllCrimes());
	}
}
