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
		<?php
			$_POST['mural'];			
			$_POST['nome_comprador'];
			$_POST ['id_livro'];
			$mural = $_POST['mural'];
			include "..\Utilidades\ConexaoComBanco.php";
			if(!$dataBaseAuthentication){
				die ("<h1>Falha no bd </h1>");
			}

			//Acessar Informa&ccedil;ões do comprador
			$bookId = $_POST['id_livro'];
			$userEmail = $_SESSION["email"];
			$searchAllUsersByEmail = "SELECT * FROM usuario WHERE email_usuario = '$email_usuario' ";
			$resultSearchAllUsersByEmail = mysql_query($searchAllUsersByEmail);
			while( $userArray = mysql_fetch_array( $resultSearchAllUsersByEmail )) {
				$customerName = $userArray['nome_usuario'];
			}
				
			$insertBoard = mysql_query("INSERT INTO mural (texto,nome_pergunta,id_livro) VALUES ('$mural', '$nome_comprador', '$id_livro')");

		?>
	  
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
		<?php
			include "..\Utilidades\ConexaoComBanco.php";
			if(!$dataBaseAuthentication){
				die ("<h1>Falha no bd </h1>");
			}
		
			//Acessar Informa&ccedil;ões do comprador
	  
			$searchAllUsersByUserEmail = "SELECT * FROM usuario WHERE email_usuario = '".$userEmail."' ";
	  
			$resultSearchAllUsersByUserEmail = mysql_query( $searchAllUsersByUserEmail );
			
			while( $userArray = mysql_fetch_array( $resultSearchAllUsersByUserEmail ) ) {
				$customerName  =  $userArray['nome_usuario'] . "<br />";
				$customerPhone =  $userArray['telefone_usuario'] . "<br />";		
			}
	 
			//Acessando informa&ccedil;ões do livro escolhido
		
			$bookId = $_POST["id_livro"];
			$bookId = 1;
	 
			$searchAllBooksByBookId = "SELECT * FROM livro WHERE id_livro = '$bookId' ";
			$resultSearchAllBooksByBookId = mysql_query($searchAllBooksByBookId);
			
			while( $row = mysql_fetch_array( $resultSearchAllBooksByBookId ) ) {
				$bookTitle       = $userArray['titulo_livro'] . "<br />";
				$bookStatus      = $userArray['estado_conserv'] . "<br />";
		 		$bookPublisher   = $userArray['editora'] . "<br />"; 
				$bookAuthor      = $userArray['autor'] . "<br />";
				$bookDescription = $userArray['descricao_livro'] . "<br />";
				$ownerId         = $userArray['id_dono'] . "<br />";
			}

			//Exibir 
			echo '<h6> <h1>' ;
			echo $bookTitlePrint;
			echo '</h1> </h6><br /><br />' ; 
			
			echo'<h6>Autor: '; 
			echo $bookAuthor;
			echo'</h6><br />';
			
			echo'<h6>Editora: ';
			echo $bookPublisher;
			echo'</h6><br />';
			
			
			echo'<h6>Descricao: ';
			echo $bookDescription;
			echo'</h6><br /><br />';
		?>
		
		<div id="formulario">
			<form name="comprarlivro" method="post" action="compralivro.php">
				<input type = "hidden" name="nome_comprador" value= "<?php echo $customerName; ?>" >
				<input type="hidden" name="tel_comprador" value= " <?php echo $customerPhone; ?>" >
				<input type="hidden" name="id_livro" value=" <?php echo $bookId; ?>" >
				<input type="hidden" name="id_dono" value=" <?php echo $ownerId; ?>" >
				<input type="submit" value="Comprar" />
				<label for="pergunta"></label>
			</form>
		</div>
		
		
		<div id="formulariotop"> 
			<form name="enviarpergunta" method="post" action="detalheslivro.php"> 
				<h6>Envie sua mensagem:</h6>
				<br>
				<textarea name="mural" value="mural" rows="5" cols="45" ></textarea>
				<input type="hidden" value="nome_comprador" name="nome_comprador">
				<input type="hidden" name="id_livro" value="<?php echo $bookId; ?>">
				<input type="submit" value="Enviar" />  
			</form>

		 	<br/><br/><br/>
		 
		 	<?php
		 		include "..\Dao\conexao_bd.inc";
					if(!$dataBaseAuthentication){
						die ("<h1>Falha no bd </h1>");
					}
			
				$searchAllBoardByBookId = "SELECT * FROM mural WHERE id_livro = '".$bookId."' ORDER BY id_comentario DESC" ;
				$resultSearchAllBoardByBookId = mysql_query( $searchAllBoardByBookId );
				
				while( $questionArray = mysql_fetch_array( $resultSearchAllBoardByBookId ) ) {
					echo $questionArray['nome_pergunta'];
					echo " disse: ";
					echo $questionArray['texto'];
					echo " <br /> <br />";
				}
			?> 
		</div>
	</body>
</html>