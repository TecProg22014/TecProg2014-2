<?php
include_once('C:/xampp/htdocs/mds2013/controller/TempoController.php');
class TempoView{
        private $tempoCO;
        public function __construct(){
                $this->tempoCO = new TempoController();
        }

        public function retornarDadosTempoFormatado(){
                return $this->tempoCO->_retornarDadosFormatados();
        }
        //Metodo duplicado para adaptacao do retorno de dados para a nova interface
        /**
         * @author Eduardo Augusto
         * @author Sergio Silva
         * @author Eliseu Egewarth
         * @copyright RadarCriminal 2013
         **/
        public function retornarDadosTempoFormatoNovo(){
                return $this->tempoCO->_retornarDadosFormatoNovo();
        }
}