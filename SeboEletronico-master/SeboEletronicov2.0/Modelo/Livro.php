<?php

include '../Dao/LivroDao.php';
include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTituloInvalido.php';
include '../Utilidades/ExcessaoEditoraInvalida.php';

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
		$this->setTitulo($titulo);
		$this->setAutor($autor);
		$this->setGenero($genero);
		$this->setEdicao($edicao);
		$this->setEditora($editora);
		$this->setVenda($venda);
		$this->setTroca($troca);
		$this->setEstado($estado);
		$this->setDescricao($descricao);
	}

	/**
	 * The function getTitulo() is the function to access the the atribute title value.
	 * @return Object Book var $titulo
	 *
	 */

	public function getTitulo() {
		return $this->titulo;
	}

	/**
	 * The function setTitulo() is the function to modify the value of atribute title.
	 * The only validation its of null title.
	 * If the title value is null, the method throws the exception ExcessaoTituloInvalido().
	 * @param $titulo
	 *
	 */

	public function setTitulo($titulo) {
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
	 * The function getAutor() is the function to access the the atribute author value.
	 * @return Object Book var $autor
	 *
	 */

	public function getAutor() {
		return $this->autor;
	}

	/**
	 * The function setAutor() is the function to modify the value of atribute author.
	 * The validations are of null author's name, 
	 * contained invalid characters in author's name and consecutive <space> characters .
	 * If the author value is null, contains space or invalid characters, 
	 * the method throws the exception ExcessaoNomeInvalido().
	 * @param $autor
	 *
	 */

	public function setAutor($autor) {
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
	 * The function getGenero() is the function to access the the atribute genre value.
	 * @return Object Book var $genero
	 *
	 */

	public function getGenero() {
		return $this->genero;
	}

	/**
	 * The function setGenero() is the function to modify the value of atribute genre.
	 * No written validation.
	 * @param $genero
	 *
	 */
	
	public function setGenero($genero) {
		$this->genero = $genero;
	}

	/**
	 * The function getTroca() is the function to access the the atribute trade value.
	 * @return Object Book var $troca
	 *
	 */

	public function getTroca() {
		return $this->troca;
	}

	/**
	 * The function setTroca() is the function to modify the value of atribute trade.
	 * No written validation.
	 * @param $troca
	 *
	 */

	public function setTroca($troca) {
		$this->troca = $troca;
	}

	/**
	 * The function getVenda() is the function to access the the atribute sale value.
	 * @return Object Book var $venda
	 *
	 */

	public function getVenda() {
		return $this->venda;
	}

	/**
	 * The function setVenda() is the function to modify the value of atribute sale.
	 * No written validation.
	 * @param $venda
	 *
	 */

	public function setVenda($venda) {
		$this->venda = $venda;
	}

	/**
	 * The function getDescricao() is the function to access the the atribute description value.
	 * @return Object Book var $descricao
	 *
	 */

	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * The function setDescricao() is the function to modify the value of atribute description.
	 * No written validation.
	 * @param $descricao
	 *
	 */

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	/**
	 * The function defineTiposDeGeneros() is the function that define the genres of books.
	 * No written validation.
	 * @return string ArrayObject
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
	 * The function getEdicao() is the function to access the the atribute edition value.
	 * @return Object Book var $edicao
	 *
	 */

	public function getEdicao() {
		return $this->edicao;
	}

	/**
	 * The function setEdicao() is the function to modify the value of atribute edition.
	 * No written validation.
	 * @param $edicao
	 *
	 */
	
	public function setEdicao($edicao){
		$this->edicao = $edicao;
		/**
		 * Precisa validar entrada só de números.
		 */
	}

	/**
	 * The function getEditora() is the function to access the the atribute publisher value.
	 * @return Object Book var $editora
	 *
	 */

	public function getEditora(){
		return $this->editora;
	}

	/**
	 * The function setEditora() is the function to modify the value of atribute publisher.
	 * The only validation its of null publisher.
	 * If the title value is null, the method throws the exception ExcessaoEditoraInvalida().
	 * @param $editora
	 *
	 */

	public function setEditora($editora){

		if(!ValidaDados::validaCamposNulos($editora)){
			throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
		}else{
			$this->editora = $editora;
		}
	}

	/**
	 * The function getEstado() is the function to access the the atribute status value.
	 * @return Object Book var $editora
	 *
	 */

	public function getEstado() {
		return $this->estado;
	}

	/**
	 * The function setEstado() is the function to modify the value of atribute status.
	 * No written validation.
	 * @param $estado
	 *
	 */

	public function setEstado($estado){
		$this->estado = $estado;
	}

	//    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
	//        if(empty($venda) && empty($troca)){
	//            $venda = "venda";
	//            $troca = "troca";
	//        }
	//
	//        try{
	//            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
	//        }catch(Exception $e){
	//            print"<script>alert('".$e->getMessage()."')</script>";

	//<!--<script language = "Javascript">
	//                    window.location="http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php";
	//                </script>-->

	//
	//            exit;
	//        }
	//        return LivroDao::salvaLivro($livro->getTitulo(),$livro->getAutor(),$livro->getGenero(),$livro->getEdicao(),
	//                $livro->getEditora(), $livro->getVenda(),$livro->getTroca(),$livro->getEstado(),
	//                $livro->getDescricao(), $id_dono);
	//    }
	//
	//    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
	//        return LivroDao::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
	//    }
	//
	//    public function getLivroById($id){
	//        return LivroDao::getLivroById($id);
	//    }
	//
	//    public function deletaLivro($titulo){
	//        return LivroDao::deletaLivro($titulo);
	//    }
	//
	//    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id, $id_usuario){
	//        if(empty($venda) && empty($troca)){
	//            $venda = "venda";
	//            $troca = "troca";
	//        }
	//        $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
	//        return LivroDao::alteraLivro($livro->getTitulo(),$livro->getAutor(),$livro->getGenero(),$livro->getEdicao(), $livro->getEditora(),
	//                $livro->getVenda(),$livro->getTroca(),$livro->getEstado(), $livro->getDescricao(),$id, $id_usuario);
	//    }
	//

}
?>
