<?php


include_once "/controller/RegiaoAdministrativaController.php";
class RegiaoAdministrativaView {
	/**
	 * Variable to instance a new object of administrative region controller
	 * @var raCO
	 */
	private $raCO;
	
	/**
	 * Constructor to instance a new object of administrative region controller
	 */
	public function __construct() {
		$this->raCO = new RegiaoAdministrativaController ();
	}
	
	/**
	 * unction to get alphabetically all the administrative regions
	 * @return string $retornoRA
	 */
	public function listarTodasAlfabeticamente() {
		$nomeRA = $this->raCO->_listarTodasAlfabeticamente ();
		for($i = 0, $retornoRA = ""; $i < count ( $nomeRA ); $i ++) {
			$retornoRA = $retornoRA . "<li><a class=\"submenu\" href=\"?pag=u\"><i class=\"icon-map-marker\"></i><span class=\"hidden-tablet\">" . $nomeRA [$i] . "</span></a></li>";
		}
		return $retornoRA;
	}
	
	/**
	 * Function to get the count of administrative region regists exist
	 * @return int $countRA
	 */
	public function contarRegistrosRA() {
		return $this->raCO->_contarRegistrosRA ();
	}
}