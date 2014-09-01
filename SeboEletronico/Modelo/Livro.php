<?php

include '../Dao/LivroDao.php';
include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTituloInvalido.php';
include '../Utilidades/ExcessaoEditoraInvalida.php';

/**
 * The class Livro is the model of books.
 * All books on system are objects of this.
 * 
 */

class Livro {

	/**
	 * Variebles to define a book.
	 *
	 * @var string $titulo;
	 * @var string $autor;
	 * @var string $genero;
	 * @var string $edicao;
	 * @var string $editora;
	 * @var string $venda;
	 * @var string $troca;
	 * @var string $estado;
	 * @var string $descricao;
	 */

	private $titulo;
	private $autor;
	private $genero;
	private $edicao;
	private $editora;
	private $venda;
	private $troca;
	private $estado;
	private $descricao;

	/**
	 * Constructor function of class Book.
	 * Its a full constructor of class and responsible to create a instance of class.
	 *
	 * @param $titulo
	 * @param $autor
	 * @param $genero
	 * @param $edicao
	 * @param $editora
	 * @param $venda
	 * @param $troca
	 * @param $estado
	 * @param $descricao
	 *
	 */

	function __construct($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao) {
		$this->__setTitulo($titulo);
		$this->__setAutor($autor);
		$this->__setGenero($genero);
		$this->__setEdicao($edicao);
		$this->__setEditora($editora);
		$this->__setVenda($venda);
		$this->__setTroca($troca);
		$this->__setEstado($estado);
		$this->__setDescricao($descricao);
	}

	/**
	 * The function __getTitulo() is the function to access the the atribute title value.
	 * @return Object Book var $titulo
	 * Returns $titulo of book.
	 */

	public function __getTitulo() {
		return $this->titulo;
	}

	/**
	 * The function __setTitulo() is the function to modify the value of atribute title.
	 * The only validation its of null title.
	 * If the title value is null, the method throws the exception ExcessaoTituloInvalido().
	 * @param $titulo
	 *
	 */

	public function __setTitulo($titulo) {
		if(!ValidaDados::validaCamposnulos($titulo)){
			throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
		}else{
			$this->titulo = $titulo;
		}

		/**
		 * Nao tera tratamento de excessao, pois o titulo é pessoal e vai de cada autor,
		 * logo pode ter qualquer tipo de caracter que o autor desejar.
		 */
	}

	/**
	 * The function __getAutor() is the function to access the the atribute author value.
	 * @return Object Book var $autor
	 *
	 */

	public function __getAutor() {
		return $this->autor;
	}

	/**
	 * The function __setAutor() is the function to modify the value of atribute author.
	 * The validations are of null author's name, 
	 * contained invalid characters in author's name and consecutive <space> characters .
	 * If the author value is null, contains space or invalid characters, 
	 * the method throws the exception ExcessaoNomeInvalido().
	 * @param $autor
	 *
	 */

	public function __setAutor($autor) {
		if(!ValidaDados::validaCamposNulos($autor)){
			throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
		}elseif(ValidaDados::validaNome($autor) == 1){
			throw new ExcessaoNomeInvalido("Nome do Autor contem caracteres invalidos!");
		}elseif(ValidaDados::validaNome($autor) == 2){
			throw new ExcessaoNomeInvalido("Nome do Autor contem espaÃ§os seguidos!");
		}else{
			$this->autor = $autor;
		}
	}

	/**
	 * The function __getGenero() is the function to access the the atribute genre value.
	 * @return Object Book var $genero
	 *
	 */

	public function __getGenero() {
		return $this->genero;
	}

	/**
	 * The function __setGenero() is the function to modify the value of atribute genre.
	 * No written validation.
	 * @param $genero
	 *
	 */
	
	public function __setGenero($genero) {
		$this->genero = $genero;
	}

	/**
	 * The function __getTroca() is the function to access the the atribute trade value.
	 * @return Object Book var $troca
	 *
	 */

	public function __getTroca() {
		return $this->troca;
	}

	/**
	 * The function __setTroca() is the function to modify the value of atribute trade.
	 * No written validation.
	 * @param $troca
	 *
	 */

	public function __setTroca($troca) {
		$this->troca = $troca;
	}

	/**
	 * The function __getVenda() is the function to access the the atribute sale value.
	 * @return Object Book var $venda
	 *
	 */

	public function __getVenda() {
		return $this->venda;
	}

	/**
	 * The function __setVenda() is the function to modify the value of atribute sale.
	 * No written validation.
	 * @param $venda
	 *
	 */

	public function __setVenda($venda) {
		$this->venda = $venda;
	}

	/**
	 * The function __getDescricao() is the function to access the the atribute description value.
	 * @return Object Book var $descricao
	 *
	 */

	public function __getDescricao() {
		return $this->descricao;
	}

	/**
	 * The function __setDescricao() is the function to modify the value of atribute description.
	 * No written validation.
	 * @param $descricao
	 *
	 */

	public function __setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	/**
	 * The function defineTiposDeGeneros() is the function that define the genres of books.
	 * No written validation.
	 * @return ArrayObject string
	 */

	public function defineTiposDeGeneros() { //Genero por engenharia
		define("ENGENHARIA", "Engenharia", TRUE);
		define("SOFTWARE", "Engenharia de Software", TRUE);
		define("ELETRONICA", "Engenharia Eletronica", TRUE);
		define("ENERGIA", "Engenharia de Energia", TRUE);
		define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
		define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);

		return array(ENGENHARIA,SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
	}

	/**
	 * The function __getEdicao() is the function to access the the atribute edition value.
	 * @return Object Book var $edicao
	 *
	 */

	public function __getEdicao() {
		return $this->edicao;
	}

	/**
	 * The function __setEdicao() is the function to modify the value of atribute edition.
	 * No written validation.
	 * @param $edicao
	 *
	 */
	
	public function __setEdicao($edicao){
		$this->edicao = $edicao;
		/**
		 * Precisa validar entrada só de números.
		 */
	}

	/**
	 * The function __getEditora() is the function to access the the atribute publisher value.
	 * @return Object Book var $editora
	 *
	 */

	public function __getEditora(){
		return $this->editora;
	}

	/**
	 * The function __setEditora() is the function to modify the value of atribute publisher.
	 * The only validation its of null publisher.
	 * If the title value is null, the method throws the exception ExcessaoEditoraInvalida().
	 * @param $editora
	 *
	 */

	public function __setEditora($editora){

		if(!ValidaDados::validaCamposNulos($editora)){
			throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
		}else{
			$this->editora = $editora;
		}
	}

	/**
	 * The function __getEstado() is the function to access the the atribute status value.
	 * @return Object Book var $editora
	 *
	 */

	public function __getEstado() {
		return $this->estado;
	}

	/**
	 * The function __setEstado() is the function to modify the value of atribute status.
	 * No written validation.
	 * @param $estado
	 *
	 */

	public function __setEstado($estado){
		$this->estado = $estado;
	}

}
?>
