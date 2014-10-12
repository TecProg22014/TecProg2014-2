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
		
		<form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeForm.php" method="POST" class="formu">
			
			<table class='insr'>
				<tr>
					<th class='titlein' >
						<h5>Pesquisar Usu&aacute;rio</h5>
					</th>
				</tr>
			
				<tr>
					<td> 
						<h4> Nome: 
							<input type="text" name="nome"/>
						</h4>
					</td>
				</tr>
					
				<th>
					<input type="hidden" name="tipo" value="pesquisar"/>
					<input type="submit" name='Enviar' value="Pesquisar" />
				</th>
			</table>
		</form>		
	</body>
</html>
