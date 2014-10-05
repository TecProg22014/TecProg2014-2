<?php

include "/Utilidades/ValidaDados.php";
include "/Utilidades/ExcessaoNomeInvalido.php";
include "/Utilidades/ExcessaoTelefoneInvalido.php";
include "/Utilidades/ExcessaoEmailInvalido.php";
include "/Utilidades/ExcessaoSenhaInvalida.php";
include "/Dao/UsuarioDao.php";

/**
 * The class Usuario is the model of users.
 * All users on system are objects of this.
 * 
 */

class User {
	
	/**
	 * Variebles to define a user.
	 *
	 * @var string $fullUserName;
	 * @var string $userPhoneNumber;
	 * @var string $userEmail;
	 * @var string $userPassword;
	 */
	
	private $fullUserName;
	private $userPhoneNumber;
	private $userEmail;
	private $userPassword;

	/**
	 * Constructor function of class User.
	 * Its a full constructor of class and responsible to create a instance of class.
	 *
	 * @param string $fullUserName;
	 * @param string $userPhoneNumber;
	 * @param string $userEmail;
	 * @param string $userPassword;
	 */
	
	public function __construct( $fullUserName, $userPhoneNumber, $userEmail, $userPassword ) {
		$this->__setFullUserName( $fullUserName );
		$this->__setUserPhoneNumber( $userPhoneNumber );
		$this->__setUserEmail( $userEmail );
		$this->__setUserPassword( $userPassword );
	}
	
	/**
	 * The function __getNome() is the function to access the atribute with names value.
	 * @return Object User var $fullUserName
	 *
	 */
	
	public function __getFullUserName() {
		return $this->fullUserName;
	}
	
	/**
	 * The function __setNome() is the function to modify the value of atribute name.
	 * If the names value is null
	 * Or are special characters.
	 * Or are twice spaces.
	 * The method throws the exception ExcessaoNomeInvalido().
	 * @param $fullUserName
	 *
	 */
	
	public function __setFullUserName($fullUserName){

		if( !ValidaDados::validaCamposNulos( $fullUserName ) ){
			throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
		} elseif( ValidaDados::validaNome( $fullUserName ) == 1 ){
			throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
		} elseif( ValidaDados::validaNome( $fullUserName ) == 2 ){
			throw new ExcessaoNomeInvalido("Nome contem espaços seguidos!");
		} else{
			$this->fullUserName = $fullUserName;
		}
	}
	
	/**
	 * The function __getTelefone() is the function to access the atribute with phones value.
	 * @return Object User var $userPhoneNumber
	 *
	 */
	
	public function __getUserPhoneNumber() {
		return $this->UserPhoneNumber;
	}

	/**
	 * The function __setTelefone() is the function to modify the value of atribute phone.
	 * If the phones value is null
	 * Or are no numbers characters
	 * Or are more of 8 characters
	 * The method throws the exception ExcessaoTelefoneInvalido().
	 * @param $userPhoneNumber
	 *
	 */
	
	public function __setUserPhoneNumber( $userPhoneNumber ) {
		if( !ValidaDados::validaCamposNulos( $userPhoneNumber ) ){
			throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
		} elseif( ValidaDados::validaTelefone( $userPhoneNumber ) == 1 ){
			throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
		} elseif( ValidaDados::validaTelefone( $userPhoneNumber ) == 2 ){
			throw new ExcessaoTelefoneInvalido("Telefone deve conter exatamente oito (8) digitos!");
		} else{
			$this->phoneNumber = $userPhoneNumber;
		}
	}
	
	/**
	 * The function __getEmail() is the function to access the atribute with emails value.
	 * @return Object User var $userEmail
	 *
	 */
	
	public function __getUserEmail() {
		return $this->userEmail;
	}
	
	/**
	 * The function __setEmail() is the function to modify the value of atribute email.
	 * If the emails value is null
	 * Or the email is being used
	 * The method throws the exception ExcessaoEmailInvalido().
	 * @param $userEmail
	 *
	 */
	
	public function __setUserEmail( $userEmail ) {
		if( !ValidaDados::validaCamposNulos( $userEmail ) ){
			throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
		} elseif( ValidaDados::validaEmail( $userEmail ) == 1 ){
			throw new ExcessaoEmailInvalido("E-mail nao válido!");
		} else{
			$this->userEmail = $userEmail;
		}
	}
	
	/**
	 * The function __getUserPassword() is the function to access the atribute with passwords value.
	 * @return Object User var $userPassword
	 *
	 */
	
	public function __getUserPassword() {
		return $this->userPassword;
	}
	
	/**
	 * The function __setSenha() is the function to modify the value of atribute password.
	 * If the passwords value is null
	 * Or are no special characters
	 * Or are different of 6 characters
	 * Or the password and the confirmation are differents
	 * The method throws the exception ExcessaoSenhaInvalida().
	 * @param $userPassword
	 *
	 */
	
	public function __setUserPassword($userPassword) {
		$auxiliar = ValidaDados::validaSenha( $userPassword );

		if( !ValidaDados::validaSenhaNula( $userPassword )){
			throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
		} elseif( $auxiliar == 1 ){
			throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
		} elseif( $auxiliar == 2 ){
			throw new ExcessaoSenhaInvalida("Senha deve conter exatamente seis (6) digitos!");
		} elseif( $auxiliar == 3 ){
			throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
		} else{
			$this->password = $userPassword;
		}
	}
	
}

?>
