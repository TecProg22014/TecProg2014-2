<?php
class EErroConsulta extends Exception{

	public function __construct(){
		$this->message = "Algo errado em sua consulta";
	}
}