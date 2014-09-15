<?php
/**
 * Class incompatible spreadsheet exception
 */
class ENomePlanilhaIncompativel extends Exception{
	
	/**
	 * Constructor to set a message error for inompatible spreadsheet 
	 */
	public function __construct( ){
		$this->message = "Planilha nao compativel com o parse!";
	}
}