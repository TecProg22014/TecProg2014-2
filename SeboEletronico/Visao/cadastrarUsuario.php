<?php
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
	
	include_once "Header.php";
	$typeOfPage = "userPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		<form name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeForm.php" method="post" class="formu">
			<table class='insr'>
				<tr>
					<th class='titlein' > 
						<h5>Cadastro de Usu&aacute;rio</h5>
					</th>
				</tr>
				
				<tr> 
					<td>
						<h2> Nome: 
							<input type="text" name="nome"/>
						</h2> 
					</td>
				</tr>
		
				<tr>
					<td > 
						<h4> E-mail: 
							<input type="text" name="email"/>
						</h4>
					</td>
				</tr>
				
				<tr> 
					<td>
						<h6> Telefone: 
							<input type="text" name="telefone"/>
						</h6> 
					</td>
				</tr>

				<tr>			  
					<td>
						<h4> Senha: 
							<input type="password" name="senha[]"/>
						</h4>
					</td>	
				</tr>

				<tr>			  
					<td>
						<h3> Confirmar Senha: 
							<input type="password" name="senha[]"/>
						</h3>
					</td>	
				</tr>

				<th>
					<input type="hidden" name="tipo" value="cadastrar"/>
					<input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
					<input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
				</th>
			</table>
	   </form>
    </body>
</html>