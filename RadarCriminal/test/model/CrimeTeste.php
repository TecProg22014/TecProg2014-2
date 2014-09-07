<?php
	/**
	 * @author Eliseu
	 * Classe Crime Teste
	 **/
	
	
	require_once "/model/Crime.php";
	
	
	class CrimeTeste extends PHPUnit_Framework_Testcase{
		
		public function setUp(){
			$this->crime = new Crime();
		}
		
		public function testeAtributoIdCrime(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->crime->__setIdCrime(15);
			$this->assertEquals(15,$this->crime->__getIdCrime());
		}
		public function testExceptionSetIdCrime(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->setExpectedException('ETipoErrado');
			$this->crime->__setIdCrime("erro");
		}
		public function testeAtributoQuantidade(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->crime->__setQuantidade(15);
			$this->assertEquals(15, $this->crime->__getQuantidade());
		}
		public function testeIdTempo(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->crime->__setIdTempo(15);
			$this->assertEquals(15, $this->crime->__getIdTempo());
		}
		public function testeIdNatureza(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->crime->__setIdNatureza(15);
			$this->assertEquals(15, $this->crime->__getIdNatureza());
		}
		public function testeConstructOverLoad(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->crime->__constructOverload(1,2,3,4);
			$this->assertEquals(1, $this->crime->__getIdCrime());
			$this->assertEquals(2, $this->crime->__getIdTempo());
			$this->assertEquals(3, $this->crime->__getIdNatureza());
			$this->assertEquals(4, $this->crime->__getQuantidade());
		}
		public function testeIdRA(){
			$this->assertInstanceOf('Crime',$this->crime);
			$this->assertObjectHasAttribute('idCrime', $this->crime);
			$this->crime->__setIdRegiaoAdministrativa(1);
			$this->assertEquals(1, $this->crime->__getIdRegiaoAdministrativa());
		}
	}
?>
