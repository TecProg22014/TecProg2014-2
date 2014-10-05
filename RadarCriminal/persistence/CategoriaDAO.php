<?php

include_once "/model/Categoria.php";
include_once "/persistence/Conexao.php";
include_once "/persistence/ConexaoTeste.php";
include_once "/exceptions/ECategoriaListarTodasVazio.php";
include_once "/exceptions/ECategoriaListarTodasAlfabeticamenteVazio.php";
include_once "/exceptions/ECategoriaListarConsultaPorIdVazio.php";
include_once "/exceptions/ECategoriaConsultarPorNomeVazio.php";
include_once "/exceptions/EConexaoFalha.php";

/**
 * Class persistence of Categoria
 */
class CategoriaDAO{
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
	 * Function to list all categories of crimes
	 * @return Array $retornaCategoria
	 */
	public function listAll( ){
		$sql = "SELECT * FROM categoria";
		$result = $this->connection->base->Execute( $sql ); //Show if the result of a function was successful
		while( $register = $result->FetchNextObject( ) ){
			$categoryData = new Categoria( ); //Instance of Category for use the datas
			$categoryData->__constructOverload( $register->ID_CATEGORIA,
												$register->NOME_CATEGORIA );
			$categoryReturn[] = $categoryData; //Array for return all the categories
		}
		return $categoryReturn;
	}

	/**
	 * Function to alphabetically list all categories of crimes
	 * @return Array $retornaCategoria
	 */
	public function alphabeticallyListAll( ){
		$sql = "SELECT * FROM category ORDER BY nome_category ASC";
		$result = $this->connection->base->Execute( $sql );
		
		/**
	 	* While to alphabetically order of categories
	 	*
	 	*/
		
		while( $register = $result->FetchNextObject( ) )
		{
			$categoryData = new Categoria( );
			$categoryData->__constructOverload( $register->ID_CATEGORIA,
												$register->NOME_CATEGORIA );
			$categoryReturn[] = $categoryData;
		}
		return $categoryReturn;
	}

	/**
	 * Function to select one category by the id
	 * @param int $id
	 * @return String $categoryData
	 */
	public function idFind( $categoryId ){
		$sql = "SELECT * FROM category WHERE id_category = '".$id."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$categoryData = new Categoria( );
		$categoryData->__constructOverload( $register->ID_CATEGORIA,
											$register->NOME_CATEGORIA );
		return $categoryData;
	}

	/**
	 * Function to select one category by the name
	 * @param String $categoryName
	 * @return String $categoryData
	 */ 
	public function nameFind( $categoryName ){
		$sql = "SELECT * FROM category WHERE nome_category = '".$categoryName."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$categoryData = new Categoria( );
		$categoryData->__constructOverload( $register->ID_CATEGORIA,
											$register->NOME_CATEGORIA );
		return $categoryData;
	}

	/**
	 * Function to insert one category in the database
	 * @param Categoria $category
	 * @return boolean $result
	 */
	public function addCategory(Categoria $category ){
		$sql = "INSERT INTO category (nome_category ) values 
			   ('{$category->__getCategoryName( )}' )";
		$result = $this->connection->base->Execute( $sql );
		return $result;
	}

	/**
	 * Function to count the number of crimes in person
	 * @return int $register
	 */
	public function totalCrimeInPerson( ){
		$sql = "SELECT SUM( c.quantidade  ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza BETWEEN 1 AND 3";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of police actions
	 * @return int $register
	 */
	public function totalPoliceAction( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza 
				BETWEEN 26 AND 29";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of sexual crimes
	 * @return int $register
	 */
	public function totalSexual( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza 
				BETWEEN 24 AND 25";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of robbery crimes
	 * @return int $register
	 */
	public function totalTheft( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza 
				BETWEEN 6 AND 18";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of theft crimes
	 * @return int $register
	 */
	public function totalStealing( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza 
				BETWEEN 19 AND 23";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of crimes in patrimony
	 * @return int $register
	 */
	public function totalPatrimony( ){
		$sql = "SELECT SUM(total ) as total FROM totalcrimecontrapatrimonio";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to list all the categories
	 * @return String $categoryTotal
	 */
	public function totalCategories( ){
		$sql="SELECT * FROM totalgeralcategoria";
		$result = $this->connection->base->Execute( $sql );
		$i = 0;
		while( $register = $result->FetchNextObject( ) ){
			$categoryTotal["nome"][$i] = $register->NOME_CATEGORIA; //Amount of categories
			$categoryTotal["quantidade"][$i] = $register->TOTAL;
			$i++;
		}
		return $categoryTotal;
	}

	/**
	 * Function to count the number of crimes in the traffic
	 * @return int $register
	 */
	public function totalTraffic( ){
		$sql = "SELECT SUM(c.quantidade ) AS total FROM crime c, natureza n 
				WHERE c.natureza_id_natureza = n.id_natureza AND n.id_natureza 
				BETWEEN 29 AND 30";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of crimes records
	 * @return int $register
	 */
	public function recordsCount( ){
		$sql = "SELECT COUNT(id_categoria )AS total FROM categoria";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
}