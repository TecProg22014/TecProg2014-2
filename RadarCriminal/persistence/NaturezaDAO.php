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
	 * @var Conexao connection
	 */
	private $connection; //Variable to conect with the database
	
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
	 * Function to list all nature of crimes
	 * @return Array $anatureReturn
	 */
	public function listAll( ){
		$sql = "SELECT * FROM nature";
		$result = $this->connection->banco->Execute( $sql ); //Show if the result of a function was successfu
		while( $register = $result->FetchNextObject( ) )
		{
			$natureData = new Natureza( ); //Instance of Nature for use the datas
			$natureData->__constructOverload( $register->ID_NATUREZA,$register->NATUREZA,$register->CATEGORIA_ID_CATEGORIA );
			$natureReturn[] = $natureData; //Array for return all the natures
		}
		return $natureReturn;
	}
	
	/**
	 * Function to alphabetically list all nature of crimes
	 * @return Array $anatureReturn
	 */
	public function alphabeticallyListAll( ){
		$sql = "SELECT * FROM nature ORDER BY nature ASC ";
		$result = $this->connection->banco->Execute( $sql );
		/**
	 	* While to alphabetically order of nature
	 	*
	 	*/
		while( $register = $result->FetchNextObject( ) )
		{
			$natureData = new Natureza( );
			$natureData->__constructOverload( $register->ID_NATUREZA,$register->NATUREZA,$register->CATEGORIA_ID_CATEGORIA );
			$natureReturn[] = $natureData;
		}
		return $natureReturn;
	}
	
	/**
	 * Function to select one nature by the id
	 * @param int $id
	 * @return String $natureData
	 */
	public function idFind( $natureId ){
		$sql = "SELECT * FROM nature WHERE id_nature = '".$natureId."'";
		$result = $this->connection->banco->Execute( $sql );
		$register = $result->FetchNextObject( ); //Auxiliar variable to register a nature
		$natureData = new Natureza( );
		$natureData->__constructOverload( $register->ID_NATUREZA,$register->NATUREZA,$register->CATEGORIA_ID_CATEGORIA );
		return $natureData;

	}
	
	/**
	 * Function to select one nature by the name
	 * @param String $name
	 * @return String $natureData
	 */
	public function nameFind( $nature ){

		$sql = "SELECT * FROM nature WHERE nature = '".$nature."'";
		$result = $this->connection->banco->Execute( $sql );
		$register = $result->FetchNextObject( );
		$natureData = new Natureza( );
		$natureData->__constructOverload( $register->ID_NATUREZA,$register->NATUREZA,$register->CATEGORIA_ID_CATEGORIA );
		return $natureData;
	}
	
	/**
	 * Function to insert one nature in the database
	 * @param $nature
	 */
	public function addNature(Natureza $nature ){
		$sql = "INSERT INTO nature (categoria_id_categoria,nature ) values ('{$nature->__getIdCategoria( )}','{$nature->__getNatureza( )}' )";
		$this->connection->banco->Execute( $sql );
	}
	
	/**
	 * Function to select one nature by the category's id
	 * @param int $id
	 * @return String $natureDatas
	 */
	public function idCategoryFind( $id ){
		$sql = "SELECT * FROM nature WHERE categoria_id_categoria= '".$id."'";
		$result = $this->connection->banco->Execute( $sql );
		while( $register = $result->FetchNextObject( ) ){
			$natureData = new Natureza( );
			$natureData->__constructOverload( $register->ID_NATUREZA,$register->NATUREZA,$register->CATEGORIA_ID_CATEGORIA );
			$natureReturn[] = $natureData;
		}
		return $natureReturn;
	}
}