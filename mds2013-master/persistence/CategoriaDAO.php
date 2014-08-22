<?php
include_once('C:/xampp/htdocs/mds2013/model/Categoria.php');
include_once('C:/xampp/htdocs/mds2013/persistence/Conexao.php');
include_once('C:/xampp/htdocs/mds2013/persistence/ConexaoTeste.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaListarTodasVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaListarTodasAlfabeticamenteVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaListarConsultaPorIdVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/ECategoriaConsultarPorNomeVazio.php');
include_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');

class CategoriaDAO{
	private $conexao;
	public function __construct(){
		$this->conexao = new Conexao();
	} 
	public function __constructTeste(){
		$this->conexao = new ConexaoTeste();
	
	}
	public function listarTodas(){
		$sql = "SELECT * FROM categoria";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject())
		{
			$dadosCategoria = new Categoria();
			$dadosCategoria->__constructOverload($registro->ID_CATEGORIA,$registro->NOME_CATEGORIA);	
			$retornaCategorias[] = $dadosCategoria;
		}
		return $retornaCategorias;
	} 
	public function listarTodasAlfabicamente(){
		$sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
		$resultado = $this->conexao->banco->Execute($sql);
		//if($resultado->RecordCount()== 0){
		//	throw new ECategoriaListarTodasAlfabeticamenteVazio();
		//}
		while($registro = $resultado->FetchNextObject())
		{
			$dadosCategoria = new Categoria();
			$dadosCategoria->__constructOverload($registro->ID_CATEGORIA,$registro->NOME_CATEGORIA);
			$retornaCategorias[] = $dadosCategoria;
		}
		return $retornaCategorias;
	}
	public function consultarPorId($id){
		$sql = "SELECT * FROM categoria WHERE id_categoria = '".$id."'";
		$resultado = $this->conexao->banco->Execute($sql);
		//if($resultado->RecordCount()== 0){
			//throw new ECategoriaListarConsultaPorIdVazio();
		//}
		$registro = $resultado->FetchNextObject();
		$dadosCategoria = new Categoria();
		$dadosCategoria->__constructOverload($registro->ID_CATEGORIA,$registro->NOME_CATEGORIA);
		return $dadosCategoria;
		
	}
	public function consultarPorNome($nomeCategoria){
		$sql = "SELECT * FROM categoria WHERE nome_categoria = '".$nomeCategoria."'";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		//if($resultado->RecordCount()== 0){
			//throw new ECategoriaConsultarPorNomeVazio();
		//}
		$dadosCategoria = new Categoria();
		$dadosCategoria->__constructOverload($registro->ID_CATEGORIA,$registro->NOME_CATEGORIA);
		return $dadosCategoria;
	}
	public function inserirCategoria(Categoria $categoria){
		$sql = "INSERT INTO categoria (nome_categoria) values ('{$categoria->__getNomeCategoria()}')";
		$resultado = $this->conexao->banco->Execute($sql);
		return $resultado;
		//if(!$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db)){
			//	throw new EConexaoFalha();	
			//}
	}

	//Somatórios de Categorias
	/**
	 * @author Sergio Silva
	 * @author Eliseu Egewarth
	 * @author Eduardo Augusto
	 * @copyright RadarCriminal 2013
	 **/

	public function somaGeralCrimeContraPessoa(){
		$sql = "SELECT SUM( c.quantidade ) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 1 AND 3";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	public function somaTotalAcaoPolicial(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 26 AND 29";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	public function somaTotalDignidadeSexual(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 24 AND 25";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	public function somaTotalRoubo(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 6 AND 18";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	public function somaTotalFurtos(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 19 AND 23";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	public function somaTotalContraPatrimonio(){
		$sql = "SELECT SUM(total) as total FROM totalcrimecontrapatrimonio";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	public function listarTotalDeCategoria(){
		$sql="SELECT * FROM totalgeralcategoria";
		$resultado = $this->conexao->banco->Execute($sql);
		$i = 0;
		while($registro = $resultado->FetchNextObject()){
			$totalCategoria["nome"][$i] = $registro->NOME_CATEGORIA;
			$totalCategoria["quantidade"][$i] = $registro->TOTAL;
			$i++;
		}
		return $totalCategoria;
	}

	public function somaTotalTransito(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 29 AND 30";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}


	public function contarRegistros(){
		$sql = "SELECT COUNT(id_categoria)AS total FROM categoria";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
}