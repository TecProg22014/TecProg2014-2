<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

require_once $SERVER_ADRESS."/libs/adodb/adodb.inc.php";
require_once $SERVER_ADRESS."/exceptions/EConexaoFalha.php";

/**
 * Class persistence of Conexao Teste
 */
class ConexaoTeste{

	/**
	 * Variables to specify the conection with the base and the tests
	 * @var $base;
	 * @var $baseType;
	 * @var $server;
	 * @var $user;
	 * @var $key;
	 * @var $db;
	 */
	public $base; //Variable for the base of the database conection
	private $baseType; //Variable to specify the type of base
	private $server; //Variable for the server of the database conection
	private $user; //Variable for the user of the database conection
	private $key; //Key for the user acess for database conection
	private $db; //Table of data

	/**
	 * Full constructor to the object ConexaoTeste
	 * @param $base;
	 * @param $baseType;
	 * @param $server;
	 * @param $user;
	 * @param $key;
	 * @param $db;
	 */
	public function __construct( ){
		$this->baseType      = "mysql";
		$this->server        = "localhost";
		$this->user        	 = "root";
		$this->key           = "";
		$this->db            = "radar_criminal_teste";
		$this->base 		 = NewADOConnection($this->baseType);
		$this->base->dialect = 3;
		$this->base->debug 	 = false;
		$this->base->Connect($this->server,$this->user,$this->key,$this->db);
	}
}
