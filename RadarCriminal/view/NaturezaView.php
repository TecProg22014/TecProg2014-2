<?php
include_once "/controller/NaturezaController.php";
include_once "/view/CategoriaView.php";
include_once "/view/CrimeView.php";

class NaturezaView {
	
	/**
	 * Variables to instance new objects of nature and crime controllers
	 * @var natureController
	 * @var crimeController
	 */
	private $natureController;
	private $crimeController;
	
	/** 
	 * Constructor to instance nature and crime controllers
	 */
	public function __construct() {
		$this->natureController = new NaturezaController ();
		$this->crimeController = new CrimeController ();
	}
	
	/**
	 * Function to get the alphabetical list of natures
	 * @return string $typesReturn
	 */
	public function getAllAlphabeticallyOrderedNatures() {
		$allNatures = $this->natureController->_getNaturesAlphabetically ();
		for($i = 0, $typesReturn = ""; $i < count ( $allNatures ); $i ++) {
			$crimeData = $this->crimeController->_sumCrimesByNature ( $allNatures [$i]->__getNature () );
			$typesReturn = $typesReturn . "<h3>" . $allNatures [$i]->__getNature () . "</h3>
				<div class=\"progress\" title=\"" . number_format ( $crimeData, 0, ',', '.' ) . "\">
				<div class=\"bar\" style=\"width: " . (100 * $crimeData / 450000) . "%;\"></div>
				</div>";
		}
		
		return $typesReturn;
	}
	
	/**
	 * Function to get one nature searching by one name
	 * @return String $nature   *refactor
	 */
	public function getNatureByName($nature) {
		$nature = $this->natureController->_getNatureByName ( $nature );
		return $nature->__getNatureza ();
	}
	
	/**
	 * Function to get one nature searching by one id
	 * @param int $id
	 * @return String $nature  *refactor
	 */
	public function getNatureById($id) {
		$nature = $this->natureController->_getNatureById ( $id );
		return $nature->__getNature ();
	}
	
	/**
	 * Function to get one nature searching by one category id
	 * @param int $id
	 * @return String $nature  *refactor
	 */
	public function getNaturesByIdCategory($id) {
		return $this->natureController->_getNaturesByIdCategory ( $id );
	}
	
	/**
	 * Function to get data of one nature organized in labels to generate a graph 
	 * @param String $nature
	 * @return String $formatedReturn
	 */
	public function _getNatureData($nature) {
		$natureData = $this->natureController->_listFormatedNatures ( $nature );
		$formatedCrimeData = "";
		$formatedReturn = "";
		for($i = 0; $i < count ( $natureData ['title'] ); $i ++) {
			/**
			 * Loop that defines what will be represented in the graph
			 * the string ("\"bar\"") defines the graphs full bar and
			 * the string ("\"bar simple\"") defines the graphs dotted bar
			 * The conditional 'if($i%2==0)' grants that the dotted 
			 * and full bars will be intercalated.
			 * Returns the concatenated strings array
			 */
			if ($i % 2 == 0) {
				$varbar = "\"bar\"";
			} else {
				$varbar = "\"bar simple\"";
			}
			$formatedCrimeData [$i] = "
				<div class=" . $varbar . " title=\"" . $natureData ['title'] [$i] . " Ocorrencias\">
					<div class=\"title\">" . $natureData ['tempo'] [$i] . "</div>
					<div class=\"value\">" . $natureData ['crime'] [$i] . "</div>
				</div>";
			$formatedReturn .= $formatedCrimeData [$i];
		}
		return $formatedReturn;
	}
	
	/**
	 * Function to generate a lateral bar 
	 * @param String $categoryId
	 * @return String $auxBarra
	 */
	public function generateSideBar($categoryId) {
		$categoryView = new CategoriaView ();
		$crimeView = new CrimeView ();
		$categoryArray = $categoryView->listAphabeticallyAllCategories ();
		$categoryAux = $categoryArray [$categoryId];
		$natureArray = $this->getNaturesByIdCategory ( $categoryAux->__getIdCategoria () );
		for($i = 0; $i < count ( $natureArray ); $i ++) {
			$currentNature = $natureArray [$i];
			$auxBar [] = "
				<div class=\"row-fluid\">
		
				<div class=\"box span12\">
							<div class=\"box-header\">
								<h2><a href=\"#\" class=\"btn-minimize\"><i class=\"icon-tasks\"></i>" . $currentNature->__getNatureza () . "</a></h2>
								<div class=\"box-icon\">
									<a href=\"#\" class=\"btn-close\"><i class=\"icon-remove\"></i></a>
								</div>
							</div>
							<div class=\"box-content\" style=\"display: none;\">
								<h3>Por Ano</h3></br>
									<div class=\"chart-natureza\">
									
									 " . $this->getNatureData ( $currentNature->__getNatureza () ) . " </div>
									
							</div>
				</div>
		
				</div>";
		}
		return $auxBar;
	}
}