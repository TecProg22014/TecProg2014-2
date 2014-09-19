<?php

	include "/Dao/conexao_bd.inc";
	if(!$dbConnection) die ("<h1>Falha na conexão com o Banco de Dados </h1>");
		
	$findBooksOfUser8 = "SELECT * FROM livro WHERE id_dono = '8'";
        $resultFindBooksOfUser8 = mysql_query($findBooksOfUser8);
        $cont = 0;
        $bookArray = mysql_fetch_assoc($resultFindBooksOfUser8);
        var_dump($bookArray);
	?> 
	
	<input type=button value="Compre" onClick="alert('Compra feita com Sucesso')">

	<a id="myLink" href="add_carrinho.php" onclick="fazer();">Comprar</a>
		