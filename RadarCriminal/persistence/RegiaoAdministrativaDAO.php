<?php

include_once "/model/RegiaoAdministrativa.php";
include_once "/persistence/Conexao.php";
include_once "/persistence/ConexaoTeste.php";

/**
 * Class persistence of Regiao Administrativa
 */
class RegiaoAdministrativaDAO {
	
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
	 * Function to list all administrative regions of the crimes
	 * @return Array $aretornaRAs
	 */
	public function listarTodas( ){
		$sql = "SELECT * FROM regiao_administrativa";
		$resultado = $this->conexao->banco->Execute( $sql );
		/**
	 	* While to alphabetically order of administrative regions
	 	*
	 	*/
		while( $registro = $resultado->FetchNextObject( ) )
		{
			$dadosRA = new RegiaoAdministrativa( );
			$dadosRA->__constructOverload( $registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME );
			$retornaRAs[] = $dadosRA;
		}
		return $retornaRAs;
	}
	
	/**
	 * Function to alphabetically list all administrative regions of the crimes
	 * @return Array $aretornaRAs
	 */
	public function listarTodasAlfabeticamente( ){
		$sql = "SELECT * FROM regiao_administrativa ORDER BY nome ASC";
		$resultado = $this->conexao->banco->Execute( $sql );
		while( $registro = $resultado->FetchNextObject( ) )
		{
			$dadosRA = new RegiaoAdministrativa( );
			$dadosRA->__constructOverload( $registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME );
			$retornaRAs[] = $dadosRA;
		}
		return $retornaRAs;
	}
	
	/**
	 * Function to select one administrative region by the id
	 * @param int $id
	 * @return String $dadosRA
	 */
	public function consultarPorId( $id ){
		$sql = "SELECT * FROM regiao_administrativa WHERE id_regiao_administrativa ='".$id."'";
		$resultado = $this->conexao->banco->Execute( $sql );
		$registro = $resultado->FetchNextObject( );
		$dadosRA = new RegiaoAdministrativa( );
		$dadosRA->__constructOverload( $registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME );
		return $dadosRA;

	}
	
	/**
	 * Function to select one administrative region by the name
	 * @param String $name
	 * @return String $dadosRA
	 */
	public function consultarPorNome( $nome ){
		$sql = "SELECT * FROM regiao_administrativa WHERE nome = '".$nome."'";
		$resultado = $this->conexao->banco->Execute( $sql );
		$registro = $resultado->FetchNextObject( );
		$dadosRA = new RegiaoAdministrativa( );
		$dadosRA->__constructOverload( $registro->ID_REGIAO_ADMINISTRATIVA,$registro->NOME );
		return $dadosRA;
	}
	
	/**
	 * Function to count the number of administrative regions
	 * @return int $registro
	 */
	public function contarRegistrosRA( ){
		$sql = "SELECT COUNT(id_regiao_administrativa )AS total FROM regiao_administrativa";
		$resultado = $this->conexao->banco->Execute( $sql );
		$registro = $resultado->FetchNextObject( );
		return $registro->TOTAL;
	}
	
	/**
	 * Function to insert one administrative region in the database
	 * @param Categoria $categoria
	 * @return boolean $resultado
	 */
	public function inserirRA(RegiaoAdministrativa $RA ){
		$sql = "INSERT INTO regiao_administrativa (nome ) values ('{$RA->__getNomeRegiao( )}' )";
		$resultado = $this->conexao->banco->Execute( $sql );
		return $resultado;
	}
}