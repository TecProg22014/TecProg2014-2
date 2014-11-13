<?php
	
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	require_once "/model/AdministrativeRegion.php";
	
	/**
	 * Classe AdministrativeRegion Teste
	 **/
	class AdministrativeRegionTeste extends PHPUnit_Framework_Testcase{
		
		private $administrativeRegion;
		
		public function setUp(){
			$this->administrativeRegion = new AdministrativeRegion();
		}
		public function testConstructOverLoad(){
			$this->administrativeRegion->__constructOverLoad(1, 'test');
			$this->assertEquals(1,$this->administrativeRegion->__getAdministrativeRegionId());
			$this->assertEquals('test',$this->administrativeRegion->__getRegionName());
		}
		public function testSetAdministrativeRegionId(){
			$this->administrativeRegion->__setAdministrativeRegionId(42);
			$this->assertEquals(42, $this->administrativeRegion ->__getAdministrativeRegionId());
		}
		public function testExceptionSetAdministrativeRegionId(){
			$this->setExpectedException('ETipoErrado');
			$this->administrativeRegion->__setAdministrativeRegionId("erro");
		}
		public function testSetAdministrativeRegionName(){
			$this->administrativeRegion ->__setNomeRegiao("Regiao Administrativa");
			$this->assertEquals("Regiao Administrativa", $this->administrativeRegion ->__getRegionName());
		}
		public function testExceptionSetAdministrativeRegionName(){
			$this->setExpectedException('ETipoErrado');
			$this->administrativeRegion->__setRegionName(0);
		}
	}
?>