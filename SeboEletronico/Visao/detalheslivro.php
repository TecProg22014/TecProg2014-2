<?php
session_start();
$userIdAuthentication = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Sebo Eletrônico</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css" type="text/css" media="all">
	<link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css" type="text/css" media="all">
	<link rel="shortcut icon" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico">
	<script src="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js"></script> 
</head>
<body>
	<?php
		$_POST['mural'];			
		$_POST['nome_comprador'];
		$_POST ['id_livro'];
		
        $boardOfSale = $_POST['mural'];
			
		include "..\Utilidades\ConexaoComBanco.php";
		if( !$dataBaseConnection ) die ("<h1>Falha no bd </h1>");

		//Acessar Informações do comprador
		$bookId = $_POST['id_livro'];
		$userEmail = $_SESSION["email"];
		$searchAllUsersByEmail = "SELECT * FROM usuario WHERE email_usuario = '$userEmail' ";
		$resultSearchAllUsersByEmail = mysql_query( $searchAllUsersByEmail );

		while($arrayUser = mysql_fetch_array( $resultSearchAllUsersByEmail )) {
			$customerName = $arrayUser['nome_usuario'];
		}
		
		$insertNewBook = mysql_query("INSERT INTO mural (texto,nome_pergunta,id_livro) VALUES ('$boardOfSale', '$customerName', '$bookId')");

    ?>
  
    <div id="header">
		<div id="logo"><img src="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png" class="imgHeader"/></div>
    </div>
   
   <div id="mainmenu">
       
       <button class="button" onclick="home();">Home</button>
       <button class="button" onclick="user();">Usuario</button>
       <button class="button" onclick="livro();">Livro</button>
       <button class="button" onclick="login();">Login</button>
       
   </div>
   
 
 
 
 <?php
	   include "..\Utilidades\ConexaoComBanco.php";
	   if( !$dataBaseConnection ) die ("<h1>Falha no bd </h1>");
	   
		//Customer Information Acess
		$searchAllUsersByUserEmail = "SELECT * FROM usuario WHERE email_usuario = '".$userEmail."' ";
	  
		$resultSearchAllUsersByUserEmail = mysql_query( $searchAllUsersByUserEmail );
			
		while( $arrayUser = mysql_fetch_array( $resultSearchAllUsersByUserEmail )) {
			$customerName 	= $arrayUser['nome_usuario'] . "<br />";
			$customerPhone	=  $arrayUser['telefone_usuario'] . "<br />";		
		}
	 
		//Acessando informações do livro escolhido
		$bookId 				= $_POST["id_livro"];
		$bookId 				= 1;
		$searchAllBookByBookId 	= "SELECT * FROM livro WHERE id_livro = '$bookId' ";
	 
		$resultSearchAllBookByBookId = mysql_query( $searchAllBookByBookId  );

		while( $arrayBook = mysql_fetch_array( $resultSearchAllBookByBookId ) ) {
			$bookTitleSale 			= $arrayBook['titulo_livro'] . "<br />";
			$bookStatusSale 		= $arrayBook['estado_conserv'] . "<br />";
			$bookPublisherSale 		= $arrayBook['editora'] . "<br />"; 
			$bookAuthorSale 		= $arrayBook['autor'] . "<br />";
			$bookDescriptionSale 	= $arrayBook['descricao_livro'] . "<br />";
			$ownerId 				= $$arrayBook['id_dono'] . "<br />";
		}

	  
		//Show Book Date
		echo '<h6> <h1>' ;
		echo $bookTitleSale;
		echo '</h1> </h6><br /><br />' ; 

		echo'<h6>Autor: '; 
		echo $bookAuthorSale ;
		echo'</h6><br />';

		echo'<h6>Editora: ';
		echo $bookPublisherSale;
		echo'</h6><br />';


		echo'<h6>Descricao: ';
		echo $bookDescriptionSale;
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
			<br />
			<textarea name="mural" value="mural" rows="5" cols="45" ></textarea>
			<input type="hidden" value="nome_comprador" name="nome_comprador">
			<input type="hidden" name="id_livro" value="<?php echo $bookId; ?>">
			<input type="submit" value="Enviar" />  
		</form>

	<br/><br/><br/>
 
	<?php
		include "..\Dao\conexao_bd.inc";
		if( !$dataBaseConnection ) die ("<h1>Falha no bd </h1>");

		$searchAllBoardByBookIdOrderDesc 		= "SELECT * FROM mural WHERE id_livro = '".$bookId."' ORDER BY id_comentario DESC" ;
		$resultSearchAllBoardByBookIdOrderDesc 	= mysql_query( $searchAllBoardByBookIdOrderDesc );

		while($arrayBoard = mysql_fetch_array( $resultSearchAllBoardByBookIdOrderDesc )) {
		echo $arrayBoard['nome_pergunta'];
		echo " disse: ";
		echo $arrayBoard['texto'];
		echo " <br /> <br />";
	}
	?> 
      
   </div>

</body>
</html>