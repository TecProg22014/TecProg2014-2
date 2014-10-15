<?php
	include '../Controle/LivroControlador.php';
	$bookIdAuthentication = $_REQUEST['livros'];
	$bookArray = LivroControlador::getLivroById( $bookIdAuthentication );
	
	include_once "Header.php";
	$typeOfPage = "bookPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		<table class='insr'>
			<tr>
				<th class='titlein' > <h5>Dados da Pesquisa de Livro</h5></th>
			</tr>

			<tr> 
				<td>
					<h2> T&iacute;tulo: </h2> 
					<h6>
						<?php echo $bookArray['titulo_livro']?>
					</h6>
				</td>
			</tr>

			<tr>
				<td>
					<h2> Autor:</h2>
					<h6>
						<?php echo $bookArray['autor']?>
					</h6>
				</td>
			</tr>

			<tr> 
				<td>
					<h2> Editora: </h2>
					<h6>
						<?php echo $bookArray['editora']?>
					</h6>
				</td>
			</tr>

			<tr>
				<td>
					<h2> Edi&ccedil;&atilde;o:</h2> 
					<h6>
						<?php echo $bookArray['edicao']?>
					</h6>
				</td>
			</tr>

			<tr>
				<td>
					<h2> Descri&ccedil;&atilde;o: </h2>
					<h6>
						<?php echo $bookArray['descricao_livro']?>
					</h6>
				</td>
			</tr>

			<tr>
				<td>
					<h2> Tipo(s) de opera&ccedil;&atilde;o: </h2>
					<h6>
						<?php echo $bookArray['venda']?>
						<?php echo $bookArray['troca']?>
					</h6>
				</td>
			</tr>

			<tr>
				<td>
					<h2> Classifica&ccedil;&atilde;o: </h2>
					<h6>
						<?php echo $bookArray['genero']?>
					</h6>
				</td>
			</tr>
					
			<tr>
				<td>
					<h2> Estado:<h2/> 
					<h6>
						<?php echo $bookArray['estado_conserv']?>
					</h6>
				</td>
			</tr>

			<tr>
				<td>
					<a href="http://localhost/TecProg2014-2/SeboEletronico/Visao/alterarLivro.php?id=<?php echo $bookIdAuthentication ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a>
					<a href=" " title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" > </a>
				</td>
			</tr>
		</table>
	</body>
</html>
