<?php
	session_start();
	include '../Controle/LivroControlador.php';
	$id = $_SESSION['id_usuario'];
	$bookArray = LivroControlador::getAllBook();
	
	include_once "Header.php";
	$typeOfPage = "bookPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		<table class='insr'>
			<tr>
				<th class='titlein'>
					<h5>Livros Dispon&iacute;veis</h5>
				</th>
			</tr>
			<?php foreach($bookArrays as $bookId => $indexOfBook){ ?>
			<tr>
				<td>
					<h2> T&iacute;tulo: </h2>
					<h6>
						<a href="http://localhost/TecProg2014-2/SeboEletronico/Visao/detalhesLivro.php?id_livro=<?php echo $indexOfBook['id_livro'] ?>"> <?php echo $indexOfBook['titulo_livro'] ?></a>
					</h6>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>
