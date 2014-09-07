<?php
	/** Returns the physical address of the web server */
	$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
	require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/persistence/CategoriaDAO.php";
	include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/persistence/Conexao.php";

/**
 * Classe de teste da classe CategoriaDAO
 * @author Lucas Andrade Ribeiro
 * @copyright RadarCriminal 2013
 */
	class CategoriaDAOTeste extends PHPUnit_Framework_TestCase{
		
		
		public function testConstruct(){
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
		}
		public function testListarTodas()
		{
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertNotEmpty($categoriaDAO->listarTodas());
			$this->assertNotNull($categoriaDAO->listarTodas());
		}
		
		public function testListarTodasAlfabeticamente()
		{
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertNotEmpty($categoriaDAO->listarTodasAlfabicamente());
			$this->assertNotNull($categoriaDAO->listarTodasAlfabicamente());
		}
	
		public function testConsultarPorId(){
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertInstanceOf('Categoria', $categoriaDAO->consultarPorId(1));
			$this->assertObjectHasAttribute('idCategoria',$categoriaDAO->consultarPorId(1));
		}
		public function testConsultarPorNome(){
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertInstanceOf('Categoria', $categoriaDAO->consultarPorNome('Criminalidade'));
			$this->assertObjectHasAttribute('idCategoria',$categoriaDAO->consultarPorNome('Criminalidade'));
		}
		
		public function testInserirCategoria(){
			$categoriaDAO = new CategoriaDAO();
			$categoriaDAO->__constructTeste();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertInstanceOf('ADORecordSet_empty',$categoriaDAO->inserirCategoria(new Categoria()));
			
		}
		public function testContarRegistros(){
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertEquals(5,$categoriaDAO->contarRegistros());
		}
		public function testSomaTotalAcaoPolicial()
		{
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertEquals(111264,$categoriaDAO->somaTotalAcaoPolicial());
		}
		public function testSomaTotalDignidadeSexual()
		{
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertEquals(7316,$categoriaDAO->somaTotalDignidadeSexual());
		}
		public function testSomaTotalContraPatrimonio()
		{
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertEquals(822978,$categoriaDAO->somaTotalContraPatrimonio());
		}
		public function testSomaTotalTransito()
		{
			$categoriaDAO = new CategoriaDAO();
			$this->assertObjectHasAttribute('conexao', $categoriaDAO);
			$this->assertInstanceOf('CategoriaDAO', $categoriaDAO);
			$this->assertEquals(152421,$categoriaDAO->somaTotalTransito());
		}
	}
