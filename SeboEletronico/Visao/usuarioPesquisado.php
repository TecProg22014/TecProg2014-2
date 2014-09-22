<?php 
	session_start();
	$id_usuario = $_SESSION['id_usuario'];
	include '../Controle/UsuarioControlador.php';
	$nome = $_REQUEST['nome'];
	$pesquisado = UsuarioControlador::pesquisaUsuario( $nome );
?>
<!DOCTYPE HTML>
<html>
	<head>	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css" type="text/css" media="all">
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
			<button class="button" onclick="altera();">Alterar</button>		
			<button class="button" onclick="deleta();">Deletar</button> 
			<button class="button" onclick="pesquisa();">Pesquisar</button>
		</div>
		
		<br/><br/><br/>
		
		<table class='insr'>
			<tr>
				<th class='titlein'>
					<h5>Usu&aacute;rio Pesquisado</h5>
				</th>
			</tr>
			
			<tr>
				<td>
					<center> Nome: 
						<?php
							echo $pesquisado[1];
						?>
					</center> 
				</td>
			</tr>
					
			<tr>
				<td > 
					<center> Telefone :
						<?php
							echo $pesquisado[3];
						?>
					</center> 
				</td>
			</tr>
					
			<tr>
				<td>
					<center> Email:
						<?php
							echo $pesquisado[4];
						?>
					</center>
				</td>
			</tr>
		</table>
	</body>
</html>
