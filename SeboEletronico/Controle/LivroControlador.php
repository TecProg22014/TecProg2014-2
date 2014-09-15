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
	 * The public function salvaLivro is responsible to create and persist a new book.
	 * If the data is not valid, the book creation is not completed.
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
	 * 
	 * @return bool LivroDao::salvaLivro($livro, $id_dono)
	 */

	public function salvaLivro( $titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono ){
		if( empty( $venda ) && empty( $troca )){
			$venda = "venda";
			$troca = "troca";
		} else{
			//Nothing will run
		}

		try{
			$livro = new Livro( $titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao );
		} catch( Exception $e ){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarLivro.php';</script>";
			exit;
		}
		return LivroDao::salvaLivro( $livro, $id_dono );
	}

	/**
	 * The function pesquisaLivro search books containing the $title,
	 * new and used they can be traded or sold
	 *
	 * @param string $titulo
	 * Title of the book sought
	 * @param string $estadoNovo
	 * @param string $estadoUsado
	 * @param string $disponibilidadeVenda
	 * @param string $disponibilidadeTroca
	 * 
	 * @return ArrayObject Livro LivroDao::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca)
	 */

	public function pesquisaLivro( $titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca ){
		return LivroDao::pesquisaLivro( $titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca );
	}
	
	/**
	 * The function getLivroById search books that contains the $id.
	 * 
	 * @param string $id
	 * 
	 * @return ArrayObject Livro LivroDao::getLivroById($id)
	 */
	
	public function getLivroById( $id ){
		return LivroDao::getLivroById( $id );
	}
	
	/**
	 * The function deletaLivro deletes the book that contains the passed $idLivro.
	 * 
	 * @param string $idLivro
	 * 
	 * @return bool LivroDao::deletaLivro($idLivro)
	 * The return is true if the book has been deleted.
	 */
	public function deletaLivro( $idLivro ){
		return LivroDao::deletaLivro( $idLivro );
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
	 * @return bool LivroDao::alteraLivro($livro, $id_dono, $id_usuario)
	 * Returns true if the book has been updated.
	 */
	
	public function alteraLivro( $titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono, $id_usuario ){
		if(empty( $venda ) && empty( $troca )){
			$venda = "venda";
			$troca = "troca";
		}

		try{
			$livro = new Livro( $titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao );
		} catch( Exception $e ){
			print"<script>alert('".$e->getMessage()."')</script>";
			echo "<script>window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarLivro.php';</script>";
			exit;
		}
		return LivroDao::alteraLivro($livro, $id_dono, $id_usuario);
	}
	
	/**
	 * The function getLivroByIdUsuario returns all books of one user.
	 * 
	 * @param string $idUsuario
	 * 
	 * @return ArrayObject Livro LivroDao::getLivroByIdUsuario($idUsuario)
	 * Returns an array of books.
	 */
	
	public function getLivroByIdUsuario( $idUsuario ){
		return LivroDao::getLivroByIdUsuario( $idUsuario );
	}
	
	/**
	 * The function getAllLivro returns all books registered in database.
	 * 
	 * @return ArrayObject Livro LivroDao::getAllLivro()
	 * Returns an array of books.
	 */
	public function getAllLivro(){
		return LivroDao::getAllLivro();
	}

}

?>
