<?php
session_start;
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
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
       
       <button ="button" onclick="home;">Home</button>
       <button ="button" onclick="login;">Login</button>
       
   </div>
    
    <br/>
    <br/>
    <br/>
    
    <form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeForm.php" method="post" ="formu">
        
                <table ='insr'>

                <tr>
                    <th ='titlein' > <h5>Cadastro de Usuário</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Nome: <input type="text" name="nome"/></h2> 
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h4> E-mail: <input type="text" name="email"/></h4>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h6> Telefone: <input type="text" name="telefone"/></h6> 
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h4> Senha: <input type="password" name="senha[]"/></h4> <p>
                    </td>    
                </tr>

                <tr>              
                    <td>
                        <h3> Confirmar Senha: <input type="password" name="senha[]"/></h3> <p>
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