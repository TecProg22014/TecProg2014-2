<?php

require_once "/libs/adodb/adodb.inc.php";
require_once "/exceptions/EConexaoFalha.php";

class Conexao{

	/**
	 * Variables to specify the conection with the base
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
	 * Full constructor to the object Conexao
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
		$this->db            = "radar_criminal";
		$this->banco 		 = NewADOConnection($this->tipo_banco);
		$this->banco->dialect = 3;
		$this->banco->debug = false;
		$this->banco->Connect($this->servidor,$this->usuario,$this->senha,$this->db);
	}
}
