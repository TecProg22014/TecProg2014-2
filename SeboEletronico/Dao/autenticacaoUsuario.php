<?php
	include "../Utilidades/ConexaoComBanco.php";

	$userEmail = $_POST['email'];
	$userPassword = $_POST['senha'];


	//Persistence Variables
	$searchAllUserByEmail = mysql_query("SELECT * FROM usuario WHERE email_usuario = '".$userEmail."'") or die(mysql_error());
	$searchAllUserByPassword = mysql_query("SELECT * FROM senha WHERE codigo_senha ='".$userPassword."'");
	$resultSearchAllUserByEmail = mysql_num_rows( $searchAllUserByEmail );
	$resultSearchAllUserByPassword = mysql_num_rows( $searchAllUserByPassword );

	/**
	 * Getting data for initializing session user in the system.
	 * If $email and $senha are compatible log in is successful (window.location window)
	 * */


	$usuario = mysql_fetch_array( $searchAllUserByEmail );
	$userId = $usuario['id_usuario'];
	if( $resultSearchAllUserByEmail == $resultSearchAllUserByPassword ){
		if( $resultSearchAllUserByEmail > 0 ){
			session_start();
			$userEmail    = $_SESSION['email'];
			$userPassword = $_SESSION['senha'];
			$userId 	  = $_SESSION['id_usuario'];
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLogin.php'</script>";
		}
	}else{
		echo "<script>alert('Email de usuario ou senha invalido, tente novamente!')</script>";
		echo "<script>  window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/entrarLogin.php'</script>";
	}
?>