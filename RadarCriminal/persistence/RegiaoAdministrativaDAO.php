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
	 * @var Conexao connection
	 */
	private $connection;

	/**
	 * Constructor to instance the object that will percist in the database
	 */
	public function __construct( ){
		$this->connection = new Conexao( );
	}
	
	/**
	 * Specific constroctor to unit test
	 */
	public function __constructTeste( ){
		$this->connection = new ConexaoTeste( );

	}
	
	/**
	 * Function to list all administrative regions of the crimes
	 * @return Array $araReturn
	 */
	public function listAll( ){
		$sql = "SELECT * FROM regiao_administrativa";
		$result = $this->connection->banco->Execute( $sql );
		/**
	 	* While to alphabetically order of administrative regions
	 	*
	 	*/
		while( $register = $result->FetchNextObject( ) )
		{
			$raData = new RegiaoAdministrativa( );
			$raData->__constructOverload( $register->ID_REGIAO_ADMINISTRATIVA,$register->NOME );
			$raReturn[] = $raData;
		}
		return $raReturn;
	}
	
	/**
	 * Function to alphabetically list all administrative regions of the crimes
	 * @return Array $araReturn
	 */
	public function alphabeticallyListAll( ){
		$sql = "SELECT * FROM regiao_administrativa ORDER BY name ASC";
		$result = $this->connection->banco->Execute( $sql );
		while( $register = $result->FetchNextObject( ) )
		{
			$raData = new RegiaoAdministrativa( );
			$raData->__constructOverload( $register->ID_REGIAO_ADMINISTRATIVA,$register->NOME );
			$raReturn[] = $raData;
		}
		return $raReturn;
	}
	
	/**
	 * Function to select one administrative region by the id
	 * @param int $raId
	 * @return String $raData
	 */
	public function idFind( $raId ){
		$sql = "SELECT * FROM regiao_administrativa WHERE id_regiao_administrativa ='".$raId."'";
		$result = $this->connection->banco->Execute( $sql );
		$register = $result->FetchNextObject( );
		$raData = new RegiaoAdministrativa( );
		$raData->__constructOverload( $register->ID_REGIAO_ADMINISTRATIVA,$register->NOME );
		return $raData;

	}
	
	/**
	 * Function to select one administrative region by the name
	 * @param String $name
	 * @return String $raData
	 */
	public function nameFind( $raName ){
		$sql = "SELECT * FROM regiao_administrativa WHERE name = '".$raName."'";
		$result = $this->connection->banco->Execute( $sql );
		$register = $result->FetchNextObject( );
		$raData = new RegiaoAdministrativa( );
		$raData->__constructOverload( $register->ID_REGIAO_ADMINISTRATIVA,$register->NOME );
		return $raData;
	}
	
	/**
	 * Function to count the number of administrative regions
	 * @return int $register
	 */
	public function countRegisters( ){
		$sql = "SELECT COUNT(id_regiao_administrativa )AS total FROM regiao_administrativa";
		$result = $this->connection->banco->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to insert one administrative region in the database
	 * @param Categoria $categoria
	 * @return boolean $result
	 */
	public function addRA(RegiaoAdministrativa $RA ){
		$sql = "INSERT INTO regiao_administrativa (raName ) values ('{$RA->__getNomeRegiao( )}' )";
		$result = $this->connection->banco->Execute( $sql );
		return $result;
	}
}