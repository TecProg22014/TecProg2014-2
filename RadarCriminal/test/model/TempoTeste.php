<?php
	/**
	 * Classe Tempo Teste
	 **/
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	
	require_once "/model/Tempo.php";
	
	class TempoTeste extends PHPUnit_Framework_Testcase{
		
		public function setUp(){
			$this->time = new Tempo();
		}
		
		public function testSetTimeId(){
			$this->time->__setTimeId(1);
			$this->assertEquals(1, $this->time->__getTimeId());
		}
		public function testExceptionTimeId(){
			$this->setExpectedException('ETipoErrado');
			$this->time->__setTimeId('erro');
		}
		public function testSetInterval(){
			$this->time->__setInterval(1);
			$this->assertEquals(1,$this->time->__getInterval());
		}
		public function testExceptionInterval(){
			$this->setExpectedException('ETipoErrado');
			$this->time->__setInterval("erro");
		}
		public function testSetMonth(){
			$this->time->__setMes('teste');
			$this->assertEquals('teste',$this->time->__getMonth());
		}
		public function testConstructOverLoad(){
			$this->time->__constructOverload(1, '2001','janeiro');
			$this->assertEquals(1,$this->time->__getTimeId());
			$this->assertEquals('2001',$this->time->__getInterval());
			$this->assertEquals('janeiro',$this->time->__getMonth());
		}
	}
?>