<?php
	$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	
	require_once "../../controller/CategoriaController.php";
	require_once "../../model/Categoria.php";
	
	/**
	 * Class CategoriaControllerTeste
	 **/
	class CategoriaControllerTeste extends PHPUnit_Framework_Testcase{
		
		public function testConstruct()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
				
		}
		public function testGetAllCategories()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertNotEmpty($categoryController->_getAllCategories());
		}
		public function testGetAlphabeticllyAllCategories()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertNotEmpty($categoryController->_getAlphabeticallyAllCategories());
		}
		public function testGetCategoryById()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertInstanceOf('Categoria', $categoryController->_getCategoryById(1));
		}
		public function testExceptionGetCategoryById(){
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->setExpectedException('EErroConsulta');
			$categoryController->_getCategoryById('teste');
		}
		public function testGetCategoryByName()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertInstanceOf('Categoria', $categoryController->_getCategoryByName('Criminalidade'));
		}
		public function testExceptionGetCategoryByName(){
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->setExpectedException('EErroConsulta');
			$categoryController->_getCategoryByName(1);
		}
		
		public function testSaveCategory()
		{
			$categoryController = new CategoriaController();
			$categoryController->__constructTeste();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertInstanceOf('ADORecordSet_empty',$categoryController->_saveCategory(new Categoria()));
			
		}
		
		public function testSaveCategoriesParseArray()
		{
			$categoryController = new CategoriaController();
			$categoryController->__constructTeste();
			$arrayCategory[0] = "teste";	
			$this->assertInstanceOf('ADORecordSet_empty',$categoryController->_saveCategoriesParseArray($categoryArray));
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
		}
		public function testExceptionSaveCategoriesParseArray()
		{
			$categoryController = new CategoriaController();
			$categoryController->__constructTeste();
			$arrayCategory[0] = "teste";
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->setExpectedException('EErroConsulta');
			$categoryController->_saveCategoriesParseArray(10);
			
		}
		public function testSumAllStealing()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(1475370, $categoryController->_sumAllStealing());
		}
		public function testSumAllCopsActions()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(216513, $categoryController->_sumAllCopsActions());
		}
		public function testSumAllCrimesAgainsCitizens()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(216513, $categoryController->_sumAllCrimesAgainsCitizens());
		}
		public function testSumAllCrimesAgainsCitizens2010_2011()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(39366, $categoryController->_sumAllCrimesAgainsCitizens2010_2011());
		}
		public function testSumAllTheft()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(938223, $categoryController->_sumAllTheft());
		}
		public function testSumAllTheft2010_2011()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(1876446, $categoryController->_sumAllTheft2010_2011());
		}
		public function testCountCategories()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals(5, $categoryController->_countCategories());
		}
		public function testListCategories()
		{
			$categoryController = new CategoriaController();
			$this->assertObjectHasAttribute('categoryDAO', $categoryController);
			$this->assertInstanceOf('CategoriaController', $categoryController);
			$this->assertEquals("
				var data = [\t\t
				{ label: \"Criminalidade\",  data: 1194592},
				{ label: \"A��o Policial\",  data: 111264},
				{ label: \"Tr�nsito\",  data: 97467},
				{ label: \"Contra a Pessoa\",  data: 39206},
				{ label: \"Contra o Patrim�nio\",  data: 69460}
				];", $categoryController->_listCategories());
		}
	}
?>