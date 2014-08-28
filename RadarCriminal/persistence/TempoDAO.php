<?php
include_once('C:/xampp/htdocs/mds2013/model/Tempo.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
class TempoDAO{
	private $conexao;
	public function __construct(){
		$this->conexao = new Conexao();
	} 
	public function __constructTeste(){
		$this->conexao = new ConexaoTeste();
	
	}
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
	public function consultarPorId($id){
		$sql = "SELECT * FROM tempo WHERE id_tempo = '".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosTempo = new Tempo();
		$dadosTempo->__constructOverload($registro->ID_TEMPO,$registro->ANO,$registro->MES);
		return $dadosTempo;
		
	}

	public function consultarPorIntervalo($intervalo){
		$sql = "SELECT * FROM tempo WHERE ano = '".$intervalo."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosTempo = new Tempo();
		$dadosTempo->__constructOverload($registro->ID_TEMPO,$registro->ANO,$registro->MES);
		return $dadosTempo;
	}
	public function inserirTempo(Tempo $tempo){
		$sql = "INSERT INTO tempo (ano) VALUES ('{$tempo->__getIntervalo()}')";
		$this->conexao->banco->Execute($sql);
	}
}
