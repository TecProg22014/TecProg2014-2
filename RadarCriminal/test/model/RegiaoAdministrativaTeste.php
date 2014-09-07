<?php
	/** Returns the physical address of the web server */
	$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
	require_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/model/RegiaoAdministrativa.php";
	
	/**
	 * Classe RegiaoAdministrativa Teste
	 **/
	class RegiaoAdministrativaTeste extends PHPUnit_Framework_Testcase{
		
		private $regiaoAdministrativa;
		
		public function setUp(){
			$this->regiaoAdministrativa = new RegiaoAdministrativa();
		}
		public function testeConstructOverLoad(){
			$this->regiaoAdministrativa->__constructOverLoad(1, 'teste');
			$this->assertEquals(1,$this->regiaoAdministrativa->__getIdRegiaoAdministrativa());
			$this->assertEquals('teste',$this->regiaoAdministrativa->__getNomeRegiao());
		}
		public function testSetIdRegiaoAdministriva(){
			$this->regiaoAdministrativa->__setIdRegiaoAdministrativa(42);
			$this->assertEquals(42, $this->regiaoAdministrativa ->__getIdRegiaoAdministrativa());
		}
		public function testExceptionSetIdRegiaoAdministrativa(){
			$this->setExpectedException('ETipoErrado');
			$this->regiaoAdministrativa->__setIdRegiaoAdministrativa("erro");
		}
		public function testSetNomeRegiaoAdministrativa(){
			$this->regiaoAdministrativa ->__setNomeRegiao("Regiao Administrativa");
			$this->assertEquals("Regiao Administrativa", $this->regiaoAdministrativa ->__getNomeRegiao());
		}
		public function testExceptionSetNomeRegiaoAdministrativa(){
			$this->setExpectedException('ETipoErrado');
			$this->regiaoAdministrativa->__setNomeRegiao(0);
		}
	}
?>