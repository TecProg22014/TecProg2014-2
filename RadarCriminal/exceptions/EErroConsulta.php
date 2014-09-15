<?php
/**
 * Class sql error excpection
 */
class EErroConsulta extends Exception{

	/**
	 * Constructor to set a message error for wrong sql 
	 */
	public function __construct( ){
		$this->message = "Algo errado em sua consulta";
	}
}