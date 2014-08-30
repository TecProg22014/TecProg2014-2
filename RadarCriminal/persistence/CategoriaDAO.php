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
	/**
	 * Variable to instance a object to conect with the database
	 * @var conexao
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
	 * Function to list all categories of crimes
	 * @return Array $aretornaCategoria
	 */
	public function listarTodas(){
		$sql = "SELECT * FROM categoria";
		$resultado = $this->conexao->banco->Execute($sql);
		while($registro = $resultado->FetchNextObject()){
			$dadosCategoria = new Categoria();
			$dadosCategoria->__constructOverload($registro->ID_CATEGORIA,$registro->NOME_CATEGORIA);	
			$retornaCategorias[] = $dadosCategoria;
		}
		return $retornaCategorias;
	} 
	/**
	 * Function to alphabetically list all categories of crimes
	 * @return Array $retornaCategoria
	 */
	public function listarTodasAlfabicamente(){
		$sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
		$resultado = $this->conexao->banco->Execute($sql);
		//if($resultado->RecordCount()== 0){
		//	throw new ECategoriaListarTodasAlfabeticamenteVazio();
		//}
		/**
	 	* While to alphabetically order of categories
	 	* 
	 	*/
		while($registro = $resultado->FetchNextObject())
		{
			$dadosCategoria = new Categoria();
			$dadosCategoria->__constructOverload($registro->ID_CATEGORIA,$registro->NOME_CATEGORIA);
			$retornaCategorias[] = $dadosCategoria;
		}
		return $retornaCategorias;
	}
	/**
	 * Function to select one category by the id
	 * @param int $id        	
	 * @return String $dadosCategoria
	 */
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
	/**
	 * Function to select one category by the name
	 * @param String $nomeCategoria        	
	 * @return String $dadosCategoria
	 */
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
	/**
	 * Function to insert one category in the database
	 * @param Categoria $categoria        	
	 * @return boolean $resultado
	 */
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
	
	/**
	 * Function to count the number of crimes in person
	 * @return int $registro
	 */
	public function somaGeralCrimeContraPessoa(){
		$sql = "SELECT SUM( c.quantidade ) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 1 AND 3";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	/**
	 * Function to count the number of police actions
	 * @return int $registro
	 */
	public function somaTotalAcaoPolicial(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 26 AND 29";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	/**
	 * Function to count the number of sexual crimes
	 * @return int $registro
	 */
	public function somaTotalDignidadeSexual(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 24 AND 25";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	/**
	 * Function to count the number of robbery crimes
	 * @return int $registro
	 */
	public function somaTotalRoubo(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 6 AND 18";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	/**
	 * Function to count the number of theft crimes
	 * @return int $registro
	 */
	public function somaTotalFurtos(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 19 AND 23";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	/**
	 * Function to count the number of crimes in patrimony
	 * @return int $registro
	 */
	public function somaTotalContraPatrimonio(){
		$sql = "SELECT SUM(total) as total FROM totalcrimecontrapatrimonio";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
	/**
	 * Function to list all the categories 
	 * @return String $totalCategoria
	 */
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
	/**
	 * Function to count the number of crimes in the traffic
	 * @return int $registro
	 */
	public function somaTotalTransito(){
		$sql = "SELECT SUM(c.quantidade) AS total FROM crime c, natureza n WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza BETWEEN 29 AND 30";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}

	/**
	 * Function to count the number of crimes records
	 * @return int $registro
	 */
	public function contarRegistros(){
		$sql = "SELECT COUNT(id_categoria)AS total FROM categoria";
		$resultado = $this->conexao->banco->Execute($sql);
		$registro = $resultado->FetchNextObject();
		return $registro->TOTAL;
	}
}