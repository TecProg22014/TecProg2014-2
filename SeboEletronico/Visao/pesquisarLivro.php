<?php
	include_once "Header.php";
	$typeOfPage = "bookPage";
	Header::loadMenuOfPage( $typeOfPage );	
?>
		
		<form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeFormLivro.php" method="POST" class="formu">
			<table class='insr'>
				<tr>
					<th class='titlein'>
						<h5>Pesquisar Livro</h5>
					</th>
				</tr>
			
				<tr>
					<td > 
						<h4> T&iacute;tulo:
							<input type="text" name="titulo" required/>
						</h4>
					</td>
				</tr>
					
				<tr>
					<td>
						<h4> Estado:</h4> 
						<h3>
							<input type="checkbox" name="novo" value="novo"/>Novo
							<input type="checkbox" name="usado" value="usado"/>Usado
							<br/>
						<h3/>
					</td>
				</tr>
					
				<tr>
					<td>
						<h4> Classifica&ccedil;&atilde;o:</h4> 
						<h3>
							<input type="checkbox" name="venda" value="venda"/>Venda
							<input type="checkbox" name="troca" value="troca"/>Troca<br/>
						<h3/>
					</td>
				</tr>

				<th>
					<input type="hidden" name="tipo" value="pesquisaLivro"/>
					<input type="submit" name='Enviar' value="Pesquisar" title='Pesquisar Livro' />
				</th>
			</table>
		</form>
	</body>
</html>
