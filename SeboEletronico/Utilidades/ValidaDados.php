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
            define("FIELD_NOT_NULL",true);
            define("FIELD_NULL",false);
            // The ! operator is used because the function "empty" returns the oposit value of boolean
            if(!empty($field)){
                return FIELD_NOT_NULL;
            }else{
                return FIELD_NULL;
            }
        }
        
        /**
         *  Function to validate if the password is null
         *  @param Array $password, where $password[0] is the password and $password[1] is the password confirmation
         *  @return bool true or false, expected false if password is null
         **/
        public function validateNullPassword( $password ){
            define("PASSOWORD_NOT_NULL",true);
            define("PASSWORD_NULL",false);
            // The ! operator is used because the function "empty" returns the oposit value of boolean
            if(!empty($password[0]) && !empty($password[1])){
                return PASSOWORD_NOT_NULL;
            }else{
                return PASSWORD_NULL;
            }
        }
        
        /**
         *  Function to validate if the name input is valid
         *  @param String $name
         *  @return int $nameValidOrNot
         **/
        public function validateName( $name ){
            define("INVALID_CHARACTERS_IN_NAME",1);
            define("INVALID_NAME", 2);

            // List of all characters that can be used
            $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            // Loop to read all the characters of the string $name
            for ( $iterator = 0; $iterator < strlen($name); $iterator++ ) { 
                // variable to recive the boolean value of character when valid(true) or not(false)
                $character = stripos( $validCharacters, $name[$iterator] );
                
                if( !$character ){
                    return INVALID_CHARACTERS_IN_NAME;
                }else if( $name[$iterator] == " " && $name[$iterator+1] == " " ){
                    return INVALID_NAME
                }else{
                }
            }
        }
        
        /**
         *  Function to validate an email inputed
         *  @param email $email
         *  @return int $validEmail
         **/
        public function validateEmail( $email ){
           define("INVALID_EMAIL", 1);
           if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
                return INVALID_EMAIL;
           }else{
           }
        }
        
        /**
         *  Function to validate the inputed fone number
         *  @param int $foneNumber
         *  @return $foneNotValidCharacters || $foneNotValidLength
         **/
        public function validatePhoneNumber($foneNumber){
            define("INVALID_PHONE_CHARACTERS", 1);
            define("INVALID_PHONE_LENGTH", 2);
            if( !filter_var( $foneNumber, FILTER_VALIDATE_INT) ){
                return INVALID_PHONE_CHARACTERS;
            }elseif( strlen( $foneNumber ) != 8 ){
                return INVALID_PHONE_LENGTH;
            }
        }
        
        /**
         *  Function to validate the password typed
         *  @param Array $password, where $password[0] is the password and $password[1] is the password confirmation
         *  @return $passwordInvalidCharacters || $passwordInvalidLength || $invalidPasswordConfirmation
         **/
        public function validatePassword( $password ){
            define("INVALID_PASSWORD_CHARACTERS", 1);
            define("INVALID_PASSWORD_LENGHT", 2);
            define("DIFERENT_PASSWORD_AND_CONFIRMATION", 3);
            if( !filter_var( $password[0], FILTER_VALIDATE_INT ) ){//caracter invalido
                return INVALID_FONE_CHARACTERS;
            }elseif( strlen( $password[0] ) != 6 || strlen( $password[1] ) != 6 ){//tamanho invalido
                return INVALID_PASSWORD_LENGHT;
            }elseif( $password[0]!= $password[1] ){//senha e confirmação diferentes
                return DIFERENT_PASSWORD_AND_CONFIRMATION;
            }
        }

}


?>
