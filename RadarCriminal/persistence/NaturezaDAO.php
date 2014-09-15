<?php

include_once "/model/Natureza.php";
include_once "/model/Categoria.php";
include_once "/persistence/Conexao.php";
include_once "/persistence/ConexaoTeste.php";
include_once "/persistence/CategoriaDAO.php";
include_once "/exceptions/ENaturezaListarTodosVazio.php";
include_once "/exceptions/ENaturezaListarTodasAlfabeticamenteVazio.php";
include_once "/exceptions/ENaturezaConsultarPorIdVazio.php";
include_once "/exceptions/ENaturezaConsultarPorNomeVazio.php";
include_once "/exceptions/EConexaoFalha.php";

/**
 * Class persistence of Natureza
 */
class NaturezaDAO{
	
	/**
	 * Variable to instance a object to conect with the database
	 * @var Conexao conexao
	 */
	private $conexao;
	
	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct( ){
		$this->conexao = new Conexao( );
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste( ){
		$this->conexao = new ConexaoTeste( );

	}
	
	/**
	 * Function to list all nature of crimes
	 * @return Array $aretornaNaturezas
	 */
	public function listarTodas( ){
		$sql = "SELECT * FROM natureza";
		$resultado = $this->conexao->banco->Execute( $sql );
		while( $registro = $resultado->FetchNextObject( ) )
		{
			$dadosNatureza = new Natureza( );
			$dadosNatureza->__constructOverload( $registro->ID_NATUREZA,$registro->NATUREZA,$registro->CATEGORIA_ID_CATEGORIA );
			$retornaNaturezas[] = $dadosNatureza;
		}
		return $retornaNaturezas;
	}
	
	/**
	 * Function to alphabetically list all nature of crimes
	 * @return Array $aretornaNaturezas
	 */
	public function listarTodasAlfabicamente( ){
		$sql = "SELECT * FROM natureza ORDER BY natureza ASC ";
		$resultado = $this->conexao->banco->Execute( $sql );
		/**
	 	* While to alphabetically order of nature
	 	*
	 	*/
		while( $registro = $resultado->FetchNextObject( ) )
		{
			$dadosNatureza = new Natureza( );
			$dadosNatureza->__constructOverload( $registro->ID_NATUREZA,$registro->NATUREZA,$registro->CATEGORIA_ID_CATEGORIA );
			$retornaNaturezas[] = $dadosNatureza;
		}
		return $retornaNaturezas;
	}
	
	/**
	 * Function to select one nature by the id
	 * @param int $id
	 * @return String $dadosNatureza
	 */
	public function consultarPorId( $id ){
		$sql = "SELECT * FROM natureza WHERE id_natureza = '".$id."'";
		$resultado = $this->conexao->banco->Execute( $sql );
		$registro = $resultado->FetchNextObject( );
		$dadosNatureza = new Natureza( );
		$dadosNatureza->__constructOverload( $registro->ID_NATUREZA,$registro->NATUREZA,$registro->CATEGORIA_ID_CATEGORIA );
		return $dadosNatureza;

	}
	
	/**
	 * Function to select one nature by the name
	 * @param String $name
	 * @return String $dadosNatureza
	 */
	public function consultarPorNome( $natureza ){

		$sql = "SELECT * FROM natureza WHERE natureza = '".$natureza."'";
		$resultado = $this->conexao->banco->Execute( $sql );
		$registro = $resultado->FetchNextObject( );
		$dadosNatureza = new Natureza( );
		$dadosNatureza->__constructOverload( $registro->ID_NATUREZA,$registro->NATUREZA,$registro->CATEGORIA_ID_CATEGORIA );
		return $dadosNatureza;
	}
	
	/**
	 * Function to insert one nature in the database
	 * @param $natureza
	 */
	public function inserirNatureza(Natureza $natureza ){
		$sql = "INSERT INTO natureza (categoria_id_categoria,natureza ) values ('{$natureza->__getIdCategoria( )}','{$natureza->__getNatureza( )}' )";
		$this->conexao->banco->Execute( $sql );
	}
	
	/**
	 * Function to select one nature by the category's id
	 * @param int $id
	 * @return String $dadosNaturezas
	 */
	public function consultarPorIdCategoria( $id ){
		$sql = "SELECT * FROM natureza WHERE categoria_id_categoria= '".$id."'";
		$resultado = $this->conexao->banco->Execute( $sql );
		while( $registro = $resultado->FetchNextObject( ) ){
			$dadosNatureza = new Natureza( );
			$dadosNatureza->__constructOverload( $registro->ID_NATUREZA,$registro->NATUREZA,$registro->CATEGORIA_ID_CATEGORIA );
			$retornaNaturezas[] = $dadosNatureza;
		}
		return $retornaNaturezas;
	}
}