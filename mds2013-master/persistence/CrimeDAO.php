<?php
include_once('C:/xampp/htdocs/mds2013/model/Crime.php');
include_once('C:/xampp/htdocs/mds2013/model/Tempo.php');
include_once('C:/xampp/htdocs/mds2013/model/Natureza.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
include_once('C:/xampp/htdocs/mds2013/persistence/NaturezaDAO.php');
include_once('C:/xampp/htdocs/mds2013/persistence/TempoDAO.php');

class CrimeDAO{
	private $conexao;
	public function __construct(){
		$this->conexao = new Conexao();
	}
	public function __constructTeste(){
		$this->conexao = new ConexaoTeste();
	
	}
	public function listarTodos(){
		$sql = "SELECT * FROM crime";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject())
		{
			$dadosCrime = new Crime();
			$dadosCrime->__constructOverload($registro->ID_CRIME,$registro->TEMPO_ID_TEMPO,$registro->NATUREZA_ID_NATUREZA,$registro->QUANTIDADE);
			$retornaCrimes[] = $dadosCrime;
		}
		return $retornaCrimes;
	}
	public function consultarPorId($id){
		$sql = "SELECT * FROM crime WHERE id_crime = '".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosCrime = new Crime();
		$dadosCrime->__constructOverload($registro->ID_CRIME,$registro->TEMPO_ID_TEMPO,$registro->NATUREZA_ID_NATUREZA,$registro->QUANTIDADE);
		return $dadosCrime;
	}
	public function consultarPorIdNatureza($id){
		$sql = "SELECT * FROM crime WHERE natureza_id_natureza = '".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosCrime = new Crime();
		$dadosCrime->__constructOverload($registro->ID_CRIME,$registro->TEMPO_ID_TEMPO,$registro->NATUREZA_ID_NATUREZA,$registro->QUANTIDADE);
		return $dadosCrime;
	}
	public function consultarPorIdTempo($id){
		$sql = "SELECT * FROM crime WHERE tempo_id_tempo = '".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosCrime = new Crime();
		$dadosCrime->__constructOverload($registro->ID_CRIME,$registro->TEMPO_ID_TEMPO,$registro->NATUREZA_ID_NATUREZA,$registro->QUANTIDADE);
		return $dadosCrime;
	}
	public function somaDeCrimePorAno($ano){
		$sql = "SELECT SUM(c.quantidade) as total FROM crime c, tempo t WHERE t.ano = '".$ano."' AND c.tempo_id_tempo = t.id_tempo AND c.id_crime BETWEEN 1 AND 341";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	public function somaDeCrimePorNatureza($natureza){
		$sql = "SELECT Sum(c.quantidade) as total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.natureza = '".$natureza."' AND c.id_crime BETWEEN 1 AND 341";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	//Metodo de somar todos homicícios por ano
	/**
	 * @author Lucas Andrade Ribeiro
	 * @author Sergio Silva
	 * @copyright RadarCriminal 2013
	 **/

	public function somaTotalHomicidios(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 1";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	public function somaDeCrimePorNaturezaEmAno($natureza,$ano){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n,tempo t WHERE c.natureza_id_natureza = n.id_natureza AND c.tempo_id_tempo = t.id_tempo AND t.ano = ".$ano." AND n.natureza = '".$natureza."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	//Metodo de somar todos homicícios por ano
	/**
	 * @author Lucas Andrade Ribeiro
	 * @author Sergio Silva
	 * @copyright RadarCriminal 2013
	 **/

	public function somaLesaoCorporal(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 3";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	public function somaTotalTentativasHomicidio(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza = 2";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	
	
	public function somarGeral(){
		$sql = "SELECT SUM(total) as total FROM totalgeralcrimes ";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;	
	}

	//INICIO DOS MÉTODOS DE INSERÇÃO

	public function inserirCrime(Crime $crime){
		$sql = "INSERT INTO crime (natureza_id_natureza,tempo_id_tempo,quantidade,regiao_administrativa_id_regiao_administrativa) VALUES ('{$crime->__getIdNatureza()}','{$crime->__getIdTempo()}','{$crime->__getQuantidade()}','{$crime->__getIdRegiaoAdministrativa()}')";
		$this->conexao->banco->Execute($sql);

		//if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
		//	throw new EConexaoFalha();
		//}


		//if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
		//		throw new EConexaoFalha();
		//}

	}

}