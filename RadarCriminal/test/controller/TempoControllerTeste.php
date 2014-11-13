<?php

$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
require_once $SERVER_ADRESS."/controller/TempoController.php";
require_once $SERVER_ADRESS."/model/Tempo.php";

class TempoControllerTeste extends PHPUnit_Framework_Testcase{
	
	public function testConstruct()
	{
		$timeController = new TempoController();
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
	}
	public function testGetAllTimes()
	{
		$timeController = new TempoController();
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
		$this->assertNotEmpty($timeController->_getAllTimes());
	}
	public function testGetTimesOrderedByTimePeriods()
	{
		$timeController = new TempoController();
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
		$this->assertNotEmpty($timeController->_getTimesOrderedByTimePeriods());
	}
	public function testGetTimeById()
	{
		$timeController = new TempoController();
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
		$this->assertInstanceOf('Tempo', $timeController->_getTimeById(1));
	}
	public function testGetTimeByInterval()
	{
		$timeController = new TempoController();
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
		$this->assertInstanceOf('Tempo', $timeController->_getTimeByInterval(2001));
	}
	public function testSavePeriodOfTime()
	{
		$timeController = new TempoController();
		$timeController->__constructTeste();
		$this->assertNull($timeController->_savePeriodOfTime(new Tempo()));
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
	}
	
	public function testFormatDataList(){
		$timeController = new TempoController();
		$this->assertObjectHasAttribute('timeDAO', $timeController);
		$this->assertInstanceOf('TempoController', $timeController);
		$this->assertEquals($timeController->_formatDataList(),
			'labels : ["2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011"]');
	}
}