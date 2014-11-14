<?php

$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
require_once $SERVER_ADRESS."/controller/RegiaoAdministrativaController.php";
require_once $SERVER_ADRESS."/model/RegiaoAdministrativa.php";

class RegiaoAdministrativaControllerTeste extends PHPUnit_Framework_Testcase{
	public function testConstruct()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
	}
	
	public function testGetAllAdministrativeRegions()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->assertNotEmpty($administrativeRegionController->_getAllAdministrativeRegions());
	}
	public function testGetAdministrativeRegionsAlphabetically()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->assertNotEmpty($administrativeRegionController->_getAdministrativeRegionsAlphabetically());
	}
	public function testGetAdministrativeRegionById()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativa', $administrativeRegionController->_getAdministrativeRegionById(1));
	}
	public function testExceptionGetAdministrativeRegionById()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->setExpectedException('EErroConsulta');
		$administrativeRegionController->_getAdministrativeRegionById('teste');
	}
	public function testGetAdministrativeRegionByName()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativa', $administrativeRegionController->_getAdministrativeRegionByName('N BAND'));
	}
	public function testExceptionGetAdministrativeRegionByName()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->setExpectedException('EErroConsulta');
		$administrativeRegionController->_getAdministrativeRegionByName(1);
	}
	public function testCountAdministrativeRegions()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
		$this->assertEquals(32, $administrativeRegionController->_countAdministrativeRegions());
	}
	public function testSaveAdministrativeRegion()
	{
		$administrativeRegionController = new RegiaoAdministrativaController();
		$administrativeRegionController->__constructTeste();
		$this->assertInstanceOf('ADORecordSet_empty',$administrativeRegionController->_saveAdministrativeRegion(new RegiaoAdministrativa()));
		$this->assertObjectHasAttribute('administrativeRegionDAO', $administrativeRegionController);
		$this->assertInstanceOf('RegiaoAdministrativaController', $administrativeRegionController);
	}
}