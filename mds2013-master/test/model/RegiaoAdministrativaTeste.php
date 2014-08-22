<?php

	require_once ('C:/xampp/htdocs/mds2013/model/RegiaoAdministrativa.php');
	
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