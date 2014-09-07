<?php


require_once "/persistence/RegiaoAdministrativaDAO.php";
include_once "/persistence/Conexao.php";

class RegiaoAdministrativaDAOTeste extends PHPUnit_Framework_TestCase{
	
	public function testConstruct(){
		$RADAO = new RegiaoAdministrativaDAO();
		$this->assertObjectHasAttribute('conexao', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativaDAO', $RADAO);
	}
	public function testListarTodas()
	{
		$RADAO = new RegiaoAdministrativaDAO();
		$this->assertObjectHasAttribute('conexao', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativaDAO', $RADAO);
		$this->assertNotEmpty($RADAO->listarTodas());
		$this->assertNotNull($RADAO->listarTodas());
	}
	public function testListarTodasAlfabeticamente()
	{
		$RADAO = new RegiaoAdministrativaDAO();
		$this->assertObjectHasAttribute('conexao', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativaDAO', $RADAO);
		$this->assertNotEmpty($RADAO->listarTodasAlfabeticamente());
		$this->assertNotNull($RADAO->listarTodasAlfabeticamente());
	}
	public function testConsultarPorId(){
		$RADAO = new RegiaoAdministrativaDAO();
		$this->assertObjectHasAttribute('conexao', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativaDAO', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativa', $RADAO->consultarPorId(1));
		$this->assertObjectHasAttribute('idRegiaoAdministrativa',$RADAO->consultarPorId(1));
	}
	public function testConsultarPorNome(){
		$RADAO = new RegiaoAdministrativaDAO();
		$this->assertObjectHasAttribute('conexao', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativaDAO', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativa', $RADAO->consultarPorNome('PLANALTINA'));
		$this->assertObjectHasAttribute('idRegiaoAdministrativa',$RADAO->consultarPorNome('PLANALTINA'));
	}
	public function testContarRegistrosRA(){
		$RADAO = new RegiaoAdministrativaDAO();
		$this->assertObjectHasAttribute('conexao', $RADAO);
		$this->assertInstanceOf('RegiaoAdministrativaDAO', $RADAO);
		$this->assertEquals(32,$RADAO->contarRegistrosRA());
	}
	
	 public function testInserirRA(){
	$raDAO = new RegiaoAdministrativaDAO();
	$raDAO->__constructTeste();
	$this->assertObjectHasAttribute('conexao', $raDAO);
	$this->assertInstanceOf('RegiaoAdministrativaDAO', $raDAO);
	$raDAO->inserirRA(new RegiaoAdministrativa());
	}
}