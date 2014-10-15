<?php
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
?>
		
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
			//#REFACTOR: Send to a method in the persistence layer
			$searchAllUsersByOwerId = "SELECT * FROM usuario WHERE id_usuario = '$ownerId' ";
			
			$resultSearchAllUsersByOwerId = mysql_query( $searchAllUsersByOwerId );
					
			while( $searchAllUsersByUserEmail = mysql_fetch_array( $resultSearchAllUsersByOwerId ) ) {
				$customerEmail = $searchAllUsersByUserEmail['email_usuario'] . "<br />";
			}
			//#REFACTOR: endRefactor
			
			//#REFACTOR: Send to a method in the persistence layer
			include '../Modelo/Usuario.php';
			include "..\Utilidades\ConexaoComBanco.php";
			
			if(!$bd){
				die ("<h1>Falha no bd </h1>");
			}
				
			$updateBookByOperationFive = "UPDATE livro SET operacao = 'V' WHERE id_livro = $bookId ";
			$resultUpdateBookByOperationFive = mysql_query( $updateBookByOperationFive );
			//#REFACTOR: endRefactor
		?>
	</body>
</html>