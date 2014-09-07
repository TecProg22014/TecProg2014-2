<?php


require_once "/controller/RegiaoAdministrativaController.php";
require_once "/model/RegiaoAdministrativa.php";

class RegiaoAdministrativaControllerTeste extends PHPUnit_Framework_Testcase{
	public function testConstruct()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
	}
	
	public function testListarTodas()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->assertNotEmpty($RAController->_listarTodas());
	}
	public function testListarTodasAlfabeticamente()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->assertNotEmpty($RAController->_listarTodasAlfabeticamente());
	}
	public function testConsultarPorId()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativa', $RAController->_consultarPorId(1));
	}
	public function testExceptionConsultarPorId()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->setExpectedException('EErroConsulta');
		$RAController->_consultarPorId('teste');
	}
	public function testConsultarPorNome()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativa', $RAController->_consultarPorNome('N BAND'));
	}
	public function testExceptionConsultarPorNome()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->setExpectedException('EErroConsulta');
		$RAController->_consultarPorNome(1);
	}
	public function testContarRegistrosRA()
	{
		$RAController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('raDAO', $RAController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $RAController);
		$this->assertEquals(32, $RAController->_contarRegistrosRA());
	}
	public function testInserirRA()
	{
		$raCO = new RegiaoAdministrativaController();
		$raCO->__constructTeste();
		$this->assertInstanceOf('ADORecordSet_empty',$raCO->_inserirRA(new RegiaoAdministrativa()));
		$this->assertObjectHasAttribute('raDAO', $raCO);
		$this->assertInstanceOf('RegiaoAdministrativaController', $raCO);
	}
}