<?php
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
	
	include_once "Header.php";
	$typeOfPage = "bookPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		
		<form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeFormLivro.php" method="post" class="Formulario">
			<table class='insr'>

				<tr>
					<th class='titlein' > 
						<h5>Deletar Livro</h5>
					</th>
				</tr>
			
				<tr>
					<td > 
						<h4> T&iacute;tulo: 
							<input type="text" name="titulo"/>
						</h4>
					</td>
				</tr>
					
				<th>
					<input type="hidden" name="tipo" value="excluiLivro"/>
					<input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
					<input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
				</th>
			</table>
		</form>
	</body>
</html>
