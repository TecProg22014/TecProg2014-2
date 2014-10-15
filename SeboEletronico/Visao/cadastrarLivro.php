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
					<th class='titlein' > <h5>Cadastro de Livro</h5></th>
				</tr>
					
				<tr> 
					<td>
						<h2> T&iacute;tulo: 
							<input type="text" name="titulo" required/>
						</h2> 
					</td>
				</tr>
			
				<tr>
					<td > 
						<h2> Autor: 
							<input type="text" name="autor" required/>
						</h2>
					</td>
				</tr>
					
				<tr> 
					<td>
						<h4> Editora: 
							<input type="text" name="editora" required/>
						</h4>
					</td>
				</tr>

				<tr>			  
					<td>
						<h3> Edi&ccedil;&atilde;o: 
							<input type="number" name="edicao" min="1" max="20" step="1" value="1" required/>
						</h3> 
					</td>	
				</tr>
					
				<tr>			  
					<td>
						<h7> Descri&ccedil;&atilde;o: 
							<input type="textarea" name="descricao">
						</h7> 
					</td>	
				</tr>
					
				<tr>			  
					<td>
						<h2> Tipo(s) de opera&ccedil;&atilde;o: </h2>
						<h1>
							<input type="checkbox" name="venda" value="venda"/> Venda <br/>

							<input type="checkbox" name="troca" value="troca"/> Troca <br/>
						</h1>
					</td>	
				</tr>

				<tr>
					<td>
						<h2> Classifica&ccedil;&atilde;o: </h2>
						<h1>
							<input type="radio" name="genero" value="Engenharia" checked/> Engenharia <br/>

							<input type="radio" name="genero" value="Engenharia de Software"/> Engenharia de Software <br/>

							<input type="radio" name="genero" value="Engenharia de Energia"/> Engenharia de Energia <br/>

							<input type="radio" name="genero" value="Engenharia Eletronica"/> Engenharia Eletronica <br/>

							<input type="radio" name="genero" value="Engenharia Automotiva"/> Engenharia Automotiva <br/>

							<input type="radio" name="genero" value="Engenharia Aeroespacial"/> Engenharia Aeroespacial <br/>
						</h1>
					</td>
				</tr>
					
				<tr>			  
					<td>
						<h2> Estado:<h2/> 
						 <h1>
							 <input type="radio" name="estado" value="novo" checked/>Novo<br/>

							 <input type="radio" name="estado" value="usado"/>Usado<br/>
						 <h1/>
					</td>	
				</tr>
				
				<th>
					<input type="hidden" name="tipo" value="cadastraLivro"/>

					<input type="hidden" name="id_dono" value="<?php echo $id_usuario?>"/>

					<input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />

					<input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
				</th>
			</table>
		</form>
	</body>
</html>
