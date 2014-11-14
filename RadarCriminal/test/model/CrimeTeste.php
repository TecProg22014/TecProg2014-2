<?php
	$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	require_once "/model/Crime.php";
	
	
	class CrimeTeste extends PHPUnit_Framework_Testcase{
		
		public function setUp(){
			$this->crime = new Crime();
		}
		
		public function testAttributeCrimeId(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->crime->__setCrimeId(15);
			$this->assertEquals(15,$this->crime->__getCrimeId());
		}
		public function testExceptionSetCrimeId(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->setExpectedException('ETipoErrado');
			$this->crime->__setCrimeId("erro");
		}
		public function testAttributeAmount(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->crime->__setAmount(15);
			$this->assertEquals(15, $this->crime->__getAmount());
		}
		public function testAttributeTimeId(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->crime->__setTimeId(15);
			$this->assertEquals(15, $this->crime->__getTimeId());
		}
		public function testAttributeNatureId(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->crime->__setNatureId(15);
			$this->assertEquals(15, $this->crime->__getNatureId());
		}
		public function testConstructOverLoad(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->crime->__constructOverload(1,2,3,4);
			$this->assertEquals(1, $this->crime->__getCrimeId());
			$this->assertEquals(2, $this->crime->__getTimeId());
			$this->assertEquals(3, $this->crime->__getNatureId());
			$this->assertEquals(4, $this->crime->__getAmount());
		}
		public function testRaId(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('crimeId', $this->crime);
			$this->crime->__setRaId(1);
			$this->assertEquals(1, $this->crime->__getRaId());
		}
	}
?>
