<?php

$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal"; 
require_once $SERVER_ADRESS."/controller/NaturezaController.php";
require_once $SERVER_ADRESS."/model/Natureza.php";

class NaturezaControllerTeste extends PHPUnit_Framework_Testcase{

	function testConstruct(){
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
	}
	function testeGetAllNatures(){
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->assertNotEmpty($natureController->_getAllNatures());
	}
	public function testGetNaturesAlphabetically()
	{
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->assertNotEmpty($natureController->_getNaturesAlphabetically());
	}
	public function testGetNatureById()
	{
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->assertInstanceOf('Natureza', $natureController->_getNatureById(1));
	}
	public function testExceptionsGetNatureById(){
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->setExpectedException('EErroConsulta');
		$natureController->_getNatureById('teste');
	}
	public function testGetNatureByName()
	{
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->assertInstanceOf('Natureza', $natureController->_getNatureByName('Roubo de Carga'));
	}
	public function testConsultarPorIdCategoria()
	{
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->assertArrayHasKey(1, $natureController->_consultarPorIdCategoria(1));
	}
	
	public function testSaveNature()
	{
		$natureController = new NaturezaController();
		$natureController->__constructTeste();
		$this->assertNull($natureController->_saveNature(new Natureza()));
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
	}
	
	public function testExceptionSaveNatureParseArray()
	{
		$natureController = new NaturezaController();
		$natureController->__constructTeste();
		$this->setExpectedException('EFalhaNaturezaController');
		$resultado = $natureController->_saveNatureParseArray(1);
		$this->assertEquals('Criminalidade', $resultado->__getCAtegoryName());
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
	}
	public function testListFormatedNatures()
	{
		$natureController = new NaturezaController();
		$this->assertObjectHasAttribute('natureDAO', $natureController);
		$this->assertInstanceOf('NaturezaController', $natureController);
		$this->assertArrayHasKey('tempo', $natureController->_listFormatedNatures('Estupro'));
	}
}