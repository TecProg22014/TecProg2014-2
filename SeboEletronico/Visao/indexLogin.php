<?php
	session_start();
	if( !isset( $_SESSION["email"] ) || !isset( $_SESSION["senha"] ) ){
		header("Location: entrarLogin.php");
		exit;
	} else{
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
		
		<br><br>
		<div align="center">
			<font size="+3"  color ="white">Seja Bem Vindo ao Sebo Eletr&ocirc;nico!</font>
			<br />
		</div>
		
		<img src="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/Login.png" class="img3"/>
	</body>
</html>
<?php }?>