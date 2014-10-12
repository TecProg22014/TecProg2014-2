<?php
	session_start();
	include '../Controle/LivroControlador.php';
	$bookIdAuthentication = $_SESSION['id_usuario'];
	$bookArray = LivroControlador::getBookByUserId( $bookIdAuthentication );
?>
<!DOCTYPE HTML>
<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/MeusLivrosStyle2.css" type="text/css" media="all">
		<link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css" type="text/css" media="all">
		<link rel="shortcut icon" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico">
		<script src="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js"></script> 
		<title>Sebo Eletr&ocirc;nico</title>	
	</head>

	<body>
		<div id="header">
			<div id="logo">
				<img src="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png" class="imgHeader"/>
			</div>
		</div>
		
		<div id="mainmenu">
			<button class="button" onclick="home()">Home</button>
			<button class="button" onclick="user();">Usu&aacute;rio</button>		
			<button class="button" onclick="livro();">Livro</button>
			<button class="button" onclick="sair();">Sair</button>
			
		</div>
		
		<div id="mainmenu">
			
			<button class="button" onclick="meusLivros();">Meus Livros</button>
			<button class="button" onclick="livrosDisponiveis();">Livros Dispon&iacute;veis</button>
			<button class="button" onclick="cadastraLivro();">Cadastrar</button>
			<button class="button" onclick="pesquisaLivro();">Pesquisar</button>
		</div>
		
		<br/><br/><br/>
		<table class="lista">
			<tr>
				<th class='titlein' >
					<h5>Meus Livros</h5>
				</th>
			</tr>
			<?php foreach($bookArrays as $bookId => $indexOfBook){ ?>

			<tr>
				<td>
					<h2> T&iacute;tulo: </h2>
					<h6>
						<?php
							echo $indexOfBook['titulo_livro'];
						?>
					</h6>
				</td>

				<td>
					<h2> Autor:</h2>
					<h6>
						<?php
							echo $indexOfBook['autor'];
						?>
					</h6>
				</td>

				<td>
					<h2> Editora: </h2>
					<h6>
						<?php
							echo $indexOfBook['editora'];
						?>
					</h6>
				</td>

				<td>
					<h2> Edi&ccedil;&atilde;o:</h2> 
					<h6>
						<?php
							echo $indexOfBook['edicao'];
						?>
					</h6>
				</td>

				<td>
					<h2> Descri&ccedil;&atilde;o: </h2>
					<h6>
						<?php
							echo $indexOfBook['descricao_livro'];
						?>
					</h6>
				</td>

				<td>
					<h2> Tipo(s) de opera&ccedil;&atilde;o: </h2>
					<h6>
						<?php
							echo $indexOfBook['venda'];
							echo "<br/>";
							echo $indexOfBook['troca'];
						?>
					</h6>
				</td>

				<td>
					<h2> Genero: </h2>
					<h6>
						<?php
							echo $indexOfBook['genero']
						?>
					</h6>
				</td>
				
				<td>
					<h2> Estado:<h2/> 
					<h6>
						<?php
							echo $indexOfBook['estado_conserv']
						?>
					</h6>
				</td>
					
				<td>
					<a href="http://localhost/TecProg2014-2/SeboEletronico/Visao/alterarLivro.php?id=<?php echo $indexOfBook['id_livro'] ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a>
					<a href="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeFormLivro.php?id_livro=<?php echo $indexOfBook['id_livro'] ?> " title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" > </a>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>