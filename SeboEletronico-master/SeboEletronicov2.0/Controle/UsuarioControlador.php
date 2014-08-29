<?php

include '../Modelo/Usuario.php';

class UsuarioControlador {
    
        /**
        * The function salvaUsuario is for create a new user for acess.
        *
        */
        public function salvaUsuario($nome, $email, $telefone, $senha){
            try{
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::salvaUsuario($usuario);
        }

        /**
        * The function checaCadastroId check if the user exist in data base.
        *
        */
        public function checaCadastroId($id){
            return UsuarioDao::getCadastradosPorId($id);
        }

        /**
        * The function alterarCadastro update some information of the user.
        *
        */
        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
            try{
                
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha);
        
        }
        
        /**
        * The function deletaCadastro is for delete an user from the data base.
        *
        */
        public function deletaCadastro($email, $senha){
   
            return UsuarioDao::deletaUsuario($email, $senha);
   
        }

        /**
        * The function perquisaUsuario is for return an user of the data base by the attribute name.
        *
        */
        public function pesquisaUsuario($nome){
            return UsuarioDao::pesquisaUsuario($nome);
        } 
}

?>
