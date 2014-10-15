<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/model/Tempo.php";
include_once $SERVER_ADRESS."/persistence/Conexao.php";
include_once $SERVER_ADRESS."/persistence/ConexaoTeste.php";

/**
 * Class persistence of Tempo
 */
class TempoDAO{
	
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
	 * Function to list all the times of the crimes
	 * @return $timeReturn
	 */
	public function listAll( ){
		$sql = "SELECT * FROM tempo";
		$result = $this->connection->base->Execute( $sql ); //Show if the result of a function was successful
		while( $register = $result->FetchNextObject( ) )
		{
			$timeData = new Tempo( ); //Instance of Time for use the datas
			$timeData->__constructOverload( $register->ID_TEMPO,$register->ANO,
											$register->MES );
			$timeReturn[] = $timeData; //Array for return all the times
		}
		return $timeReturn;
	}
	
	/**
	 * Function to list all the times of the crimes in order
	 * @return $timeReturn
	 */
	public function orderListAll( ){
		$sql = "SELECT * FROM tempo ORDER BY ano ASC ";
		$result = $this->connection->base->Execute( $sql );
		while( $register = $result->FetchNextObject( ) )
		{
			$timeData = new Tempo( );
			$timeData->__constructOverload( $register->ID_TEMPO,$register->ANO,
											$register->MES );
			$timeReturn[] = $timeData;
		}
		return $timeReturn;
	}
	
	/**
	 * Function to select one time by the id
	 * @param int $timeId
	 * @return $timeData
	 */
	public function idFind( $timeId ){
		$sql = "SELECT * FROM tempo WHERE id_tempo = '".$timeId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( ); //Auxiliar variable to register a time
		$timeData = new Tempo( );
		$timeData->__constructOverload( $register->ID_TEMPO,$register->ANO,
										$register->MES );
		return $timeData;
	}

	/**
	 * Function to select one time by the interval
	 * @param int $interval
	 * @return String $timeData
	 */
	public function intervalFind( $interval ){
		$sql = "SELECT * FROM tempo WHERE ano = '".$interval."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( ); 
		$timeData = new Tempo( );
		$timeData->__constructOverload( $register->ID_TEMPO,$register->ANO,
										$register->MES );
		return $timeData;
	}
	
	/**
	 * Function to insert one time in the database
	 * @param $time
	 */
	public function addTime(Tempo $time ){
		$sql = "INSERT INTO tempo (ano ) VALUES ('{$time->__getInterval( )}' )";
		$this->connection->base->Execute( $sql );
	}
}
