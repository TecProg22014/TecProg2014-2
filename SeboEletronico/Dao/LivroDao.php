<?php

include "../Utilidades/ConexaoComBanco.php";
/**
 * Class persistence of 'Livro'
 * */
class LivroDao {

	/**
	 * Constructor to permit instances for the class
	 **/
	public __construct(){

	}

	public function insertBook( $livro, $ownerBookId ){
		/**
		 * Insertion method whose return is an object
		 * */

		$insertBook = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
				VALUES ('".$ownerBookId."','".$livro->getBookTitle()."','".$livro->getBookPublisher()."','".$livro->getBookAuthor()."',
                '".$livro->getBookEdition()."','".$livro->getBookGenre()."','".$livro->getBookStatus()."','".$livro->getBookDescription()."','".$livro->getBookSale()."',
                '".$livro->getBookTrade()."')";
		$livro = mysql_query($sql);
		return $livro;
	}

	/**
	 * Research methods book of the application, 
	 * all variations of consulting books are concentrated in this method
	 * Return method: Object
	 * */


	public function searchBook( $bookTitle, $bookStatus, $physicalConditionBookNew, $physicalConditionBookWorn, $availabilityForSale, $availabilityForExchange ){

		if( empty( $availabilityForExchange ) && !empty( $availabilityForSale )){
			if( empty( $physicalConditionBookNew ) && !empty( $physicalConditionBookWorn )){
				$searchAllBooksByID = "SELECT * FROM livro WHERE titulo_livro = '".$bookTitle."' AND estado_conserv = '".$physicalConditionBookWorn."'
            	AND tipo_operacao = '".$disponibilidadeVenda."'";
			} elseif( !empty( $physicalConditionBookNew ) && empty( $physicalConditionBookWorn )) {
				$sql = "SELECT * FROM livro WHERE titulo_livro = '".$bookTitle."' AND estado_conserv = '".$physicalConditionBookNew."'
            AND tipo_operacao = '".$availabilityForSale."'";
			}
			
		}else if( !empty( $availabilityForExchange ) && empty( $availabilityForSale )){
			if( empty( $physicalConditionBookNew ) && !empty( $physicalConditionBookWorn )){
				$searchAllBooksByConditionBookNew = "SELECT * FROM livro WHERE titulo_livro = '".$bookTitle."' AND estado_conserv = '".$physicalConditionBookWorn."'
           	 	AND tipo_operacao = '".$availabilityForExchange."'";
			} elseif( !empty( $physicalConditionBookNew ) && empty( $physicalConditionBookWorn )) {
				$searchAllBooksByConditionBookWorn = "SELECT * FROM livro WHERE titulo_livro = '".$bookTitle."' AND estado_conserv = '".$estadoNovo."'
            	AND tipo_operacao = '".$availabilityForExchange."'";
			}
		} else{
			$searchAllBooksByBookTitle = "SELECT * FROM livro WHERE titulo_livro = '".$bookTitle."'";
		}

		$returnSearchAllBooksByBookTitle = mysql_query( $searchAllBooksByBookTitle );
		$returnArrayOfBooksByBookTitle = mysql_fetch_array( $returnSearchAllBooksByBookTitle );

		if(!(empty( $returnArrayOfBooksByBookTitle ))){
			return false;
		} else{
			return $returnArrayOfBooksByBookTitle;
		}
		
	}
	
	/**
	 * @method getLivroById
	 * @param $id
	 * @var $sql
	 * @var $result
	 * Search book by parameter ID
	 * @return ArrayObject
	 * */
	
	public function getBookByIdUser( $userId ){
		$searchAllBooksById = "SELECT * FROM livro WHERE id_livro = '".$userId."'";
		$resultSearchAllBooksById = mysql_query( $searchAllBooksById );
		return mysql_fetch_array( $resultSearchAllBooksById );
	}

	public function deleteBook( $bookId ){
		$deleteBookById = "DELETE FROM livro WHERE id_livro = '".$bookId."'";
		$returnDeleteBookById = mysql_query($deleteBookById);
		return $returnDeleteBookById;
	}

	public function updateBook( $livro, $ownerBookId, $userId ){
		$updateBookByAllParameter = "UPDATE livro SET id_dono = '".$userId."', titulo_livro = '".$livro->getBookTitle()."', editora = '".$livro->getBookPublisher()."',
            	autor = '".$livro->getBookAuthor()."', edicao = '".$livro->getBookEdition()."', genero = '".$livro->getBookGenre()."', estado_conserv = '".$livro->getBookStatus()."', 
                descricao_livro = '".$livro->getBookDescription()."', venda = '".$livro->getBookSale()."', troca = '".$livro->getBookTrade()."' WHERE id_livro = '".$ownerId."'";
		$resultUpdateBookByAllParameter = mysql_query($updateBookByAllParameter);
		return $resultUpdateBookByAllParameter;
	}

	public function getBookByUserId( $userId ){
		$searchAllBooks = "SELECT * FROM livro WHERE id_dono = '".$userId."'";
		$resultSearchAllBooks = mysql_query( $searchAllBooks );
		$resultSearchAllBooks = array();
		
		/**
		 * Book search associated with a user
		 * */
		while( $receivesContentArrayBooks = mysql_fetch_assoc( $resultSearchAllBooks ) ) {
			$resultSearchAllBooks[] = $receivesContentArrayBooks;
		}

		if(!( empty( $resultSearchAllBooks ) )){
			return false;
		} else{
			return $livros;
		}
			
	}
	/**
	* Method to search for all records books
	*/
	public function getAllBook(){
		$searchAllBooks = "SELECT * FROM livro";
		$resultSearchAllBooks = mysql_query( $searchAllBooks );

		$livros = array();
		
		while(  $receivesContentArrayBooksSearch = mysql_fetch_assoc($result) ) {
			$resultSearchAllBooks[] = $receivesContentArrayBooksSearch;
		}

		if(!( empty( $livros ) )){
			return false;
		} else{
			return $livros;
		}
			
	}

}
?>
