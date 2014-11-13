<?php
	
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	require_once "/model/Natureza.php";
	
	class NaturezaTeste extends PHPUnit_Framework_Testcase{
		
		public function setUp(){
			$this->nature = new Natureza();
		}
		public function testNatureId(){
			$nature = new Natureza();
			$this->assertInstanceOf('Natureza',$nature);
			$this->assertObjectHasAttribute('natureId', $nature);
			$nature->__setNatureId(12);
			$this->assertEquals(12, $nature->__getNatureId());
		}
		public function testExceptionSetNatureId(){
			$nature = new Natureza();
			$this->assertInstanceOf('Natureza',$nature);
			$this->assertObjectHasAttribute('natureId', $nature);
			$this->setExpectedException('ETipoErrado');
			$nature->__setIdNatureza("erro");
		}
		public function testNature(){
			$nature = new Natureza();
			$this->assertInstanceOf('Natureza',$nature);
			$this->assertObjectHasAttribute('natureId', $nature);
			$nature->__setNature("test");
			$this->assertEquals("test", $nature->__getNature());
		}
		public function testExceptionSetNature(){
			$nature = new Natureza();
			$this->assertInstanceOf('Natureza',$nature);
			$this->assertObjectHasAttribute('natureId', $nature);
			$this->setExpectedException('ETipoErrado');
			$nature->__setNature(10);
		}
		public function testExceptionSetCategoryId(){
			$nature = new Natureza();
			$this->assertInstanceOf('Natureza',$nature);
			$this->assertObjectHasAttribute('natureId', $nature);
			$this->setExpectedException('ETipoErrado');
			$nature->__setCategoryId("erro");
		}
		public function testCategoryId(){
			$nature = new Natureza();
			$this->assertInstanceOf('Natureza',$nature);
			$this->assertObjectHasAttribute('natureId', $nature);
			$nature->__setCategoryId(10);
			$this->assertEquals(10, $nature->__getCategoryId());
		}
		public function testConstructOverLoad(){
			$this->natureza->__constructOverload(1, "natureza", 2);
			$this->assertEquals(1, $this->natureza->__getNatureId());
			$this->assertEquals("natureza", $this->natureza->__getNature());
			$this->assertEquals(2, $this->natureza->__getCategoryId());
		}
	}
?>