<?php
/**
 *	Desenvolvimento dos testes automatizados da classe Parse
 *	@author Lucas Carvalho
 *	@copyright Radar Criminal 2013
 */
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/util/Parse.php";

class ParseTeste extends PHPUnit_Framework_Testcase{
	
	public function testExistenciaInstanciaParseSerieHistorica(){
		$planilha = "série histórica - 2001 - 2012 2.xls";
		$this->assertFileExists $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/files/'.$planilha);
		$parse = new Parse($planilha);
		$this->assertInstanceOf("Parse", $parse);
	}
	public function testExistenciaInstanciaParseQuadrimestre(){
		$planilha = "Quadrimestre_final.2013.xls";	
		$this->assertFileExists $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/files/'.$planilha);
		$parse = new Parse($planilha);
		$this->assertInstanceOf("Parse", $parse);
	}
	public function testExistenciaInstanciaParseRA(){
		$planilha = "JAN_SET_2011_12  POR REGIAO ADM_2.xls";
		$this->assertFileExists $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/files/'.$planilha);
		$parse = new Parse($planilha);
		$this->assertInstanceOf("Parse", $parse);
	}
	public function testeSetNatureza(){
		$planilha = "série histórica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setNatureza("Natureza");
		$this->assertEquals("Natureza", $parse->__getNatureza());
	}
	public function testeSetCategoria(){
		$planilha = "série histórica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setCategoria("Categoria");
		$this->assertEquals("Categoria", $parse->__getCategoria());
	}
	public function testeSetTempo(){
		$planilha = "série histórica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setTempo(2013);
		$this->assertEquals(2013, $parse->__getTempo());
	}
	public function testeSetCrime(){
		$planilha = "série histórica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setCrime(200);
		$this->assertEquals(200 , $parse->__getCrime());
	}
public function testeSetRegiao(){
		$planilha = "série histórica - 2001 - 2012 2.xls";
		$parse = new Parse($planilha);
		$parse->__setRegiao('N BAND');
		$this->assertEquals('N BAND' , $parse->__getRegiao());
	}
}