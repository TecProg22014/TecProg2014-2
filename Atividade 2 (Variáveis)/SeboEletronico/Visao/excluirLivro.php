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
       <button ="button" onclick="home">Home</button>
       <button ="button" onclick="user;">Usuário</button>       
       <button ="button" onclick="livro;">Livro</button>
       <button ="button" onclick="sair;">Sair</button>
       
   </div>
    
    <div id="mainmenu">
       
       <button ="button" onclick="meusLivros;">Meus Livros</button>
       <button ="button" onclick="livrosDisponiveis;">Livros Disponiveis</button>
       <button ="button" onclick="cadastraLivro;">Cadastrar</button>
       <!--<button ="button" onclick="deletaLivro;">Deletar</button>-->
       <button ="button" onclick="pesquisaLivro;">Pesquisar</button>
   </div>
    
    <br/>
    <br/>
    <br/>
    
    <form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeFormLivro.php" method="post" ="Formulario">
        
                <table ='insr'>

                <tr>
                    <th ='titlein' > <h5>Deletar Livro</h5></th>
                </tr>
        
                <tr>
                    <td > 
                        <h4> Título: <input type="text" name="titulo"/></h4>
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

