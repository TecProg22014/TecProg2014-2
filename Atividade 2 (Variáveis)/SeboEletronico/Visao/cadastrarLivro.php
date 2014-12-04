<?php 
session_start;
$id_usuario = $_SESSION['id_usuario'];
 ?>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/LivrosStyle.css" type="text/css" media="all">
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
                    <th ='titlein' > <h5>Cadastro de Livro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Título: <input type="text" name="titulo" required/></h2> 
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h2> Autor: <input type="text" name="autor" required/></h2>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h4> Editora: <input type="text" name="editora" required/></h4>
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h3> Edição: <input type="number" name="edicao" min="1" max="20" step="1" value="1" required/></h3> 
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h7> Descrição: <input type="textarea" name="descricao"></h7> 
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Tipos de operação: </h2>
                        <h1>
                                        <input type="checkbox" name="venda" value="venda"/> Venda <br/>
                                        <input type="checkbox" name="troca" value="troca"/> Troca <br/>
                        </h1>
                    </td>    
                </tr>

                <tr>
                    <td>
                        <h2> ificação: </h2>
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
</body>
