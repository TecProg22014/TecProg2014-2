<?php

 UsuarioControlador 

	
	salvaUsuario$nome, $email, $telefone, $senha
		$usuario
		$e
		UsuarioDao::salvaUsuario$usuario
	

	checaCadastroId$id
		UsuarioDao::getCadastradosPorId$id
	

	alterarCadastro$nome, $email, $telefone, $senha, $id, $senhaVelha
		$usuario
		$e
		UsuarioDao::alteraUsuario$usuario,$id, $senhaVelha

	

	deletaCadastro
		$email
		$senha
		UsuarioDao::deletaUsuario
	pesquisaUsuario
		$nome
		UsuarioDao::pesquisaUsuario