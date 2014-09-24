<?php

include "/Modelo/Livro.php";
/**
 * The LivroControlador class is the class that controls the CRUD of books.
 * this class is the interface for communication of the persistence with the view.
 * The class has no attributes.
 *
 */

class LivroControlador {

	/**
	 * The public function salvaLivro is responsible to create 
	 * and persist a new book.
	 * If the data is not valid, the book creation is not completed.
	 *
	 * @param string $bookTitle
	 * @param string $bookAuthor
	 * @param string $bookGenre
	 * @param string $bookEdition
	 * @param string $bookPublisher
	 * @param string $bookSale
	 * @param string $bookTrade
	 * @param string $bookStatus
	 * @param string $bookDescription
	 * @param string $ownerId
	 * 
	 * @return bool LivroDao::insertBook( $livro, $ownerId )
	 */


	public function insertBook( $bookTitle, $bookAuthor, $bookGenre, $bookEdition, $bookPublisher, $bookSale, $bookTrade, $bookStatus, $bookDescription, $ownerId ){
		if( empty( $bookSale ) && empty( $bookTrade )){
			$bookSale = "venda";
			$bookTrade = "troca";
		} else{
			//Nothing will run
		}

		try{

			$livro = new Livro( $bookTitle, $bookAuthor, $bookGenre, $bookEdition, $bookPublisher, $bookSale, $bookTrade, $bookStatus, $bookDescription );

		} catch( Exception $e ){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarLivro.php';</script>";
			exit;
		}
		return LivroDao::insertBook( $livro, $ownerId );
	}

	/**
	 * The function pesquisaLivro search books containing the $title,
	 * new and used they can be traded or sold
	 *
	 * @param string $bookTitle
	 * Title of the book sought
	 * @param string $physicalConditionBookNew
	 * @param string $physicalConditionBookWorn
	 * @param string $availabilityForSale
	 * @param string $availabilityForExchange
	 * 
	 * @return ArrayObject Livro LivroDao::searchBook( $bookTitle, $physicalConditionBookNew, $physicalConditionBookWorn, $availabilityForSale, $availabilityForExchange )
	 */

	public function searchBook( $bookTitle, $physicalConditionBookNew, $physicalConditionBookWorn, $availabilityForSale, $availabilityForExchange ){
		return LivroDao::searchBook( $bookTitle, $physicalConditionBookNew, $physicalConditionBookWorn, $availabilityForSale, $availabilityForExchange );

	}
	
	/**
	 * The function getLivroById search books that contains the $id.
	 * 
	 * @param string $id
	 * 
	 * @return ArrayObject Livro LivroDao::getBookById($bookId)
	 */
	
	public function getBookById( $bookId ){
		return LivroDao::getBookById( $bookId );
	}
	
	/**
	 * The function deletaLivro deletes the book that contains the passed $bookId.
	 * 
	 * @param string $bookId
	 * 
	 * @return bool LivroDao::deleteBook( $bookId )
	 * The return is true if the book has been deleted.
	 */
	public function deleteBook( $bookId ){
		return LivroDao::deletaLivro( $bookId );
	}
	
	/**
	 * The function alteraLivro updates a book.
	 * 
	 * @param string $titulo
	 * @param string $autor
	 * @param string $genero
	 * @param string $edicao
	 * @param string $editora
	 * @param string $venda
	 * @param string $troca
	 * @param string $estado
	 * @param string $descricao
	 * @param string $id_dono
	 * @param string $id_usuario
	 * 
	 * @return bool LivroDao::updateBook( $livro, $ownerId, $userId )
	 * Returns true if the book has been updated.
	 */
	
<
	public function updateBook( $bookTitle, $bookAuthor, $bookGenre, $bookEdition, $bookPublisher, $bookSale, $bookTrade, $bookStatus, $bookDescription, $ownerId, $userId ){
		if( empty( $bookSale ) && empty( $bookTrade )){
			$bookSale = "venda";
			$bookTrade = "troca";
		}

		try{
			$livro = new Livro(  $bookTitle, $bookAuthor, $bookGenre, $bookEdition, $bookPublisher, $bookSale, $bookTrade, $bookStatus, $bookDescription );

		} catch( Exception $e ){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarLivro.php';</script>";
			exit;
		}
		return LivroDao::updateBook( $livro, $ownerId, $userId );
	}
	
	/**
	 * The function getBookByUserId returns all books of one user.
	 * 
	 * @param string $userId
	 * 
	 * @return ArrayObject Livro LivroDao::getBookByUserId( $userId )
	 * Returns an array of books.
	 */
	
	public function getBookByUserId( $userId ){
		return LivroDao::getBookByUserId( $userId );
	}
	
	/**
	 * The function getAllBook returns all books registered in database.
	 * 
	 * @return ArrayObject Livro LivroDao::getAllBook()
	 * Returns an array of books.
	 */
	public function getAllBook(){
		return LivroDao::getAllBook();
	}

}

?>
