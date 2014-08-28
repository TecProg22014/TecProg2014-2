<?php
include_once('C:/xampp/htdocs/mds2013/model/RegiaoAdministrativa.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');

class RegiaoAdministrativaDAO {
	private $conexao;
	
	public function __construct(){
		$this->conexao = new Conexao();
	}
	public function __constructTeste(){
		$this->conexao = new ConexaoTeste();
	
	}
	public function listarTodas(){
		$sql = "SELECT * FROM regiao_administrativa";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject())
		{
			$dadosRA = new RegiaoAdministrativa();
			$dadosRA->__constructOverload($registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME);
			$retornaRAs[] = $dadosRA;
		}
		return $retornaRAs;
	}
	public function listarTodasAlfabeticamente(){
		$sql = "SELECT * FROM regiao_administrativa ORDER BY nome ASC";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject())
		{
			$dadosRA = new RegiaoAdministrativa();
			$dadosRA->__constructOverload($registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME);
			$retornaRAs[] = $dadosRA;
		}
		return $retornaRAs;
	}
	public function consultarPorId($id){
		$sql = "SELECT * FROM regiao_administrativa WHERE id_regiao_administrativa ='".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosRA = new RegiaoAdministrativa();
		$dadosRA->__constructOverload($registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME);
		return $dadosRA;
	
	}
	public function consultarPorNome($nome){
		$sql = "SELECT * FROM regiao_administrativa WHERE nome = '".$nome."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		$dadosRA = new RegiaoAdministrativa();
		$dadosRA->__constructOverload($registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME);
		return $dadosRA;
	}
	
	public function contarRegistrosRA(){
		$sql = "SELECT COUNT(id_regiao_administrativa)AS total FROM regiao_administrativa";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	public function inserirRA(RegiaoAdministrativa $RA){
		$sql = "INSERT INTO regiao_administrativa (nome) values ('{$RA->__getNomeRegiao()}')";
		$resultado = $this->conexao->banco->Execute($sql);
		return $resultado;
	}
}