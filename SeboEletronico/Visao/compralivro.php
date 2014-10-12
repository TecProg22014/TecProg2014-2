<?php
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
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
			<button class="button" onclick="home();">Home</button>
			<button class="button" onclick="user();">Usu&aacute;rio</button>
			<button class="button" onclick="livro();">Livro</button>
			<button class="button" onclick="login();">Login</button>
		</div>
		
		<h1>Compra feita com Sucesso</h1>
		<?php
			include "..\Utilidades\ConexaoComBanco.php";
			if(!$dataBaseConnection){
				die ("<h1>Falha no bd </h1>");
			}

			$customerPhone  = $_POST['tel_comprador'];
			$customerName   = $_POST['nome_comprador'];
			$bookId 		= $_POST['id_livro'];
			$ownerId 		= $_POST['id_dono'];

			//Dados Vendedor
			$searchAllUsersByOwerId = "SELECT * FROM usuario WHERE id_usuario = '$ownerId' ";
			
			$resultSearchAllUsersByOwerId = mysql_query( $searchAllUsersByOwerId );
					
			while( $searchAllUsersByUserEmail = mysql_fetch_array( $resultSearchAllUsersByOwerId ) ) {
				$customerEmail = $searchAllUsersByUserEmail['email_usuario'] . "<br />";
			}

			include '../Modelo/Usuario.php';
			include "..\Utilidades\ConexaoComBanco.php";
			
			if(!$bd){
				die ("<h1>Falha no bd </h1>");
			}
				
			$updateBookByOperationFive = "UPDATE livro SET operacao = 'V' WHERE id_livro = $bookId ";
			$resultUpdateBookByOperationFive = mysql_query( $updateBookByOperationFive );
		?>
	</body>
</html>