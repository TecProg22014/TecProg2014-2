<?php 
session_start;
$id_usuario = $_SESSION['id_usuario'];
?>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/android.ico">
        <script src="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>
        
</head>
<body>
    <div id="header">
		<div id="logo"><img src="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/sebo_header.png" ="imgHeader"/></div>
    </div>
   
   <div id="mainmenu">
       
       <button ="button" onclick="sair;">Home</button>
       
   </div> 
    
    <br/>
    <br/>
    <br/>

        <form name="loginform" method="post" action="http://localhost/TecProg2014-2/SeboEletronico/Dao/autenticacaoUsuario.php">
            <table ='insr'>

                <tr>
                    <th ='titlein' > <h5>Login do Usuário</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h4> E-mail: <input type="text" name="email"/></h4> 
                    </td>
                </tr>
                <tr> 
                    <td>
                        <h4> Senha: <input type="password" name="senha"/></h4> 
                    </td>
                </tr>
                <th>
                    <input type="submit" value="Entrar" /><br><br>
                    <a href="cadastrarUsuario.php">Cadastre-se</a>
                </th>
            </table>
        </form>
    
</html>