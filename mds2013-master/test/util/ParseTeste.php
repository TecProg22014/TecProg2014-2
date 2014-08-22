<?php
/**
 *	Desenvolvimento dos testes automatizados da classe Parse
 *	@author Lucas Carvalho
 *	@copyright Radar Criminal 2013
 */
require_once ('C:/xampp/htdocs/mds2013/util/Parse.php');
class ParseTeste extends PHPUnit_Framework_Testcase{
	
	public function testExistenciaInstanciaParseSerieHistorica(){
		$planilha = "s�rie hist�rica - 2001 - 2012 2.xls";
		$this->assertFileExists('C:/xampp/htdocs/mds2013/files/'.$planilha);
		$parse = new Parse($planilha);
		$this->assertInstanceOf("Parse", $parse);
	}
	public function testExistenciaInstanciaParseQuadrimestre(){
		$planilha = "Quadrimestre_final.2013.xls";	
		$this->assertFileExists('C:/xampp/htdocs/mds2013/files/'.$planilha);
		$parse = new Parse($planilha);
		$this->assertInstanceOf("Parse", $parse);
	}
	public function testExistenciaInstanciaParseRA(){
		$planilha = "JAN_SET_2011_12  POR REGIAO ADM_2.xls";
		$this->assertFileExists('C:/xampp/htdocs/mds2013/files/'.$planilha);
		$parse = new Parse($planilha);
		$this->assertInstanceOf("Parse", $parse);
	}
	public function testeSetNatureza(){
		$planilha = "s�rie hist�rica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setNatureza("Natureza");
		$this->assertEquals("Natureza", $parse->__getNatureza());
	}
	public function testeSetCategoria(){
		$planilha = "s�rie hist�rica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setCategoria("Categoria");
		$this->assertEquals("Categoria", $parse->__getCategoria());
	}
	public function testeSetTempo(){
		$planilha = "s�rie hist�rica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setTempo(2013);
		$this->assertEquals(2013, $parse->__getTempo());
	}
	public function testeSetCrime(){
		$planilha = "s�rie hist�rica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setCrime(200);
		$this->assertEquals(200 , $parse->__getCrime());
	}
public function testeSetRegiao(){
		$planilha = "s�rie hist�rica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setRegiao('N BAND');
		$this->assertEquals('N BAND' , $parse->__getRegiao());
	}
}