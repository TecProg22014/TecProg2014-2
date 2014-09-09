<?php
	
	
	require_once "/controller/CategoriaController.php";
	require_once "/model/Categoria.php";
	
	/**
	 * Classe CategoriaControllerTeste
	 **/
	class CategoriaControllerTeste extends PHPUnit_Framework_Testcase{
		
		public function testConstruct()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
				
		}
		public function testListarTodas()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertNotEmpty($categoriaController->_listarTodas());
		}
		public function testListarTodasAlfabicamente()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertNotEmpty($categoriaController->_listarTodasAlfabicamente());
		}
		public function testConsultarPorId()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertInstanceOf('Categoria', $categoriaController->_consultarPorId(1));
		}
		public function testExceptionConsultarPorId(){
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->setExpectedException('EErroConsulta');
			$categoriaController->_consultarPorId('teste');
		}
		public function testConsultarPorNome()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertInstanceOf('Categoria', $categoriaController->_consultarPorNome('Criminalidade'));
		}
		public function testExceptionConsultarPorNome(){
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->setExpectedException('EErroConsulta');
			$categoriaController->_consultarPorNome(1);
		}
		
		public function testInserirCategoria()
		{
			$categoriaController = new CategoriaController();
			$categoriaController->__constructTeste();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertInstanceOf('ADORecordSet_empty',$categoriaController->_inserirCategoria(new Categoria()));
			
		}
		
		public function testInserirCategoriaArrayParse()
		{
			$categoriaController = new CategoriaController();
			$categoriaController->__constructTeste();
			$arrayCategoria[0] = "teste";	
			$this->assertInstanceOf('ADORecordSet_empty',$categoriaController->_inserirCategoriaArrayParseSerie($arrayCategoria));
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
		}
		public function testExceptionInserirCategoriaArrayParse()
		{
			$categoriaController = new CategoriaController();
			$categoriaController->__constructTeste();
			$arrayCategoria[0] = "teste";
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->setExpectedException('EErroConsulta');
			$categoriaController->_inserirCategoriaArrayParseSerie(10);
			
		}
		public function testSomaTotalFurtos()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(1475370, $categoriaController->_somaTotalFurtos());
		}
		public function testSomaTotalAcaoPolicial()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(216513, $categoriaController->_somaGeralCrimeContraPessoa());
		}
		public function testSomaGeralCrimeContraPessoa()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(216513, $categoriaController->_somaGeralCrimeContraPessoa());
		}
		public function testSomaGeralCrimeContraPessoa2010_2011()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(39366, $categoriaController->_somaGeralCrimeContraPessoa2010_2011());
		}
		public function testSomaTotalRoubo()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(938223, $categoriaController->_somaTotalRoubo());
		}
		public function testSomaTotalRoubo2010_2011()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(1876446, $categoriaController->_somaTotalRoubo2010_2011());
		}
		public function testContarRegistros()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals(5, $categoriaController->_contarRegistros());
		}
		public function testListarTotalDeCategoria()
		{
			$categoriaController = new CategoriaController();
			$this->assertObjectHasAttribute('categoriaDAO', $categoriaController);
			$this->assertInstanceOf('CategoriaController', $categoriaController);
			$this->assertEquals("
		var data = [
\t\t{ label: \"Criminalidade\",  data: 1194592},
		{ label: \"Ação Policial\",  data: 111264},
		{ label: \"Trânsito\",  data: 97467},
		{ label: \"Contra a Pessoa\",  data: 39206},
		{ label: \"Contra o Patrimônio\",  data: 69460}
		];", $categoriaController->_listarTotalDeCategoria());
		}
	}
?>