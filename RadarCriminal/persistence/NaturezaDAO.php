<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/model/Natureza.php";
include_once $SERVER_ADRESS."/model/Categoria.php";
include_once $SERVER_ADRESS."/persistence/Conexao.php";
include_once $SERVER_ADRESS."/persistence/ConexaoTeste.php";
include_once $SERVER_ADRESS."/persistence/CategoriaDAO.php";
include_once $SERVER_ADRESS."/exceptions/ENaturezaListarTodosVazio.php";
include_once $SERVER_ADRESS."/exceptions/ENaturezaListarTodasAlfabeticamenteVazio.php";
include_once $SERVER_ADRESS."/exceptions/ENaturezaConsultarPorIdVazio.php";
include_once $SERVER_ADRESS."/exceptions/ENaturezaConsultarPorNomeVazio.php";
include_once $SERVER_ADRESS."/exceptions/EConexaoFalha.php";

/**
 * Class persistence of Natureza
 */
class NaturezaDAO{
	
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
	 * Specific constructor to unit test
	 */
	public function __constructTeste( ){
		$this->connection = new ConexaoTeste( );

	}
	
	/**
	 * Function to list all nature of crimes
	 * @return Array $anatureReturn
	 */
	public function listAll( ){
		$sql = "SELECT * FROM natureza";
		$result = $this->connection->base->Execute( $sql ); //Show if the result of a function was successfu
		while( $register = $result->FetchNextObject( ) )
		{
			$natureData = new Natureza( ); //Instance of Nature for use the datas
			$natureData->__constructOverload( $register->ID_NATUREZA,
											  $register->NATUREZA,
											  $register->CATEGORIA_ID_CATEGORIA );
			$natureReturn[] = $natureData; //Array for return all the natures
		}
		return $natureReturn;
	}
	
	/**
	 * Function to alphabetically list all nature of crimes
	 * @return Array $anatureReturn
	 */
	public function alphabeticallyListAll( ){
		$sql = "SELECT * FROM natureza ORDER BY natureza ASC ";
		$result = $this->connection->base->Execute( $sql );
		/**
	 	* While to alphabetically order of nature
	 	*
	 	*/
		while( $register = $result->FetchNextObject( ) )
		{
			$natureData = new Natureza( );
			$natureData->__constructOverload( $register->ID_NATUREZA,
											  $register->NATUREZA,
											  $register->CATEGORIA_ID_CATEGORIA );
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
		$sql = "SELECT * FROM natureza WHERE id_natureza = '".$natureId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( ); //Auxiliar variable to register a nature
		$natureData = new Natureza( );
		$natureData->__constructOverload( $register->ID_NATUREZA,
										  $register->NATUREZA,
										  $register->CATEGORIA_ID_CATEGORIA );
		return $natureData;

	}
	
	/**
	 * Function to select one nature by the name
	 * @param String $name
	 * @return String $natureData
	 */
	public function nameFind( $nature ){
		$sql = "SELECT * FROM natureza WHERE natureza = '".$nature."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$natureData = new Natureza( );
		$natureData->__constructOverload( $register->ID_NATUREZA,
										  $register->NATUREZA,
										  $register->CATEGORIA_ID_CATEGORIA );
		return $natureData;
	}
	
	/**
	 * Function to insert one nature in the database
	 * @param $nature
	 */
	public function addNature(Natureza $nature ){
		$sql = "INSERT INTO natureza (categoria_id_categoria,natureza ) values (
									'{$nature->__getCategoryId( )}',
									'{$nature->__getNature( )}' )";
		$this->connection->base->Execute( $sql );
	}
	
	/**
	 * Function to select one nature by the category's id
	 * @param int $id
	 * @return String $natureDatas
	 */
	public function idCategoryFind( $id ){
		$sql = "SELECT * FROM natureza WHERE categoria_id_categoria= '".$id."'";
		$result = $this->connection->base->Execute( $sql );
		while( $register = $result->FetchNextObject( ) ){
			$natureData = new Natureza( );
			$natureData->__constructOverload( $register->ID_NATUREZA,
											  $register->NATUREZA,
											  $register->CATEGORIA_ID_CATEGORIA );
			$natureReturn[] = $natureData;
		}
		return $natureReturn;
	}
}