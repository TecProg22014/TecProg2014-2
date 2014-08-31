<?php

include '../Modelo/Usuario.php';

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
	 * @param string $nome
	 * @param string $email
	 * @param string $telefone
	 * @param string $senha
	 *
	 * @return bool UsuarioDao::salvaUsuario($usuario)
	 */

	public function salvaUsuario($nome, $email, $telefone, $senha){
		try{
			$usuario = new Usuario($nome, $telefone, $email, $senha);
		}catch(Exception $e){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
			exit;
		}
		return UsuarioDao::salvaUsuario($usuario);
	}

	/**
	 * The public function checaCadastroId returns
	 * the users that contains the passed id.
	 *
	 * @param string $id
	 *
	 * @return Usuario UsuarioDao::getCadastradosPorId($id)
	 */

	public function checaCadastroId($id){
		return UsuarioDao::getCadastradosPorId($id);
	}

	/**
	 * The public function alterarCadastro updates the user data.
	 * Implementation operates as a user recreation,
	 * validating the registered password.
	 *
	 * @param string $nome
	 * @param string $email
	 * @param string $telefone
	 * @param string $senha
	 * @param string $id
	 * @param string $senhaVelha
	 *
	 * The return is true if the user has been updated.
	 * @return bool UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha)
	 */

	public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
		try{

			$usuario = new Usuario($nome, $telefone, $email, $senha);
		}catch(Exception $e){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
			exit;
		}
		return UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha);

	}

	/**
	 * The function deletaCadastro deletes the user who owns the email passed.
	 * Only deletes the user if the passed password is correct.
	 *
	 * @param string $email
	 * @param string $senha
	 *
	 * The return is true if the user has been deleted.
	 * @return bool UsuarioDao::deletaUsuario($email, $senha)
	 */

	public function deletaCadastro($email, $senha){
			
		return UsuarioDao::deletaUsuario($email, $senha);
			
	}

	/**
	 * The function pesquisaUsuario searches users,
	 * that contains the string $nome in your name.
	 *
	 * @param string $nome
	 *
	 * Returns the array of Users who have $nome.
	 * @return ArrayObject Usuario UsuarioDao::pesquisaUsuario($nome)
	 */

	public function pesquisaUsuario($nome){
		return UsuarioDao::pesquisaUsuario($nome);
	}
}

?>
