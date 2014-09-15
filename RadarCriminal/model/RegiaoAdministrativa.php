<?php

include_once "/exceptions/ETipoErrado.php";

class RegiaoAdministrativa{
	
	/**
	 * Variables that describe one Administrative Region where one crime has occurred
	 * @var int idRegiaoAdministrativa
	 * @var String nomeRegiao
	 */
	private $idRegiaoAdministrativa;
	private $nomeRegiao;
	
	/**
	 * Null constructor to grant that no null objects will be created
	 */
	public function __construct(){
	
	}
	
	/**
	 * Full constructor of an object Administrative Region that describes where one crime has occurred
	 * @param int $idRA
	 * @param String $nomeRegiao
	 */
	public function __constructOverLoad($idRA,$nomeRegiao){
		
		$this->idRegiaoAdministrativa = $idRA;
		$this->nomeRegiao = $nomeRegiao;
	}
	
	/**
	 * Function to set the id of an administrative region where one crime has occurred
	 * @param int $idRegiaoAdministrativa
	 * @throws Exception ETipoErrado
	 */
	public function __setIdRegiaoAdministrativa($idRegiaoAdministrativa){
	
		if(!is_numeric($idRegiaoAdministrativa)){
			throw new ETipoErrado();
		}else{
		$this->idRegiaoAdministrativa = $idRegiaoAdministrativa;
		}
	}
	
	/**
	 * Function to get the id of an administrative region where one crime has occurred
	 * @return Object RegiaoAdministrativa var $idRegiaoAdministrativa
	 */
	public function __getIdRegiaoAdministrativa(){
		return $this->idRegiaoAdministrativa;
	}
	
	/**
	 * Function to set the name of an administrative region where one crime has occurred
	 * @param String $nomeRegiao
	 * @throws Exception ETipoErrado
	 */
	public function __setNomeRegiao($nomeRegiao){
		
		if(!is_string($nomeRegiao)){
			throw new ETipoErrado();
		}else{
		$this->nomeRegiao = $nomeRegiao;
		}
	}
	
	/**
	 * Function to get the name of an administrative region where one crime has occurred
	 * @return Object RegiaoAdministrativa var $nomeRegiao
	 */
	public function __getNomeRegiao(){

		//try{
		//	if(!is_string($this->nomeRegiao)){
		//		throw new ETipoErrado();
		//	}
		//}
		//catch(ETipoErrado $e){
		//	echo $e->getMessage();
		//}
		return $this->nomeRegiao;
	}
}