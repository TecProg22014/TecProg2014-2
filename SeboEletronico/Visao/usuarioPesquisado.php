<?php 
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
	
	include '../Controle/UsuarioControlador.php';
	$fullUserName = $_REQUEST['nome'];
	$resultSearchUserByName = UsuarioControlador::pesquisaUsuario( $fullUserName );
	
	include_once "Header.php";
	$typeOfPage = "userPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		
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
							echo $resultSearchUserByName[1];
						?>
					</center> 
				</td>
			</tr>
					
			<tr>
				<td > 
					<center> Telefone :
						<?php
							echo $resultSearchUserByName[3];
						?>
					</center> 
				</td>
			</tr>
					
			<tr>
				<td>
					<center> Email:
						<?php
							echo $resultSearchUserByName[4];
						?>
					</center>
				</td>
			</tr>
		</table>
	</body>
</html>
