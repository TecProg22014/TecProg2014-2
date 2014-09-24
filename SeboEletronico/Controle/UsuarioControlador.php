<?php

include "/Modelo/Usuario.php";

/**
 * The UsuarioControlador class is the class that controls the CRUD of users.
 * This class is the interface for communication of the persistence with the view.
 * The class has no attributes.
 *
 */

class UsuarioControlador {

	/**
	 * The public function salvaUsuario is responsible to create and persist a new user.
	 * If the data is not valid, the user creation is not completed.
	 *
	 * @param string $fullUserName;
	 * @param string $userPhoneNumber;
	 * @param string $userEmail;
	 * @param string $userPassword;
	 *
	 * @return bool UsuarioDao::insertUser( $usuario )
	 */

	public function salvaUsuario( $fullUserName, $userEmail, $userPhoneNumber, $userPassword ){
		try{
			$usuario = new Usuario( $fullUserName, $userEmail, $userPhoneNumber, $userPassword );
		} catch( Exception $e ){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarUsuario.php'; </script>";
			exit;
		}
		return UsuarioDao::insertUser( $usuario );
	}

	/**
	 * The public function checaCadastroId returns
	 * the users that contains the passed userId.
	 *
	 * @param string $userId
	 *
	 * @return Usuario UsuarioDao::getVerifyRegisterById( $userId )
	 */

	public function verifyRegisterById( $userId ){
		return UsuarioDao::getVerifyRegisterById( $userId );
	}

	/**
	 * The public function alterarCadastro updates the user data.
	 * Implementation operates as a user recreation,
	 * validating the registered password.
	 *
	 * @param string $fullUserName;
	 * @param string $userEmail;
	 * @param string $userPhoneNumber;
	 * @param string $userPassword;
	 * @param string $userId
	 * @param string $lastPassword
	 *
	 * The return is true if the user has been updated.
	 * @return bool UsuarioDao::alteraUsuario( $usuario, $userId, $lastPassword )
	 * The return is true if the user has been updated.
	 */

	public function updateUser( $fullUserName, $userEmail, $userPhoneNumber, $userPassword, $userId, $lastPassword ){
		try{

			$usuario = new Usuario( $fullUserName, $userEmail, $userPhoneNumber, $userPassword );
		} catch( Exception $e ){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/alteraUsuario.php'; </script>";
			exit;
		}
		return UsuarioDao::updateUser( $usuario, $userId, $lastPassword );

	}

	/**
	 * The function deletaCadastro deletes the user who owns the email passed.
	 * Only deletes the user if the passed password is correct.
	 *
	 * @param string $email
	 * @param string $senha
	 * 
	 * @return bool UsuarioDao::deletaUsuario( $userEmail, $userPassword ).
	 * The return is true if the user has been deleted.
	 */

	public function deleteUser( $userEmail, $userPassword ){	
		return UsuarioDao::deleteUser( $userEmail, $userPassword );	
	}

	/**
	 * The function pesquisaUsuario searches users,
	 * that contains the string $fullUserName in your name.
	 *
	 * @param string $fullUserName
	 *
	 * Returns the array of Users who have $fullUserName.
	 * @return ArrayObject Usuario UsuarioDao::searchUser( $fullUserName )
	 */

	public function searchUser( $fullUserName ){
		return UsuarioDao::searchUser( $fullUserName );
	}
}

?>
