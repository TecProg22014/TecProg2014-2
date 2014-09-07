<?php
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT']; 
require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/controller/NaturezaController.php";
require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/model/Natureza.php";

class NaturezaControllerTeste extends PHPUnit_Framework_Testcase{

	function testConstruct(){
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
	}
	function testListarTodas(){
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertNotEmpty($naturezaController->_listarTodas());
	}
	public function testListarTodasAlfabicamente()
	{
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertNotEmpty($naturezaController->_listarTodasAlfabicamente());
	}
	public function testConsultarPorId()
	{
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertInstanceOf('Natureza', $naturezaController->_consultarPorId(1));
	}
	public function testExceptionsConsultarPorId(){
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->setExpectedException('EErroConsulta');
		$naturezaController->_consultarPorId('teste');
	}
	public function testConsultarPorNome()
	{
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertInstanceOf('Natureza', $naturezaController->_consultarPorNome('Roubo de Carga'));
	}
	public function testConsultarPorIdCategoria()
	{
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertArrayHasKey(1, $naturezaController->_consultarPorIdCategoria(1));
	}
	
	public function testInserirNatureza()
	{
		$naturezaController = new NaturezaController();
		$naturezaController->__constructTeste();
		$this->assertNull($naturezaController->_inserirNatureza(new Natureza()));
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
	}/*
	public function testInserirNaturezaArrayParse()
	{
		$naturezaController = new NaturezaController();
		$naturezaController->__constructTeste();
		$natureza = new Natureza();
		$array['Criminalidade'][0] = "testeNovo";
		$this->assertInstanceOf('Categoria',$naturezaController->_inserirArrayParse($array)); 
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertInstanceOf('Natureza', $natureza);
	}*/
	public function testExceptionInserirNaturezaArrayParse()
	{
		$naturezaController = new NaturezaController();
		$naturezaController->__constructTeste();
		$this->setExpectedException('EFalhaNaturezaController');
		$resultado = $naturezaController->_inserirArrayParse(1);
		$this->assertEquals('Criminalidade', $resultado->__getNomeCategoria());
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
	}
	public function testRetornarDadosDeNaturezaFormatado()
	{
		$naturezaController = new NaturezaController();
		$this->assertObjectHasAttribute('naturezaDAO', $naturezaController);
		$this->assertInstanceOf('NaturezaController', $naturezaController);
		$this->assertArrayHasKey('tempo', $naturezaController->_retornarDadosDeNaturezaFormatado('Estupro'));
	}
}