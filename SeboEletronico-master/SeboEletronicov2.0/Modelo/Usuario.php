<?php

include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTelefoneInvalido.php';
include '../Utilidades/ExcessaoEmailInvalido.php';
include '../Utilidades/ExcessaoSenhaInvalida.php';
include '../Dao/UsuarioDao.php';

/**
 * The class Usuario is the model of users.
 * All users on system are objects of this.
 * 
 */

class Usuario {
	
	/**
	 * Variebles to define a user.
	 *
	 * @var string $nome;
	 * @var string $telefone;
	 * @var string $email;
	 * @var string $senha;
	 */
	
	private $nome;
	private $telefone;
	private $email;
	private $senha;

	/**
	 * Constructor function of class User.
	 * Its a full constructor of class and responsible to create a instance of class.
	 *
	 * @param string $nome;
	 * @param string $telefone;
	 * @param string $email;
	 * @param string $senha;
	 */
	
	public function __construct($nome, $telefone, $email, $senha) {
		$this->setNome($nome);
		$this->setTelefone($telefone);
		$this->setEmail($email);
		$this->setSenha($senha);
	}
	
	/**
	 * The function getNome() is the function to access the atribute with names value.
	 * @return Object User var $nome
	 *
	 */
	
	public function getNome() {
		return $this->nome;
	}
	
	/**
	 * The function setNome() is the function to modify the value of atribute name.
	 * If the names value is null
	 * Or are special characters.
	 * Or are twice spaces.
	 * The method throws the exception ExcessaoNomeInvalido().
	 * @param $nome
	 *
	 */
	
	public function setNome($nome){

		if(!ValidaDados::validaCamposNulos($nome)){
			throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
		}elseif(ValidaDados::validaNome($nome) == 1){
			throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
		}elseif(ValidaDados::validaNome($nome) == 2){
			throw new ExcessaoNomeInvalido("Nome contem espaços seguidos!");
		}else{
			$this->nome = $nome;
		}
	}
	
	/**
	 * The function getTelefone() is the function to access the atribute with phones value.
	 * @return Object User var $telefone
	 *
	 */
	
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * The function setTelefone() is the function to modify the value of atribute phone.
	 * If the phones value is null
	 * Or are no numbers characters
	 * Or are more of 8 characters
	 * The method throws the exception ExcessaoTelefoneInvalido().
	 * @param $telefone
	 *
	 */
	
	public function setTelefone($telefone) {
		if(!ValidaDados::validaCamposNulos($telefone)){
			throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
		}elseif(ValidaDados::validaTelefone($telefone) == 1){
			throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
		}elseif(ValidaDados::validaTelefone($telefone) == 2){
			throw new ExcessaoTelefoneInvalido("Telefone deve conter exatamente oito (8) digitos!");
		}else{
			$this->telefone = $telefone;
		}
	}
	
	/**
	 * The function getEmail() is the function to access the atribute with emails value.
	 * @return Object User var $email
	 *
	 */
	
	public function getEmail() {
		return $this->email;
		//$email = "caiquepereira@gmail.com";
		//return $email ;
	}
	
	/**
	 * The function setEmail() is the function to modify the value of atribute email.
	 * If the emails value is null
	 * Or the email is being used
	 * The method throws the exception ExcessaoEmailInvalido().
	 * @param $email
	 *
	 */
	
	public function setEmail($email) {
		if(!ValidaDados::validaCamposNulos($email)){
			throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
		}elseif(ValidaDados::validaEmail($email) == 1){
			throw new ExcessaoEmailInvalido("E-mail nao válido!");
		}else{
			$this->email = $email;
		}
	}
	
	/**
	 * The function getSenha() is the function to access the atribute with passwords value.
	 * @return Object User var $senha
	 *
	 */
	
	public function getSenha() {
		return $this->senha;
	}
	
	/**
	 * The function setSenha() is the function to modify the value of atribute password.
	 * If the passwords value is null
	 * Or are no special characters
	 * Or are different of 6 characters
	 * Or the password and the confirmation are differents
	 * The method throws the exception ExcessaoSenhaInvalida().
	 * @param $senha
	 *
	 */
	
	public function setSenha($senha) {
		$auxiliar = ValidaDados::validaSenha($senha);

		if(!ValidaDados::validaSenhaNula($senha)){
			throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
		}elseif($auxiliar == 1){
			throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
		}elseif($auxiliar == 2){
			throw new ExcessaoSenhaInvalida("Senha deve conter exatamente seis (6) digitos!");
		}elseif($auxiliar == 3){
			throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
		}else{
			$this->senha = $senha;
		}
	}

	//    public function checaCadastro($email, $senha){
	//        return UsuarioDao::checaCadastro($email, $senha);
	//    }
	//
	//    public function checaCadastroId($id){
	//        return UsuarioDao::getCadastradosPorId($id);
	//    }
	//
	//    public function checaSenhaId($idSenha){
	//        return UsuarioDao::getSenhaPorId($idSenha);
	//    }
	//
	//    public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
	//        $usuario = new Usuario($nome, $telefone, $email, $senha);
	//        return UsuarioDao::alteraUsuario($usuario->getNome(), $usuario->getEmail(), $usuario->getTelefone(), $usuario->getSenha(),$id,$senhaVelha);
	//    }
	//
	//    public function deletaCadastro($email, $senha){
	//        return UsuarioDao::deletaUsuario($email, $senha);
	//    }
	//
	//    public function pesquisaUsuario($nome){
	//        return UsuarioDao::pesquisaUsuario($nome);
	//    }
}

?>
