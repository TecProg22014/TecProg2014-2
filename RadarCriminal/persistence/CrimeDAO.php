<?php

include_once "/model/Crime.php";
include_once "/model/Tempo.php";
include_once "/model/Natureza.php";
include_once "/persistence/Conexao.php";
include_once "/persistence/ConexaoTeste.php";
include_once "/persistence/NaturezaDAO.php";
include_once "/persistence/TempoDAO.php";

/**
 * Class persistence of Crime
 */
class CrimeDAO{
	
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
	 * Function to list all crimes
	 * @return Array $crimeReturn
	 */
	public function listAll( ){
		$sql = "SELECT * FROM crime";
		$result = $this->connection->base->Execute( $sql );
		while( $register = $result->FetchNextObject( ) )
		{
			$crimeData = new Crime( );
			$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,$register->NATUREZA_ID_NATUREZA,$register->QUANTIDADE );
			$crimeReturn[] = $crimeData;
		}
		return $crimeReturn;
	}
	
	/**
	 * Function to select one crime by the id
	 * @param int $crimeId
	 * @return String $crimeData
	 */
	public function idFind( $crimeId ){
		$sql = "SELECT * FROM crime WHERE id_crime = '".$crimeIid."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$crimeData = new Crime( );
		$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,$register->NATUREZA_ID_NATUREZA,$register->QUANTIDADE );
		return $crimeData;
	}
	
	/**
	 * Function to select one crime by the nature id
	 * @param int $natureId
	 * @return String $crimeData
	 */
	public function natureFind( $natureId ){
		$sql = "SELECT * FROM crime WHERE nature_id_nature = '".$natureId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$crimeData = new Crime( );
		$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,$register->NATUREZA_ID_NATUREZA,$register->QUANTIDADE );
		return $crimeData;
	}
	
	/**
	 * Function to select one crime by the time id
	 * @param int $id
	 * @return String $crimeData
	 */
	public function timeFind( $timeId ){
		$sql = "SELECT * FROM crime WHERE tempo_id_tempo = '".$timeId."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		$crimeData = new Crime( );
		$crimeData->__constructOverload( $register->ID_CRIME,$register->TEMPO_ID_TEMPO,$register->NATUREZA_ID_NATUREZA,$register->QUANTIDADE );
		return $crimeData;
	}
	
	/**
	 * Function to count the number of crimes in a year
	 * @return int $register
	 */
	public function totalYearCrime( $year ){
		$sql = "SELECT SUM(c.amount ) as total FROM crime c, tempo t WHERE t.year = '".$year."' AND c.tempo_id_tempo = t.id_tempo AND c.id_crime BETWEEN 1 AND 341";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to count the number of crimes in a nature
	 * @return int $register
	 */
	public function totalNatureCrime( $nature ){
		$sql = "SELECT Sum(c. ) as total FROM crime c, nature n WHERE c.nature_id_nature = n.id_nature AND n.nature = '".$nature."' AND c.id_crime BETWEEN 1 AND 341";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of homicide
	 * @return int $register
	 */
	public function totalMurder( ){
		$sql = "SELECT SUM(c.amount ) AS total FROM crime c, nature n WHERE c.nature_id_nature = n.id_nature AND n.id_nature = 1";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to count the number of crimes in a nature and a year
	 * @return int $register
	 */
	public function totalNatureInYearCrime( $nature,$year ){
		$sql = "SELECT SUM(c.amount ) AS total FROM crime c, nature n,tempo t WHERE c.nature_id_nature = n.id_nature AND c.tempo_id_tempo = t.id_tempo AND t.year = ".$year." AND n.nature = '".$nature."'";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of injuries
	 * @return int $register
	 */
	public function totalInjury( ){
		$sql = "SELECT SUM(c.amount ) AS total FROM crime c, nature n WHERE c.nature_id_nature = n.id_nature AND n.id_nature = 3";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}
	
	/**
	 * Function to count the number of attempted murder
	 * @return int $register
	 */
	public function totalAttemptedMurder( ){
		$sql = "SELECT SUM(c.amount ) AS total FROM crime c, nature n WHERE c.nature_id_nature = n.id_nature AND n.id_nature = 2";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to count the number of crimes
	 * @return int $register
	 */
	public function totalCrime( ){
		$sql = "SELECT SUM(total ) as total FROM totalgeralcrimes ";
		$result = $this->connection->base->Execute( $sql );
		$register = $result->FetchNextObject( );
		return $register->TOTAL;
	}

	/**
	 * Function to insert one crime in the database
	 * @param Crime $crime
	 */
	public function addCrime(Crime $crime ){
		$sql = "INSERT INTO crime (nature_id_nature,tempo_id_tempo,amount,regiao_administrativa_id_regiao_administrativa ) VALUES ('{$crime->__getIdNatureza( )}','{$crime->__getIdTempo( )}','{$crime->__getAmount( )}','{$crime->__getIdRegiaoAdministrativa( )}' )";
		$this->connection->base->Execute( $sql );
	}

}