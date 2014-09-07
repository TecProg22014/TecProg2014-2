<?php
	/** Returns the physical address of the web server */
	$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
	require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/model/Categoria.php";
	
	/**
	 * Classe Categoria Teste
	 **/
	class CategoriaTeste extends PHPUnit_Framework_Testcase{
		
		/*
		 * @Before
		 */
		public function setUp(){
			$this->categoria = new Categoria();
		}
			
		public function testSetIdCategoria(){
			$this->assertInstanceOf('Categoria',$this->categoria);
			$this->assertObjectHasAttribute('idCategoria', $this->categoria);
			$this->categoria->__setIdCategoria(10);
			$this->assertEquals(10, $this->categoria->__getIdCategoria());
		}
		public function testExceptionSetIdCategoria(){
			$this->assertInstanceOf('Categoria',$this->categoria);
			$this->assertObjectHasAttribute('idCategoria', $this->categoria);
			$this->setExpectedException('ETipoErrado');
			$this->categoria->__setIdCategoria('errado');
		}
		public function testSetNomeCategoria(){
			$this->assertInstanceOf('Categoria',$this->categoria);
			$this->assertObjectHasAttribute('idCategoria', $this->categoria);
			$this->categoria->__setNomeCategoria("NomeCategoria");
			$this->assertEquals("NomeCategoria", $this->categoria->__getNomeCategoria());
		}
		public function testExceptionSetNomeCategoria(){
			$this->assertInstanceOf('Categoria',$this->categoria);
			$this->assertObjectHasAttribute('idCategoria', $this->categoria);
			$this->setExpectedException('ETipoErrado');
			$this->categoria->__setNomeCategoria(13);
		}
		
		public function testConstructOverLoad(){
			$this->assertInstanceOf('Categoria',$this->categoria);
			$this->assertObjectHasAttribute('idCategoria', $this->categoria);
			$this->categoria->__constructOverload(2,"nomeCategoria");
			$this->assertEquals(2,$this->categoria->__getIdCategoria());
			$this->assertEquals("nomeCategoria",$this->categoria->__getNomeCategoria());
			$this->assertInstanceOf('Categoria', $this->categoria);
		}
	}

?>