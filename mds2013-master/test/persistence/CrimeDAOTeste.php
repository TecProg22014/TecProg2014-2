<?php
require_once('C:/xampp/htdocs/mds2013/persistence/CrimeDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
/**
 * Classe de teste da classe CrimeDAO
 * @author Lucas Andrade Ribeiro
 * @copyright RadarCriminal 2013
 */
class CrimeDAOTeste extends PHPUnit_Framework_TestCase{
	
	function testConstruct(){
			$crimeDAO = new CrimeDAO();
			$this->assertObjectHasAttribute('conexao', $crimeDAO);
			$this->assertInstanceOf('CrimeDAO', $crimeDAO);
	}
	public function testListarTodas()
	{
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertNotEmpty($crimeDAO->listarTodos());
		$this->assertNotNull($crimeDAO->listarTodos());
	}
	public function testConsultarPorId(){
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertInstanceOf('Crime', $crimeDAO->consultarPorId(1));
		$this->assertObjectHasAttribute('idCrime',$crimeDAO->consultarPorId(1));
	}
	public function testConsultarPorIdNatureza(){
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertInstanceOf('Crime', $crimeDAO->consultarPorIdNatureza(1));
		$this->assertObjectHasAttribute('idCrime',$crimeDAO->consultarPorIdNatureza(1));
	}
	public function testConsultarPorIdTempo(){
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertInstanceOf('Crime', $crimeDAO->consultarPorIdTempo(1));
		$this->assertObjectHasAttribute('idCrime',$crimeDAO->consultarPorIdTempo(1));
	}
	public function testSomaDeCrimePorAno(){
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertNotNull($crimeDAO->somaDeCrimePorAno(2001));
		$this->assertEquals(107661,$crimeDAO->somaDeCrimePorAno(2001));
	}
	public function testSomaDeCrimePorNatureza(){
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertNotNull($crimeDAO->somaDeCrimePorNatureza('Estupro'));
		$this->assertEquals(6633,$crimeDAO->somaDeCrimePorNatureza('Estupro'));
	}
	public function testSomaDeCrimePorNaturezaEmAno(){
		$crimeDAO = new CrimeDAO();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$this->assertNotNull($crimeDAO->somaDeCrimePorNaturezaEmAno('Estupro',2001));
		$this->assertEquals(740,$crimeDAO->somaDeCrimePorNaturezaEmAno('Estupro',2001));
	}
	
	public function testeInserirCrime(){
		$crimeDAO = new CrimeDAO();
		$crimeDAO->__constructTeste();
		$this->assertObjectHasAttribute('conexao', $crimeDAO);
		$this->assertInstanceOf('CrimeDAO', $crimeDAO);
		$crimeDAO->inserirCrime(new Crime());
	}
	
}