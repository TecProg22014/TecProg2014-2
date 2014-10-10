<?php
/**
 * Class with methods to validate data from forms
 **/
class ValidaDados {

        /**
         *  Constructor to permit an instance from the class
         **/
        public function __construct(){

        }

        /**
         *  Function to validate if the input of one form is null
         *  @param $field
         *  @return bool $resultNullOrNot, expected true if field is null
         **/
        public function validateNullInputs( $field ){
            return !( empty( $field ) );
        }
        
        /**
         *  Function to validate if the password is null
         *  @param Array $password, where $password[0] is the password and $password[1] is the password confirmation
         *  @return bool $passwordNullOrNot, expected true if password is null
         **/
        public function validateNullPassword( $password ){
            return ( !( empty( $password[0] ) ) && !( empty( $password[1] ) ) );
        }
        
        /**
         *  Function to validate if the name input is valid
         *  @param String $name
         *  @return int $nameValidOrNot
         **/
        public function validaNome( $name ){

            $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            
            for ( $i = 0; $i < strlen($name); $i++ ) { 
                $char = stripos( $validCharacters, $name[$i] );
                if( !$char ){
                    $nameValidOrNot = 1;
                    return $nameValidOrNot;
                }
                
                if( $name[$i] == " " && $name[$i+1] == " " ){
                    $nameValidOrNot = 2;
                    return $nameValidOrNot;   
                }
            }
        }
        
        /**
         *  Function to validate an email inputed
         *  @param email $email
         *  @return int $validEmail
         **/
        public function validaEmail( $email ){
           if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
                $validEmail = 1;
                return $validEmail;
           }
        }
        
        /**
         *  Function to validate the inputed fone number
         *  @param int $foneNumber
         *  @return $foneNotValidCharacters || $foneNotValidLength
         **/
        public function validaTelefone($foneNumber){
            
            if( !filter_var( $foneNumber, FILTER_VALIDATE_INT) ){
                $foneNotValidCharacters = 1;
                return $foneNotValidCharacters;
            }elseif( strlen( $foneNumber ) != 8 ){
                $foneNotValidLength = 2;
                return $foneNotValidLength;
            }
        }
        
        /**
         *  Function to validate the password typed
         *  @param Array $password, where $password[0] is the password and $password[1] is the password confirmation
         *  @return $passwordInvalidCharacters || $passwordInvalidLength || $invalidPasswordConfirmation
         **/
        public function validaSenha( $password ){

            if( !filter_var( $password[0], FILTER_VALIDATE_INT ) ){//caracter invalido
                return 1;
            }elseif( strlen( $password[0] ) != 6 || strlen( $password[1] ) != 6 ){//tamanho invalido
                return 2;
            }elseif( $password[0]!= $password[1] ){//senha e confirmação diferentes
                return 3;
            }
        }

}


?>
