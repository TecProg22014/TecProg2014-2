<?php

include '../Controle/LivroControlador.php';
$id = $_REQUEST['livros'];

$listaLivros = LivroControlador::getLivroById$id;

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
    
    
        
                <table ='insr'>

                <tr>
                    <th ='titlein' > <h5>Dados da Pesquisa de Livro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Título: </h2> 
                         <h6>
                                <?php echo $listaLivros['titulo_livro']?>
                         </h6>
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h2> Autor:</h2>
                        <h6>
                                <?php echo $listaLivros['autor']?>
                         </h6>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Editora: </h2>
                        <h6>
                                <?php echo $listaLivros['editora']?>
                         </h6>
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h2> Edição:</h2> 
                        <h6>
                                <?php echo $listaLivros['edicao']?>
                         </h6>
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Descrição: </h2>
                        <h6>
                                <?php echo $listaLivros['descricao_livro']?>
                        </h6>
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Tipos de operação: </h2>
                        <h6>
                                <?php echo $listaLivros['venda']?>
                            <?php echo $listaLivros['troca']?>
                        </h6>
                    </td>    
                </tr>

                <tr>
                    <td>
                        <h2> ificação: </h2>
                        <h6>
                                <?php echo $listaLivros['genero']?>
                        </h6>
                    </td>
                </tr>
                
                <tr>              
                    <td>
                        <h2> Estado:<h2/> 
                         <h6>
                             <?php echo $listaLivros['estado_conserv']?>
                         </h6>
                    </td>    
                </tr>

                <tr>              
                    <td>
                        <a href="http://localhost/TecProg2014-2/SeboEletronico/Visao/alterarLivro.php?id=<?php echo $id ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a>
                        <a href=" " title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" > </a>
                    </td>    
                </tr>
                

                </table>    
        
 
    
    
</body>


</html>
</body>
