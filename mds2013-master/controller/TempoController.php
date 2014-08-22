<?php
include_once('C:/xampp/htdocs/mds2013/persistence/TempoDAO.php');
include_once('C:/xampp/htdocs/mds2013/model/Tempo.php');
class TempoController{
        private $tempoDAO;
        
        public function __construct(){
                $this->tempoDAO = new TempoDAO();
        }
     
        public function _listarTodos(){
                return $this->tempoDAO->listarTodos();
        }
        public function _listarTodasEmOrdem(){
                return $this->tempoDAO->listarTodasEmOrdem();
        }
        public function __constructTeste(){
        	$this->tempoDAO->__constructTeste();
        }
        public function _consultarPorId($id){
                return $this->tempoDAO->consultarPorId($id);
        }
        public function _consultarPorIntervalo($intervalo){
                return $this->tempoDAO->consultarPorIntervalo($intervalo);
        }
        public function _inserirTempo(Tempo $tempo){
                return $this->tempoDAO->inserirTempo($tempo);
        }
        public function _inserirTempoArrayParse($arrayTempo){
                for($i=0;$i<count($arrayTempo);$i++){
                        $dadosTempo = new Tempo();
                        $dadosTempo->__setIntervalo($arrayTempo[$i]);
                        $this->tempoDAO->inserirTempo($dadosTempo);
                }
        }
        public function _inserirTempoArrayParseQuadrimestral($arrayTempo){
        	for($i=0, $arrayAno = $arrayTempo;$i<count($arrayTempo);$i++){
        		$ano = key($arrayAno);
        		$dadosTempo = new Tempo();
        		$dadosTempo->__setIntervalo($ano);
        		for($j=0;$j<count($arrayTempo[$ano]);$j++){
        			$dadosTempo->__setMes($arrayDadosTempo[$ano][$j]);
        			$this->tempoDAO->inserirTempo($dadosTempo);
        		}
        		next($arrayAno);
        	}
        }
        public function _retornarDadosFormatados(){
                $dadosTempo = new Tempo();
                $arrayDadosTempo = $this->_listarTodos();
                for($i=0; $i<count($arrayDadosTempo);$i++){
                        $dadosTempo = $arrayDadosTempo[$i];
                        $dados[$i] = $dadosTempo->__getIntervalo();
                }
                return "labels : [\"$dados[0]\",\"$dados[1]\",\"$dados[2]\",\"$dados[3]\",\"$dados[4]\",\"$dados[5]\",\"$dados[6]\",\"$dados[7]\",\"$dados[8]\",\"$dados[9]\",\"$dados[10]\"]";
        }
//Metodo duplicado para adaptacao do retorno de dados para a nova interface
/**
* @author Eduardo Augusto
* @author Sergio Silva
* @author Eliseu Egewarth
* @copyright RadarCriminal 2013
**/        
/*        public function _retornarDadosFormatoNovo(){
                $dadosTempo = new Tempo();
                $arrayDadosTempo = $this->_listarTodos();
                for($i=0; $i<count($arrayDadosTempo);$i++){
                        $dadosTempo = $arrayDadosTempo[$i];
                        $dados[$i] = $dadosTempo->__getIntervalo();
                }
                return "labels : [\"$dados[0]\",\"$dados[1]\",\"$dados[2]\",\"$dados[3]\",\"$dados[4]\",\"$dados[5]\",\"$dados[6]\",\"$dados[7]\",\"$dados[8]\",\"$dados[9]\",\"$dados[10]\"]";
        }*/
}