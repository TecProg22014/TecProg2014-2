<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/SeboEletronico";
include $SERVER_ADRESS.'/Controle/UsuarioControlador.php';

switch($_POST['tipo']){
      
      case "cadastrar":  $nome = $_POST['nome'];
                         $email = $_POST['email'];
                         $telefone = $_POST['telefone'];
                         $senha = $_POST['senha'];
                         
                         UsuarioControlador::salvaUsuario($nome, $email, $telefone, $senha);
                         ?>

                            <script language="Javascript" type="text/javascript">
                                alert("Usuario cadastrado com sucesso!!");
                            </script>      
                            
                            <script language = "Javascript">
                            window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/entrarLogin.php";
                            </script>
                         <?php
                            
                          break;
                      
      case "alterar":   $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];
                        $id = $_POST['id_pessoa'];
                        $senhaVelha = $_POST['senhaAntiga'];
                        
                        UsuarioControlador::alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha);
                        ?>
                            
                            <script language="Javascript" type="text/javascript">
                                alert("Usuario alterado com sucesso!!");
                            </script>      
                            
                            <script language = "Javascript">
                                window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/indexLogin.php";
                            </script>
                           
                        <?php
                        
                    break;
      case "deletar": $email = $_POST['email'];
                      $senha = $_POST['senha'];
                      
                      UsuarioControlador::deletaCadastro($email,$senha);
                      ?>
                            <script language="Javascript" type="text/javascript">
                                alert("Usuario excluido  com sucesso!!");
                            </script>   
                            
                            <script language = "Javascript">
                                window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/site.php";
                            </script>
                      <?php
                    break;
      case "pesquisar": $nome = $_POST['nome'];
                        
                        
                      ?>
                            <script language = "Javascript">
                            window.location="http://localhost/TecProg2014-2/SeboEletronico/Visao/usuarioPesquisado.php?nome=<?php echo $nome?>";
                            </script><?php
            
                    break;
      
    }
?>
