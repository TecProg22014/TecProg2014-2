	
<?php
	class Header{
		public function loadMenuOfPage( $typeOfPage ){
			switch($typeOfPage){
				case "login":
					echo "
						<!DOCTYPE HTML>
						<html>
							<head>	
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css' type='text/css' media='all'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css' type='text/css' media='all'>
								<link rel='shortcut icon' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico'>
								<script src='http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js'></script> 
								<title>Sebo Eletr&ocirc;nico</title>	
							</head>

							<body>
								<div id='header'>
									<div id='logo'>
										<img src='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png' class='imgHeader' />
									</div>
								</div>
								<div id='mainmenu'>
									<button class='button' onclick='sair();'>Home</button>
								</div>
								
								<div id'breakPoint'></div>
					";
					break;
				
				case "bookPage":
					echo "
						<!DOCTYPE HTML>
						<html>
							<head>	
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css' type='text/css' media='all'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css' type='text/css' media='all'>
								<link rel='shortcut icon' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico'>
								<script src='http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js'></script> 
								<title>Sebo Eletr&ocirc;nico</title>	
							</head>

							<body>
								<div id='header'>
									<div id='logo'>
										<img src='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png' class='imgHeader' />
									</div>
								</div>
								<div id='mainmenu'>
									<button class='button' onclick='home();'>Home</button>
									<button class='button' onclick='user();'>Usu&aacute;rio</button>		
									<button class='button' onclick='livro();'>Livro</button>
									<button class='button' onclick='sair();'>Sair</button>
									
								</div>
								
								<div id='mainmenu'>
									<button class='button' onclick='meusLivros();'>Meus Livros</button>
									<button class='button' onclick='livrosDisponiveis();'>Livros Dispon&iacute;veis</button>
									<button class='button' onclick='cadastraLivro();'>Cadastrar</button>
									<button class='button' onclick='pesquisaLivro();'>Pesquisar</button>
								</div>
								
								<div id'breakPoint'></div>
					";
					break;
					
				case "loginOn":
					echo "
						<!DOCTYPE HTML>
						<html>
							<head>	
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css' type='text/css' media='all'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css' type='text/css' media='all'>
								<link rel='shortcut icon' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico'>
								<script src='http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js'></script> 
								<title>Sebo Eletr&ocirc;nico</title>	
							</head>

							<body>
								<div id='header'>
									<div id='logo'>
										<img src='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png' class='imgHeader' />
									</div>
								</div>
								<div id='mainmenu'>
									<button class='button' onclick='home();'>Home</button>
									<button class='button' onclick='user();'>Usu&aacute;rio</button>
									<button class='button' onclick='livro();'>Livro</button>
									<button class='button' onclick='login();'>Login</button>
								</div>
								
								<form name='loginform' method='post' action='http://localhost/TecProg2014-2/SeboEletronico/Dao/autenticacaoUsuario.php'>
									<table class='insr'>
										<tr>
											<th class='titlein' > 
												<h5>Login do Usu&aacute;rio</h5>
											</th>
										</tr>
										
										<tr> 
											<td>
												<h4> E-mail: 
													<input type='text' name='email'/>
												</h4> 
											</td>
										</tr>
										<tr> 
											<td>
												<h4> Senha: 
													<input type='password' name='senha'/>
												</h4> 
											</td>
										</tr>
										<th>
											<input type='submit' value='Entrar' />
											<br />
											<br />
											<a href='cadastrarUsuario.php'>Cadastre-se</a>
										</th>
									</table>
								</form>
								
								<div id'breakPoint'></div>
					";
					break;
				
				case "loginIn":
					echo "
						<!DOCTYPE HTML>
						<html>
							<head>	
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css' type='text/css' media='all'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css' type='text/css' media='all'>
								<link rel='shortcut icon' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico'>
								<script src='http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js'></script> 
								<title>Sebo Eletr&ocirc;nico</title>	
							</head>

							<body>
								<div id='header'>
									<div id='logo'>
										<img src='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png' class='imgHeader' />
									</div>
								</div>
								<div id='mainmenu'>
									<button class='button' onclick='home();'>Home</button>
									<button class='button' onclick='login();'>Login</button>
								</div>
								
								<div id'breakPoint'></div>
					";
					break;
				
				case "loginOut":
					echo "
						<!DOCTYPE HTML>
						<html>
							<head>	
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css' type='text/css' media='all'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css' type='text/css' media='all'>
								<link rel='shortcut icon' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico'>
								<script src='http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js'></script> 
								<title>Sebo Eletr&ocirc;nico</title>	
							</head>

							<body>
								<div id='header'>
									<div id='logo'>
										<img src='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png' class='imgHeader' />
									</div>
								</div>
								<div id='mainmenu'>
									<button class='button' onclick='home();'>Home</button>
									<button class='button' onclick='user();'>Usu&aacute;rio</button>
									<button class='button' onclick='livro();'>Livro</button>
									<button class='button' onclick='sair();'>Sair</button>
								</div>
								
								<div id'breakPoint'></div>
					";
					break;
				
				case "userPage":
					echo "
						<!DOCTYPE HTML>
						<html>
							<head>	
								<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css' type='text/css' media='all'>
								<link rel='stylesheet' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css' type='text/css' media='all'>
								<link rel='shortcut icon' href='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico'>
								<script src='http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js'></script> 
								<title>Sebo Eletr&ocirc;nico</title>	
							</head>

							<body>
								<div id='header'>
									<div id='logo'>
										<img src='http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png' class='imgHeader' />
									</div>
								</div>
								<div id='mainmenu'>
									<button class='button' onclick='home();'>Home</button>
									<button class='button' onclick='user();'>Usu&aacute;rio</button>
									<button class='button' onclick='livro();'>Livro</button>
									<button class='button' onclick='login();'>Login</button>
								</div>
								
								<div id='mainmenu'>	
									<button class='button' onclick='altera();'>Alterar</button>		
									<button class='button' onclick='deleta();'>Deletar</button> 
									<button class='button' onclick='pesquisa();'>Pesquisar</button>
								</div>
								
								<div id'breakPoint'></div>
					";
					break;
				default:
			}
		}
	}
?>