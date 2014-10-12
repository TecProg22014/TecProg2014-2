<?php

include "../Utilidades/ConexaoComBanco.php";
/**
 * Class persistence of 'Usuario'
 * */
class UsuarioDao {
	
	public function insertUser( $usuario ){
		$auxiliaryPassword = $usuario->getUserPassword();
		$finalPassword = $auxiliaryPassword[0];
		 
		$insertUserPassword = "INSERT INTO senha (codigo_senha) VALUES ('".$finalPassword."')";
		mysql_query( $insertUserPassword );

		$searchUserByPassword = "SELECT id_senha FROM senha WHERE codigo_senha='".$finalPassword."'";
		$resultSearchUserByPassword = $passwordId = mysql_query( $searchUserByPassword );
		$passwordId = mysql_fetch_array( $resultSearchUserByPassword );
		$insertUser = "INSERT INTO usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario) VALUES ('".$usuario->getFullName()."', '".$usuario->getUserEmail()."',
				'".$usuario->getUserPhoneNumber()."','".$passwordId['id_senha']."')";
		$returnInsertUser = mysql_query( $insertUser );


		return $returnInsertUser;
	}

	public function updateUser( $usuario, $userId, $lastPassword ){
		$auxiliaryPassword = $usuario->getPassword();
		$passwordModified = $auxiliaryPassword[0];
		$updatePassword = "UPDATE usuario SET nome_usuario = '".$usuario->getFullName()."' , telefone_usuario = '".$usuario->getUserPhoneNumber()."',
				           email_usuario = '".$usuario->getUserEmail()."' WHERE id_usuario = '".$userId."'";
		$returnUpdatePassword = mysql_query( $updatePassword );


		if( $passwordModified != $lastPassword ){
			$searchLastPasswordForUser = "SELECT id_senha FROM senha WHERE codigo_senha='".$lastPassword."'";
			$resultSearchLastPasswordForUser = mysql_query( $searchLastPasswordForUser );
			$passwordId = mysql_fetch_row( $resultSearchLastPasswordForUser );
			$updatePassword = "UPDATE senha SET codigo_senha = '".$passwordModified."' WHERE id_senha = '".$passwordId[0]."'";
			$savePassword = mysql_query( $updatePassword );

		} else{
			return ( $usuario && $savePassword );
		}
	}public function updateUser( $usuario, $userId, $lastPassword ){
		$auxiliaryPassword = $usuario->getPassword();
		$passwordModified = $auxiliaryPassword[0];
		$updatePassword = "UPDATE usuario SET nome_usuario = '".$usuario->getFullName()."' , telefone_usuario = '".$usuario->getUserPhoneNumber()."',
				           email_usuario = '".$usuario->getUserEmail()."' WHERE id_usuario = '".$userId."'";
		$returnUpdatePassword = mysql_query( $updatePassword );

		if( $passwordModified != $lastPassword ){
			$searchLastPasswordForUser = "SELECT id_senha FROM senha WHERE codigo_senha='".$lastPassword."'";
			$resultSearchLastPasswordForUser = mysql_query( $searchLastPasswordForUser );
			$passwordId = mysql_fetch_row( $resultSearchLastPasswordForUser );
			$updatePassword = "UPDATE senha SET codigo_senha = '".$passwordModified."' WHERE id_senha = '".$passwordId[0]."'";
			$resultUpdatePassword = mysql_query( $updatePassword );
		} else{
			return ( $usuario && $updatePassword );
		}
	}

	public function searchUser( $usuario ){
		$searchUserByUserArray = "SELECT * FROM usuario WHERE nome_usuario = '".$usuario."'";
		$resultSearchUserByUserArray = mysql_query( $searchUserByUserArray );
		$searchUser = mysql_fetch_row( $resultSearchUserByUserArray );
		return $searchUser;
	}

	public function deleteUser( $userEmail, $userPassword ){
		$deleteUserByEmail = "DELETE FROM usuario WHERE email_usuario = '".$userEmail."'";
		$resultDeleteUserByEmail = mysql_query( $deleteUserByEmail );
		$deleteUserByPassword = "DELETE FROM senha WHERE codigo_senha = '".$userPassword."'";
		$resultDeleteUserByPassword = mysql_query( $deleteUserByPassword );
		return ( $resultDeleteUserByEmail && $resultDeleteUserByPassword);

	}
	public function getUserRegisteredById( $userIdRegistred ){
		$searchUserIdRegistred = "SELECT * FROM usuario WHERE id_usuario = '".$idPessoa."'";
		$resultSearchUserIdRegistred = mysql_query( $searchUserIdRegistred );
		$returnResultGetUserIdRegistred = mysql_fetch_array( $resultGetUserIdRegistred );
		return $returnResultGetUserIdRegistred;
	}
}

?>
