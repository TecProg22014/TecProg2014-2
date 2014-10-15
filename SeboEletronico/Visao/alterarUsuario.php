<?php
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
	$lastPassword = $_SESSION['senha'];
	include '../Controle/UsuarioControlador.php';
	$registryArray = UsuarioControlador::verifyRegisterById( $userIdAuthentication );
	
	include_once "Header.php";
	$typeOfPage = "userPage";
	Header::loadMenuOfPage( $typeOfPage );
?>
		<form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeForm.php" method="post" class="formu">
			
			<table class='insr'>
				<tr>
					<th class='titlein' >
						<h5>Alterar Cadastro</h5>
					</th>
				</tr>
					
				<tr> 
					<td>
						<h2> Nome:
							<input type="text" name="nome" value="<?php echo $registryArray['nome_usuario']; ?>"/>
						</h2> 
					</td>
				</tr>
			
				<tr>
					<td > 
						<h4> E-mail: 
							<input type="text" name="email" value="<?php echo $registryArray['email_usuario']; ?>"/>
						</h4>
					</td>
				</tr>
					
				<tr> 
					<td>
						<h6> Telefone: 
							<input type="text" name="telefone" value="<?php echo $registryArray['telefone_usuario']; ?>"/>
						</h6> 
					</td>
				</tr>

				<tr>			  
					<td>
						<h4> Senha: 
							<input type="password" name="senha[]" value="<?php echo $lastPassword; ?>"/>
						</h4>
					</td>	
				</tr>

				<tr>			  
					<td>
						<h3> Confirmar Senha: 
							<input type="password" name="senha[]" value="<?php echo $lastPassword; ?>"/>
						</h3>
					</td>	
				</tr>

				<th>
					<input type="hidden" name="tipo" value="alterar"/>
					<input type="hidden" name="senhaAntiga" value="<?php echo $lastPassword['codigo_senha']; ?>"/>
					<input type="hidden" name="id_pessoa" value="<?php echo $userIdAuthentication; ?>" />
					<input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
					<input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
				</th>
			</table>			
		</form>
	</body>
</html>