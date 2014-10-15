function livrosDisponiveis(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/livrosDisponiveis.php";
}

function meusLivros(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/meusLivros.php";
}

function home(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLogin.php";
}

function user(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexUsuario.php";
}

function cadastra(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarUsuario.php";
}

function altera(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/alteraUsuario.php";
}

function deleta(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/excluiUsuario.php";
}

function pesquisa(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/pesquisarUsuario.php";
}

function cadastraLivro(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/cadastrarLivro.php";
}

function pesquisaLivro() {
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/pesquisarLivro.php";
}

function deletaLivro() {
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/excluirLivro.php";
}

function livro(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLivro.php";
}
function login(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/entrarLogin.php";
}
function sair(){
    window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLogin.php";
}
function loginsuccessfully(id){
    window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLogin.php?idUser=id';
}
function loginfailed(){
    setTimeout("window.location='http://localhost/TecProg2014-2/SeboEletronico/Visao/entrarLogin.php'",0);
}