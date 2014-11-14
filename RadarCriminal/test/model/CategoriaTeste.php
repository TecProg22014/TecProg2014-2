<?php
	
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	require_once "/model/Categoria.php";
	
	/**
	 * Classe Categoria Teste
	 **/
	class CategoriaTeste extends PHPUnit_Framework_Testcase{
		
		/*
		 * @Before
		 */
		public function setUp(){
			$this->category = new Categoria();
		}
			
		public function testSetCategoryId(){
			$this->assertInstanceOf('Categoria',$this->category);
			$this->assertObjectHasAttribute('categoryId', $this->category);
			$this->category->__setCategoryId(10);
			$this->assertEquals(10, $this->category->__getCategoryId());
		}
		public function testExceptionSetCategoryId(){
			$this->assertInstanceOf('Categoria',$this->category);
			$this->assertObjectHasAttribute('categoryId', $this->category);
			$this->setExpectedException('ETipoErrado');
			$this->category->__setCategoryId('errado');
		}
		public function testSetCategoryName(){
			$this->assertInstanceOf('Categoria',$this->category);
			$this->assertObjectHasAttribute('categoryId', $this->category);
			$this->category->__setCategoryName("CategoryName");
			$this->assertEquals("CategoryName", $this->category->__getCategoryName());
		}
		public function testExceptionSetCategoryName(){
			$this->assertInstanceOf('Categoria',$this->category);
			$this->assertObjectHasAttribute('categoryId', $this->category);
			$this->setExpectedException('ETipoErrado');
			$this->category->__setCategoryName(13);
		}
		
		public function testConstructOverLoad(){
			$this->assertInstanceOf('Categoria',$this->category);
			$this->assertObjectHasAttribute('categoryId', $this->category);
			$this->category->__constructOverload(2,"nomeCategoria");
			$this->assertEquals(2,$this->category->__getCategoryId());
			$this->assertEquals("nomeCategoria",$this->category->__getCategoryName());
			$this->assertInstanceOf('Categoria', $this->category);
		}
	}

?>