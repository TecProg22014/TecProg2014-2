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
    
    <form  name="Insere Dados" action="http://localhost/TecProg2014-2/SeboEletronico/Utilidades/RecebeFormLivro.php" method="post" ="formu">
        
                <table ='insr'>

                <tr>
                    <th ='titlein' > <h5>Pesquisar Livro</h5></th>
                </tr>
        
                <tr>
                    <td > 
                        <h4> Título: <input type="text" name="titulo" required/></h4>
                    </td>
                </tr>
                
                <tr>              
                    <td>
                        <h4> Estado:</h4> 
                            <h3>
                                <input type="checkbox" name="novo" value="novo"/>Novo
                                <input type="checkbox" name="usado" value="usado"/>    Usado<br/>
                            <h3/>
                        
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h4> ificação:</h4> 
                            <h3>
                                <input type="checkbox" name="venda" value="venda"/>Venda
                                <input type="checkbox" name="troca" value="troca"/>    Troca<br/>
                            <h3/>
                        
                    </td>    
                </tr>

                <th>
                    <input type="hidden" name="tipo" value="pesquisaLivro"/>
                    <input type="submit" name='Enviar' value="Pesquisar" title='Pesquisar Livro' />
                </th>

                </table>    
        
    </form>
    
    
</body>


</html>



