<?php
include '../Utilidades/ConexaoComBanco.php';



$email = $_POST['email'];

$senha = $_POST['senha'];

$sql = mysql_query"SELECT * FROM usuario WHERE email_usuario = '".$email."'" or diemysql_error;
$sql2 = mysql_query"SELECT * FROM senha WHERE codigo_senha ='".$senha."'";
$row = mysql_num_rows$sql;
$row2 = mysql_num_rows$sql2;

/**
 * Getting data initializing session user in the system.
 * If $email and $senha are compatible log in is successful window.location window
 * */

$usuario = mysql_fetch_array$sql;
$idUsuario = $usuario['id_usuario'];
if$row == $row2
	if$row>0
		session_start;
		$_SESSION['email']= $email;
		$_SESSION['senha']= $senha;
		$_SESSION['id_usuario'] = $idUsuario;
		//echo "<script>alert'Seja bem vindo ao SEBO Eletronico!'</script>";
		echo"<script>window.location='http://localhost/SeboEletronicov2.0/Visao/indexLogin.php'</script>";
	}
}else
	echo "<script>alert'Email de usuario ou senha invalido, tente novamente!'</script>";
	echo "<script>  window.location='http://localhost/SeboEletronicov2.0/Visao/entrarLogin.php'</script>";
}
?>