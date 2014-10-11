<?php

include "/Dao/LivroDao.php";
include "/Utilidades/ValidaDados.php";
include "/Utilidades/ExcessaoNomeInvalido.php";
include "/Utilidades/ExcessaoTituloInvalido.php";
include "/Utilidades/ExcessaoEditoraInvalida.php";

/**
 * The class Livro is the model of books.
 * All books on system are objects of this.
 * 
 */

class Livro {

	/**
	 * Variebles to define a book.
	 *
	 * @var string $bookTitle;
	 * @var string $bookAuthor;
	 * @var string $bookGenre;
	 * @var string $bookEdition;
	 * @var string $bookPublisher;
	 * @var string $bookSale;
	 * @var string $bookTrade;
	 * @var string $bookStatus;
	 * @var string $bookDescription;
	 * @var Object ValidaDados $validator;
	 */

	private $bookTitle;
	private $bookAuthor;
	private $bookGenre;
	private $bookEdition;
	private $bookPublisher;
	private $bookSale;
	private $bookTrade;
	private $bookStatus;
	private $bookDescription;
	private $validator;

	/**
	 * Constructor function of class Book.
	 * Its a full constructor of class and responsible to create a 
	 * instance of class.
	 *
	 * @param $bookTitle
	 * @param $bookAuthor
	 * @param $bookGenre
	 * @param $bookEdition
	 * @param $bookPublisher
	 * @param $bookSale
	 * @param $bookTrade
	 * @param $bookStatus
	 * @param $bookDescription
	 *
	 */

	function __construct( $bookTitle, $bookAuthor, $bookGenre, $bookEdition, $bookPublisher, $bookSale, $bookTrade, $bookStatus, $bookDescription ) {
		$this->validator = new ValidaDados();
		$this->__setBookTitle( $bookTitle );
		$this->__setBookAuthor( $bookAuthor );
		$this->__setBookGenre( $bookGenre );
		$this->__setBookEdition( $bookEdition );
		$this->__setBookPublisher( $bookPublisher );
		$this->__setBookSale( $bookSale );
		$this->__setBookTrade( $bookTrade );
		$this->__setBookStatus( $bookStatus );
		$this->__setBookDescription( $bookDescription );
	}

	/**
	 * The function __getBookTitle() is the function to access the the atribute title value.
	 * @return Object Book var $bookTitle
	 * Returns $bookTitle of book.
	 */

	public function __getBookTitle() {
		return $this->bookTitle;
	}

	/**
	 * The function __setBookTitle() is the function to modify the value of atribute title.
	 * The only validation its of null title.
	 * If the title value is null, the method throws the exception ExcessaoTituloInvalido().
	 * @param $bookTitle
	 *
	 */

	public function __setBookTitle( $bookTitle ) {
		if( !$this->validator->validateNullInputs( $bookTitle ) ){
			throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
		} else{
			$this->bookTitle = $bookTitle;
		}
		
		/**
		 * Nao tera tratamento de excessao, pois o titulo é pessoal e vai de cada autor,
		 * logo pode ter qualquer tipo de caracter que o autor desejar.
		 */
	}

	/**
	 * The function __getBookAuthor() is the function to access the the atribute author value.
	 * @return Object Book var $bookAuthor
	 *
	 */

	public function __getBookAuthor() {
		return $this->bookAuthor;
	}

	/**
	 * The function __setAutor() is the function to modify the value of atribute author.
	 * The validations are of null author's name, 
	 * contained invalid characters in author's name and consecutive <space> characters .
	 * If the author value is null, contains space or invalid characters, 
	 * the method throws the exception ExcessaoNomeInvalido().
	 * @param $bookAuthor
	 *
	 */

	public function __setBookAuthor( $bookAuthor ) {
		if( !$this->validator->validateNullInputs( $bookAuthor ) ){
			throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
		} elseif( $this->validator->validateName( $bookAuthor ) == 1 ){
			throw new ExcessaoNomeInvalido("Nome do Autor contem caracteres invalidos!");
		} elseif( $this->validator->validateName( $bookAuthor ) == 2 ){
			throw new ExcessaoNomeInvalido("Nome do Autor contem espaÃ§os seguidos!");
		} else{
			$this->autor = $bookAuthor;
		}
		
	}

	/**
	 * The function __getBookGenre() is the function to access the the atribute genre value.
	 * @return Object Book var $bookGenre
	 *
	 */

	public function __getBookGenre() {
		return $this->bookGenre;
	}

	/**
	 * The function __setBookGenre() is the function to modify the value of atribute genre.
	 * No written validation.
	 * @param $bookGenre
	 *
	 */
	
	public function __setBookGenre( $bookGenre ) {
		$this->bookGenre = $bookGenre;
	}

	/**
	 * The function __getBookTrade() is the function to access the the atribute trade value.
	 * @return Object Book var $bookTrade
	 *
	 */

	public function __getBookTrade() {
		return $this->bookTrade;
	}

	/**
	 * The function __setTroca() is the function to modify the value of atribute trade.
	 * No written validation.
	 * @param $bookTrade
	 *
	 */

	public function __setBookTrade( $bookTrade ) {
		$this->bookTrade = $bookTrade;
	}

	/**
	 * The function __getBookSale() is the function to access the the atribute sale value.
	 * @return Object Book var $bookSale
	 *
	 */

	public function __getBookSale() {
		return $this->bookSale;
	}

	/**
	 * The function __setBookSale() is the function to modify the value of atribute sale.
	 * No written validation.
	 * @param $bookSale
	 *
	 */

	public function __setBookSale( $bookSale ) {
		$this->bookSale = $bookSale;
	}

	/**
	 * The function __getBookDescription() is the function to access the the atribute description value.
	 * @return Object Book var $bookDescription
	 *
	 */

	public function __getBookDescription() {
		return $this->bookDescription;
	}

	/**
	 * The function __setBookDescription() is the function to modify the value of atribute description.
	 * No written validation.
	 * @param $bookDescription
	 *
	 */

	public function __setBookDescription($bookDescription) {
		$this->bookDescription = $bookDescription;
	}

	/**
	 * The function defineTiposDeGeneros() is the function that define the genres of books.
	 * No written validation.
	 * @return ArrayObject string
	 */

	public function defineGenreTypesPerEngineering() {
		define("ENGENHARIA", "Engenharia", TRUE);
		define("SOFTWARE", "Engenharia de Software", TRUE);
		define("ELETRONICA", "Engenharia Eletronica", TRUE);
		define("ENERGIA", "Engenharia de Energia", TRUE);
		define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
		define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);


		return array(ENGENHARIA, SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);

	}

	/**
	 * The function __getBookEdition() is the function to access the the atribute edition value.
	 * @return Object Book var $bookEdition
	 *
	 */

	public function __getBookEdition() {
		return $this->bookEdition;
	}

	/**
	 * The function __setBookEdition() is the function to modify the value of atribute edition.
	 * No written validation.
	 * @param $bookEdition
	 *
	 */
	
	public function __setBookEdition( $bookEdition ){
		$this->bookEdition = $bookEdition;
		/**
		 * Precisa validar entrada só de números.
		 */
	}

	/**
	 * The function __getBookPublisher() is the function to access the the atribute publisher value.
	 * @return Object Book var $bookPublisher
	 *
	 */

	public function __getBookPublisher(){
		return $this->bookPublisher;
	}

	/**
	 * The function __setBookPublisher() is the function to modify the value of atribute publisher.
	 * The only validation its of null publisher.
	 * If the title value is null, the method throws the exception ExcessaoEditoraInvalida().
	 * @param $bookPublisher
	 *
	 */

	public function __setBookPublisher( $bookPublisher ){

		if( !$this->validator->validateNullInputs( $bookPublisher )){
			throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
		} else{
			$this->bookPublisher = $bookPublisher;
		}
		
	}

	/**
	 * The function __getBookPublisher() is the function to access the the atribute status value.
	 * @return Object Book var $bookPublisher
	 *
	 */

	public function __getBookPublisher() {
		return $this->bookPublisher;
	}

	/**
	 * The function __setBookPublisher() is the function to modify the value of atribute status.
	 * No written validation.
	 * @param $bookStatus
	 *
	 */

	public function __setBookPublisher( $bookStatus ){
		$this->bookPublisher = $bookStatus;
	}

}
?>
