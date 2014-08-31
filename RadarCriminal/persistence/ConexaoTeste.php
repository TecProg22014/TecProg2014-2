<?php
require_once('C:/xampp/htdocs/mds2013/libs/adodb/adodb.inc.php');
require_once('C:/xampp/htdocs/mds2013/exceptions/EConexaoFalha.php');
class ConexaoTeste{

	/**
	 * Variables to specify the conection with the base and the tests
	 * @var $banco;
	 * @var $tipo_banco;
	 * @var $servidor;
	 * @var $usuario;
	 * @var $senha;
	 * @var $db;
	 */
	public $banco;
	private $tipo_banco;
	private $servidor;
	private $usuario;
	private $senha;
	private $db;

	/**
	 * Full constructor to the object ConexaoTeste
	 * @param $banco;
	 * @param $tipo_banco;
	 * @param $servidor;
	 * @param $usuario;
	 * @param $senha;
	 * @param $db;
	 */
	public function __construct(){

		$this->tipo_banco    = "mysql";
		$this->servidor      = "localhost";
		$this->usuario       = "root";
		$this->senha         = "";
		$this->db            = "radar_criminal_teste";
		$this->banco = NewADOConnection($this->tipo_banco);
		$this->banco->dialect = 3;
		$this->banco->debug = false;
		$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db);
	}
}
