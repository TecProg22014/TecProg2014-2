<?php
include_once('C:/xampp/htdocs/mds2013/controller/CrimeController.php');
class CrimeView{
	private $crimeCO;
	public function __construct(){
		$this->crimeCO = new CrimeController();
	}

	//Metodo duplicado para adaptacao do retorno de dados para a nova interface
	/**
	 * @author Eduardo Augusto
	 * @author Sergio Silva
	 * @author Eliseu Egewarth
	 * @copyright RadarCriminal 2013
	 **/

	public function retornarDadosCrimeSomadoFormatoNovo(){
		return $this->crimeCO->_retornarDadosDeSomaFormatoNovo();
	}

	public function somaDeCrimePorAno($ano){
		return $this->crimeCO->_somaDeCrimePorAno($ano);
	}
	public function somaDeCrimePorNatureza($natureza){
		return $this->crimeCO->_somaDeCrimePorNatureza($natureza);
	}
	//Metodo duplicado para adaptacao do retorno de dados para a nova interface
	/**
	 * @author Sergio Silva
	 * @author Lucas Andrade Ribeiro
	 * @copyright RadarCriminal 2013
	 **/
	public function _somaCrimeTodosAnos(){
		return $this->crimeCO->_somaCrimeTodosAnos();
	}

	public function _somaCrime2010_2011(){
		return $this->crimeCO->_somaCrime2010_2011();
	}
	//Metodo duplicado para adaptacao do retorno de dados para a nova interface
	/**
	 * @author Lucas Andrade Ribeiro
	 * @author Sergio Silva
	 * @copyright RadarCriminal 2013
	 **/
	public function _somaHomicidios2010_2011(){
		return $this->crimeCO->_somaHomicidios2010_2011();
	}

	public function _somaTotalHomicidios(){
		return $this->crimeCO->_somaTotalHomicidios();
	}

	
	public function _somaLesaoCorporal(){
		return $this->crimeCO->_somaLesaoCorporal();
	}

	public function _somaLesaoCorporal2010_2011(){
		return $this->crimeCO->_somaLesaoCorporal2010_2011();
	}

	public function _somaTotalTentativasHomicidio(){
		return $this->crimeCO->_somaTotalTentativasHomicidio();
	}

	public function _somaTotalTentativasHomicidio2010_2011(){
		return $this->crimeCO->_somaTotalTentativasHomicidio2010_2011();
	}

	
	public function _somarGeral(){
		return $this->crimeCO->_somarGeral();
	}
}