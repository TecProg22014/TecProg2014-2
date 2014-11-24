<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

require_once $SERVER_ADRESS."/exceptions/ENomePlanilhaIncompativel.php";
require_once $SERVER_ADRESS."/exceptions/EPlanilhaSerieIncompativel.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieCategoria.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieNatureza.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieTempo.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieCrime.php";
require_once $SERVER_ADRESS."/libs/excel_reader2.php";


class Parse{
	/**
	 * Variables that contains the analyzed data.
	 * @var string $natureOfCrime
	 */
	private $nature;
	private $time;
	private $crime;
	private $category;
	private $data;
	private $total;
	private $region;
	
	public function __construct($file){
	
		$this->data = new Spreadsheet_Excel_Reader($SERVER_ADRESS."/files/".$planilha,"UTF-8");
		if($file == "série histórica - 2001 - 2012 2.xls"){
			$this->parseByHistorySerie();
		}
		else if($file == "JAN_SET_2011_12  POR REGIAO ADM_2.xls"){
			$this->parseByRegion();
		}
		else if($file == "Quadrimestre_final.2013.xls"){
			$this->parseDeQuadrimestre();
		}	
		
	
	}
	
	public function parseByHistorySerie(){
		
			$lines = 40;
			$columns = 15;
			//loop for count the nature
			for($i=0,$indexOfCategory=0;$i<$lines;$i++){
				
				if($i == 2){
					$this->category[$indexOfCategory] = $this->data->val($i,1,0);
					$indexOfCategory++;
				}
				if($i == 33){
					$this->category[$indexOfCategory] =  $this->data->val($i,1,0);
					$indexOfCategory++;
				}
				if($i == 38){
					$this->category[$indexOfCategory] =  $this->data->val($i,1,0);
				}
			}
			//loop to count the nature of the crime
			for($i=1,$indexOfNature=0; $i<$numeroLinhas; $i++){
				if(($i == 1)||($i == 5)||($i == 21)||($i == 27)||($i == 28)||($i == 31)||($i == 32)||($i == 37)||($i == 40)){
					continue;
				}
				else{	
					if($i>32){
						if($i<37){
							$this->nature[$this->__getCategory()[1]][$indexOfNature]= $this->data->val($i,'B',0);
						}else{
							$this->nature[$this->__getCategory()[2]][$indexOfNature]= $this->data->val($i,'B',0);
						}
					}else{
						if($i<32){
							$this->nature[$this->__getCategory()[0]][$indexOfNature]= $this->data->val($i,'C',0);
						}else if($i>32 && $i<37){
							$this->nature[$this->__getCategory()[1]][$indexOfNature]= $this->data->val($i,'C',0);
						}else{
							$this->nature[$this->__getCategory()[2]][$indexOfNature]= $this->data->val($i,'C',0);
						}
					}
					$indexOfNature++;
				}
			}
			
			$criminalidade = utf8_encode("Criminalidade");
			$acao = utf8_encode("Ação Policial");
			$transito = utf8_encode("Trânsito");
			//loop que pega os anos disponiveis
			for($i=1,$auxTempo = 0; $i<$numeroColunas; $i++){
				if(($i == 1)||($i == 2)||($i == 3)){
					continue;
				}else{
					$this->tempo[$auxTempo] = $this->dados->val(1,$i,0);
					$auxTempo++;
				}
			}
			if(($this->__getTempo() ==  null) || (count($this->__getTempo()) !=11)){
				throw EFalhaLeituraSerieTempo();
			}
			//loop que pega os dados do crime
			for($i=1,$auxLinha=0; $i<$numeroLinhas; $i++){	
				if(($i == 1)||($i == 5)||($i == 21)||($i == 27)||($i == 28)||($i == 31)||($i == 32)||($i == 37)||($i == 40)){
					continue;
				}else{	
					for($j=4,$auxColuna=0,$indexOfCategory; $j<$numeroColunas; $j++){
							if($i<32){
								$indexOfCategory = 0;
							}else if($i>32 && $i<37){
								$indexOfCategory = 1;
							}else{
								$indexOfCategory = 2;
							}
							$this->crime[$this->__getNatureza()[$this->__getCategoria()[$indexOfCategory]][$auxLinha]][$this->__getTempo()[$auxColuna]] = $this->dados->raw($i,$j,0);
							$auxColuna++;
					}
					$auxLinha++;
				}
			}
		
		
	}//fim do metodo parseDeSerieHistorica
	
	
	public function parsePorRegiao(){
		/**
		* Loop para pegar os nomes das categorias na planilha
		*/	
		for($i = 0, $indexOfCategory = 0;$i<45;$i++){
			if(($i==8)||($i==12)||($i==34)||($i==38)||($i==43)){
				$this->categoria[$indexOfCategory] = $this->dados->val($i,'A',1);
				$indexOfCategory++; 
			}else{
				continue;
			}
		}
		
		echo "<br>";
		/**
		* Loop para pegar os nomes das naturezas de crimes contidas na planilha de RA
		*/
		for($i=0,$indexOfNature=0;$i<45;$i++){
		 		// Val ÃƒÂ© o valor da cÃƒÂ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
		 		if($i>7 && $i<11){
		 			$this->natureza[$this->__getCategoria()[0]][$indexOfNature] =  $this->dados->val($i,'B',1);
		 			$indexOfNature++;
		 		}else if(($i>11 && $i<26) || ($i>26 && $i<32)){
		 			$this->natureza[$this->__getCategoria()[1]][$indexOfNature] =  $this->dados->val($i,'B',1);
		 			$indexOfNature++;
		 		}else if($i>33 && $i<36){
		 			$this->natureza[$this->__getCategoria()[2]][$indexOfNature] =  $this->dados->val($i,'B',1);
		 			$indexOfNature++;
		 		}else if($i>37 && $i<42){
		 			$this->natureza[$this->__getCategoria()[3]][$indexOfNature] =  $this->dados->val($i,'B',1);
		 			$indexOfNature++;
		 		}else if($i>42 && $i<45){
		 			$this->natureza[$this->__getCategoria()[4]][$indexOfNature] =  $this->dados->val($i,'B',1);
		 			$indexOfNature++;
		 		}else{
		 			continue;
		 		}
		}
		
		echo "<br>";
		/**
		 * Loop para pegar os nomes dos tempos contidas na planilha de RA
		 */
		for ($i=6, $auxTempo = 0; $i<8 ; $i++){ 
			$this->tempo[$auxTempo] = $this->dados->val(7,$i,1); 
			$auxTempo++;
		}
		
		echo "<br>";
		/**
		* Loop para pegar os nomes das regiões contidas na planilha RA
		*/
		for($i=0, $auxRegiao = 0; $i<3; $i++ ){
			if ($i==0) {
				$linha = 6;
				$numeroColunas = 25;
			}
			if($i==1){
				$linha = 55;
				$numeroColunas = 25;
			}
			if($i==2){
				$linha = 104;
				$numeroColunas = 29;
			}
			for ($j=0;$j<$numeroColunas ; $j++) { 
				if(($j<6) || ($j % 2 != 0)){
					continue;
				}else{
					$this->regiao[$auxRegiao] = $this->dados->val($linha,$j,1);
					$auxRegiao++;
				}
			}
		}
		//print_r($this->__getRegiao());
		echo "<br>";
		/**
		* Loop para pegar os dados de crime contidas na planila de RA da primeira parte
		*/
		for($i = 8, $auxLinha = 0, $auxRegiao = -1; $i<45; $i++){
			if(($i == 11) || ($i == 26) || ($i == 32) || ($i == 33) || ($i == 36) || ($i == 37) || ($i == 42)) {
				continue;
			}else{
				for($j = 6, $indexOfCategory = 0; $j<26; $j++){
					if(($j % 2) == 0){
						$auxTempo = 0;
						$auxRegiao++;
					}
					if(($j % 2) != 0){
						$auxTempo = 1;
					}
					if($auxRegiao == 10){
						$auxRegiao = 0;
					}
					if(($i>7 && $i<11)){
						$indexOfCategory = 0;
					}else if(($i>11 && $i<26) || ($i>26 && $i<32)){
						$indexOfCategory = 1;
					}else if(($i>33 && $i<36)){
						$indexOfCategory = 2;
					}else if(($i>37 && $i<42)){
						$indexOfCategory = 3;
					}else if(($i>42 && $i<45)){
						$indexOfCategory = 4;
					}
	
					$this->crime[$this->__getNatureza()[$this->__getCategoria()[$indexOfCategory]][$auxLinha]][$this->__getRegiao()[$auxRegiao]][$this->__getTempo()[$auxTempo]] = $this->dados->raw($i,$j,1);
				}
				$auxLinha++;
			}	
		}
		/**
		 * Loop para pegar os dados de crime contidas na planila de RA da segunda parte
		 */
		for($i = 57, $auxLinha = 0, $auxRegiao = 9; $i<94; $i++){
			if(($i == 60) || ($i == 75) || ($i == 81) || ($i == 82) || ($i == 85) || ($i == 86) || ($i == 91)) {
				continue;
			}else{
				for($j = 6, $indexOfCategory = 0; $j<26; $j++){
					if(($j % 2) == 0){
						$auxTempo = 0;
						$auxRegiao++;
					}
					if(($j % 2) != 0){
						$auxTempo = 1;
					}
					if($auxRegiao == 20){
						$auxRegiao = 10;
					}
					if(($i>56 && $i<60)){
						$indexOfCategory = 0;
					}else if(($i>75 && $i<81) || ($i>60 && $i<75)){
						$indexOfCategory = 1;
					}else if( ($i>82 && $i<85)){
						$indexOfCategory = 2;
					}else if(($i>86 && $i<91)){
						$indexOfCategory = 3;
					}else if(($i>91 && $i<94)){
						$indexOfCategory = 4;
					}
					$this->crime[$this->__getNatureza()[$this->__getCategoria()[$indexOfCategory]][$auxLinha]][$this->__getRegiao()[$auxRegiao]][$this->__getTempo()[$auxTempo]] = $this->dados->raw($i,$j,1);
				}
				$auxLinha++;
			}
		}
		/**
		 * Loop para pegar os dados de crime contidas na planila de RA da terceira parte
		 */
		for($i = 106, $auxLinha = 0, $auxRegiao = 19; $i<143; $i++){
			if(($i == 109) || ($i == 124) || ($i == 130) || ($i == 124) || ($i == 130) || ($i == 131) || ($i == 134) || ($i == 135) || ($i == 140)){
				continue;
			}else{
				for($j = 6, $indexOfCategory = 0; $j<30; $j++){
					if(($j % 2) == 0){
						$auxTempo = 0;
						$auxRegiao++;
					}
					if(($j % 2) != 0){
						$auxTempo = 1;
					}
					if($auxRegiao == 32){
						$auxRegiao = 20;
					}
					if(($i>105 && $i<109)){
						$indexOfCategory = 0;
					}else if(($i>109 && $i<124) || ($i>124 && $i<130)){
						$indexOfCategory = 1;
					}else if(($i>131 && $i<134)){
						$indexOfCategory = 2;
					}else if(($i>135 && $i<140)){
						$indexOfCategory = 3;
					}else if(($i>140 && $i<143)){
						$indexOfCategory = 4;
					}
					$this->crime[$this->__getNatureza()[$this->__getCategoria()[$indexOfCategory]][$auxLinha]][$this->__getRegiao()[$auxRegiao]][$this->__getTempo()[$auxTempo]] = $this->dados->raw($i,$j,1);
				}
				$auxLinha++;
			}
		}
		echo "<br>";
		//print_r($this->__getCrime());
	}
	/**
	*	Desenvolvimento do método para efetuar parse da planilha de quadrimestre
	*	@access public
	*/
	public function parseDeQuadrimestre(){
		$numeroLinhas = 41;
		$numeroColunas = 14;
		/**
		* Loop para pegar os nomes das categorias contidas na planilha
		*/	
		for($i=0,$indexOfCategory=0;$i<$numeroLinhas;$i++){
			if(($i == 8) || ($i == 12) || ($i == 34) || ($i == 35) || ($i == 36) || ($i == 37) || ($i == 39) ){
				$this->categoria[$indexOfCategory] = $this->dados->val($i,1,2);
				$indexOfCategory++;
			}else{
				continue;
			}
			
		}
		/**
		* Loop para pegar os nomes das naturezas contidas na planilha
		*/
		for($i=8,$indexOfNature=0;$i< $numeroLinhas;$i++){
		 		// Val ÃƒÂ© o valor da cÃƒÂ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
		 		if($i>7 && $i<11){
		 			$this->natureza[$this->__getCategoria()[0]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else if(($i>11 && $i<26) || ($i>26 && $i<31)){
		 			$this->natureza[$this->__getCategoria()[1]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else if($i==34){
		 			$this->natureza[$this->__getCategoria()[2]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else if($i==35){
		 			$this->natureza[$this->__getCategoria()[3]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else if($i==36){
		 			$this->natureza[$this->__getCategoria()[4]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else if($i==37){
		 			$this->natureza[$this->__getCategoria()[5]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else if($i>38 && $i<41){
		 			$this->natureza[$this->__getCategoria()[6]][$indexOfNature] =  $this->dados->val($i,'B',2);
		 			$indexOfNature++;
		 		}else{
		 			continue;
		 		}
		}
	
		/**		 
		* Loop que pega as informações sobre tempo da planilha
		*/
		for($i=6, $auxTempo = 0; $i<$numeroColunas; $i++){
			if(($i % 2) == 0){
				$this->tempo[2013][$auxTempo] = $this->dados->val(6,$i,2);
				$auxTempo++;
			}
		}
		/**
		* Loop que pega as informações do crime da planilha
		*/
		for($i = 0, $auxLinha = 0; $i<$numeroLinhas; $i++){
			if(($i < 8)||($i == 11)|| ($i == 26) || ($i == 31) || ($i == 32) || ($i == 33)|| ($i == 38)|| ($i == 41)){
				continue;
			}else{
				for($j = 6, $auxColuna = 0, $indexOfCategory = 0; $j<$numeroColunas; $j++){
					if(($j % 2) == 0){
						continue;
					}
					if($i>7 && $i<11){
						$indexOfCategory = 0;
					}else if(($i>11 && $i<26) || ($i>26 && $i<31)){
						$indexOfCategory = 1;
					}else if($i==34){
						$indexOfCategory = 2;
					}else if($i==35){
						$indexOfCategory = 3;
					}else if($i==36){
						$indexOfCategory = 4;
					}else if($i==37){
						$indexOfCategory = 5;
					}else if($i>38 && $i<41){
						$indexOfCategory = 6;
					}
					$this->crime[$this->__getNatureza()[$this->__getCategoria()[$indexOfCategory]][$auxLinha]][$this->__getTempo()[2013][$auxColuna]] = $this->dados->raw($i,$j,2);
					$auxColuna++;
				}
				$auxLinha++;
			}	
		}
	}
	public function __setNature($nature){
		$this->nature = $nature;
	}
	
	public function __getNature(){
		return $this->nature;
	}
	
	public function __setTime($time){
		$this->time = $time;
	}
	
	public function __getTimeo(){
		return $this->time;
	}
	
	public function __setCrime($crime){
		$this->crime = $crime;
	}
	
	public function __getCrime(){
		return $this->crime;
	}
	
	public function __setCategory($category){
		$this->category = $category;
	}
	
	public function __getCategory(){
		return $this->category;
	}

	public function __setRegion($region){
		$this->region = $region;
	}

	public function __getRegion(){
		return $this->region;
	}
}