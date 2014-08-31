<?php
include_once('C:/xampp/htdocs/mds2013/model/Tempo.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
class TempoDAO{
	/**
	 * Variable to instance a object to conect with the database
	 * @var Conexao conexao
	 */
	private $conexao;
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct(){
		$this->conexao = new Conexao();
	}
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste(){
		$this->conexao = new ConexaoTeste();

	}
	/**
	 * Function to list all the times of the crimes
	 * @return $retornaTempos
	 */
	public function listarTodos(){
		$sql = "SELECT * FROM tempo";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject())
		{
			$dadosTempo = new Tempo();
			$dadosTempo->__constructOverload($registro->ID_TEMPO,$registro->ANO,$registro->MES);
			$retornaTempos[] = $dadosTempo;
		}
		return $retornaTempos;
	}
	/**
	 * Function to list all the times of the crimes in order
	 * @return $retornaTempos
	 */
	public function listarTodasEmOrdem(){
		$sql = "SELECT * FROM tempo ORDER BY ano ASC ";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject())
		{
			$dadosTempo = new Tempo();
			$dadosTempo->__constructOverload($registro->ID_TEMPO,$registro->ANO,$registro->MES);
			$retornaTempos[] = $dadosTempo;
		}
		return $retornaTempos;
	}
	/**
	 * Function to select one time by the id
	 * @param int $id
	 * @return $dadosTempo
	 */
	public function consultarPorId($id){
		$sql = "SELECT * FROM tempo WHERE id_tempo = '".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosTempo = new Tempo();
		$dadosTempo->__constructOverload($registro->ID_TEMPO,$registro->ANO,$registro->MES);
		return $dadosTempo;

	}

	/**
	 * Function to select one time by the interval
	 * @param int $intervalo
	 * @return String $dadosTempo
	 */
	public function consultarPorIntervalo($intervalo){
		$sql = "SELECT * FROM tempo WHERE ano = '".$intervalo."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosTempo = new Tempo();
		$dadosTempo->__constructOverload($registro->ID_TEMPO,$registro->ANO,$registro->MES);
		return $dadosTempo;
	}
	/**
	 * Function to insert one time in the database
	 * @param $tempo
	 */
	public function inserirTempo(Tempo $tempo){
		$sql = "INSERT INTO tempo (ano) VALUES ('{$tempo->__getIntervalo()}')";
		$this->conexao->banco->Execute($sql);
	}
}
