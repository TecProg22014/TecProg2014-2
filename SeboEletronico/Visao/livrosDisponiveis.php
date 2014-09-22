<?php
	session_start();
	include '../Controle/LivroControlador.php';
	$id = $_SESSION['id_usuario'];
	$listaLivros = LivroControlador::getAllLivro();
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/MeusLivrosStyle.css" type="text/css" media="all">
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
			<!--<button class="button" onclick="deletaLivro();">Deletar</button>-->
			<button class="button" onclick="pesquisaLivro();">Pesquisar</button>
		</div>
		
		<br/><br/><br/>
		<table class='insr'>
			<tr>
				<th class='titlein'>
					<h5>Livros Dispon&iacute;veis</h5>
				</th>
			</tr>
			<?php foreach($listaLivros as $chave => $valor){ ?>
			<tr>
				<td>
					<h2> T&iacute;tulo: </h2>
					<h6>
						<a href="http://localhost/TecProg2014-2/SeboEletronico/Visao/detalhesLivro.php?id_livro=<?php echo $valor['id_livro'] ?>"> <?php echo $valor['titulo_livro'] ?></a>
					</h6>
				</td>
			</tr>
			<?php }?>
		</table>
	</body>
</html>
