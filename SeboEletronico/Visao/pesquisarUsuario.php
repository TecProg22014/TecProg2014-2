<?php
	include_once "Header.php";
	$typeOfPage = "userPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		
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
