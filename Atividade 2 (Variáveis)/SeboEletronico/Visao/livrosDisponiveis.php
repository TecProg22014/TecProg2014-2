<?php
session_start;
include '../Controle/LivroControlador.php';
$id = $_SESSION['id_usuario'];

$listaLivros = LivroControlador::getAllLivro;
?>

<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/TecProg2014-2/SeboEletronico/Visao/css/MeusLivrosStyle.css" type="text/css" media="all">
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
        <!-- tr = linha
             td = coluna-->
                <table ='insr'>

                <tr>
                    <th ='titlein' > <h5>Livros Disponíveis</h5></th>
                </tr>
  <?php each$listaLivros as $chave => $valor 
                          ?>              
                <tr> 
                    <td>
                        <h2> Título: </h2> 
                         <h6>
                             <a href="http://localhost/TecProg2014-2/SeboEletronico/Visao/detalhesLivro.php?id_livro=<?php echo $valor['id_livro'] ?>"> <?php echo $valor['titulo_livro'] ?></a>
                         </h6>
                    </td>
                </tr>
      <?php }?>         

                </table>    
        
 
    
    
</body>


</html>
</body>
