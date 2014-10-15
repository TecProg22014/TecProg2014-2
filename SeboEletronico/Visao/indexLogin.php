<?php
	
	session_start();
	if( !isset( $_SESSION["email"] ) || !isset( $_SESSION["senha"] ) ){
		header("Location: entrarLogin.php");
		exit;
	} else{
		include_once "Header.php";
		$typeOfPage = "loginOn";
		Header::loadMenuOfPage( $typeOfPage );
	}
	
?>