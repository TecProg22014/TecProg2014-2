<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

require_once $SERVER_ADRESS."/exceptions/ENomePlanilhaIncompativel.php";
require_once $SERVER_ADRESS."/exceptions/EPlanilhaSerieIncompativel.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieCategoria.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieNatureza.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieTempo.php";
require_once $SERVER_ADRESS."/exceptions/EFalhaLeituraSerieCrime.php";
require_once $SERVER_ADRESS."/libs/excel_reader2.php";

/**
 * This class is responsible for analyzing / reading 
 * the crime data provided by the secretary of state for public safety.
 *
 */

class Parse{
	/**
	 * Variables that contains the analyzed data.
	 * @var string $natureOfCrime
	 */
	private $natureza;
	private $tempo;
	private $crime;
	private $categoria;
	private $dados;
	private $total;
	private $regiao;
	
	public function __construct($planilha){
	
		$this->dados = new Spreadsheet_Excel_Reader($SERVER_ADRESS."/files/".$planilha,"UTF-8");
		if($planilha == "série histórica - 2001 - 2012 2.xls"){
			$this->parseDeSerieHistorica();
		}
		else if($planilha == "JAN_SET_2011_12  POR REGIAO ADM_2.xls"){
			$this->parsePorRegiao();
		}
		else if($planilha == "Quadrimestre_final.2013.xls"){
			$this->parseDeQuadrimestre();
		}	
		
	
	}
	//ParsePorSerieHistorica 
	public function parseDeSerieHistorica(){
		
			$numeroLinhas = 40;
			$numeroColunas = 15;
			
			/**
			 * Constants to auxiliate the first loop, all the costants values represents one line of the historical series spreadsheet
			 */
			define("FIRST_TABLE_COLUN", 1);
			define("MURDER", 2);
			define("DRUGS_TRAFFIC", 33);
			define("INJURY", 38);
			/**
			 * Loop to get the category of crime name
			 * @var $rowForCategory - Local variable that represent the row of the spreadsheet analyzed
			 */
			for($rowForCategory=0,$indexOfCategory=0;$rowForCategory<$numeroLinhas;$rowForCategory++){
				
				if($rowForCategory == MURDER){
					$this->categoria[$indexOfCategory] = $this->dados->val($rowForCategory,FIRST_TABLE_COLUN);
					$indexOfCategory++;
				}
				if($rowForCategory == DRUGS_TRAFFIC){
					$this->categoria[$indexOfCategory] =  $this->dados->val($rowForCategory,FIRST_TABLE_COLUN);
					$indexOfCategory++;
				}
				if($rowForCategory == INJURY){
					$this->categoria[$indexOfCategory] =  $this->dados->val($rowForCategory,FIRST_TABLE_COLUN);
				}
			}
			
			/**
			 * Constants to auxiliate the second loop
			 */
			
			define("SPREADSHEET_COLUMN_B", 'B');
			define("SPREADSHEET_COLUMN_C", 'C');
			
			/**
			 * Loop to get the nature of one commited crime.
			 * The lines 1,5,21,27,28,31,32,37 and 40 will be ignored because they have total values
			 * @var $rowForNature
			 */
			for($rowForNature=1,$indexOfNature=0; $rowForNature<$numeroLinhas; $rowForNature++){
				$notTotalLine = $this->isNotLineOfTotal($rowForNature);
				if($notTotalLine){
					if($rowForNature>32){
						if($rowForNature<37){
							$this->natureza[$this->__getCategoria()[1]][$indexOfNature]= $this->dados->val($rowForNature,'SPREADSHEET_COLUMN_B');
						}else{
							$this->natureza[$this->__getCategoria()[2]][$indexOfNature]= $this->dados->val($rowForNature,'SPREADSHEET_COLUMN_B');
						}
					}else{
						if($rowForNature<32){
							$this->natureza[$this->__getCategoria()[0]][$indexOfNature]= $this->dados->val($rowForNature,'SPREADSHEET_COLUMN_C');
						}else if($rowForNature>32 && $rowForNature<37){
							$this->natureza[$this->__getCategoria()[1]][$indexOfNature]= $this->dados->val($rowForNature,'SPREADSHEET_COLUMN_C');
						}else{
							$this->natureza[$this->__getCategoria()[2]][$indexOfNature]= $this->dados->val($rowForNature,'SPREADSHEET_COLUMN_C');
						}
					}
					$indexOfNature++;
				}
				else{	
					
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
	
	/**
	*	Desenvolvimento do m�todo para efetuar parse da planilha de crimes por Regi�o Administrativa
	*	@access public
	*	@author Lucas Carvalho
	*	@tutorial M�todo realizado durante sprint 4, atualizando arrays para cada campo, para depois ir para persist�ncia.
	*/
	public function parsePorRegiao(){
		/**
		* Loop para pegar os nomes das categorias na planilha
		* @author Lucas Carvalho 
		*/	
		for($i = 0, $indexOfCategory = 0;$i<45;$i++){
			if(($i==8)||($i==12)||($i==34)||($i==38)||($i==43)){
				$this->categoria[$indexOfCategory] = $this->dados->val($i,'A',1);
				$indexOfCategory++; 
			}else{
				continue;
			}
		}
		//print_r($this->__getCategoria());
		echo "<br>";
		/**
		* Loop para pegar os nomes das naturezas de crimes contidas na planilha de RA
		* @author Lucas Carvalho 
		*/
		for($i=0,$indexOfNature=0;$i<45;$i++){
		 		// Val Ã© o valor da cÃ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
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
		//print_r($this->__getNatureza());
		echo "<br>";
		/**
		 * Loop para pegar os nomes dos tempos contidas na planilha de RA
		 * @author Lucas Carvalho
		 */
		for ($i=6, $auxTempo = 0; $i<8 ; $i++){ 
			$this->tempo[$auxTempo] = $this->dados->val(7,$i,1); 
			$auxTempo++;
		}
		
		//print_r($this->__getTempo());
		echo "<br>";
		/**
		* Loop para pegar os nomes das regi�es contidas na planilha RA
		* @author Lucas Carvalho
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
		* @author Lucas Carvalho
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
		 * @author Lucas Carvalho
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
		 * @author Lucas Carvalho
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
	*	Desenvolvimento do m�todo para efetuar parse da planilha de quadrimestre
	*	@access public
	*/
	public function parseDeQuadrimestre(){
		$numeroLinhas = 41;
		$numeroColunas = 14;
		/**
		* Loop para pegar os nomes das categorias contidas na planilha
		* @author Lucas Carvalho
		* @tutorial Refatora��o do metodo antes implementados por outros autores 	 
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
		* @author Lucas Carvalho
		* @author S�rgio Bezerra
		* @tutorial Refatora��o para ajustar dimen��es do vetor natureza para diminuir a complexidade de popula��o do vetor
		*/
		for($i=8,$indexOfNature=0;$i< $numeroLinhas;$i++){
		 		// Val Ã© o valor da cÃ©lula que esta sendo armazenado na nova tabela val(linha, coluna, sheet)
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
		* Loop que pega as informa��es sobre tempo da planilha
		* @author Lucas Carvalho
		*/
		for($i=6, $auxTempo = 0; $i<$numeroColunas; $i++){
			if(($i % 2) == 0){
				$this->tempo[2013][$auxTempo] = $this->dados->val(6,$i,2);
				$auxTempo++;
			}
		}
		/**
		* Loop que pega as informa��es do crime da planilha
		* @author Lucas Carvalho 
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
	
	/**
	 * Function to validate if one line of historiacal series spreadsheet is not a line of total values.
	 * The lines 1,5,21,27,28,31,32,37 and 40 will be ignored because they have total values
	 * @param int $line_to_search
	 * @return TRUE if the line is not a line of totals
	 */
	public function isNotLineOfTotal($line_to_search){
		define("TITLES", 1);
		define("TOTAL_CRIMES_AGAINST_CITIZENS", 5);
		define("TOTAL_THEFT", 21);
		define("TOTAL_STEALING", 27);
		define("TOTAL_AGAINST_PUBLIC_HERITAGE", 28);
		define("TOTAL_CRIMES_AGAINST_SEXUAL_DIGINITY", 31);
		define("SUM_TOTAL_CRIMINALITY", 32);
		define("TOTAL_COPS_ACTIONS", 37);
		define("TOTAL_TRANSIT_CRIMES", 40);
		/**
		 * SWITCH to see if the line passed is one of the lines of total values
		 */
		switch ($line_to_search){
			case TITLES: 
						$totalLine = FALSE;
						break;
			case TOTAL_CRIMES_AGAINST_CITIZENS: 
						$totalLine = FALSE;
						break;
			case TOTAL_THEFT:
						$totalLine = FALSE;
						break;
			case TOTAL_STEALING:
						$totalLine = FALSE;
						break;
			case TOTAL_AGAINST_PUBLIC_HERITAGE:
						$totalLine = FALSE;
						break;
			case TOTAL_CRIMES_AGAINST_SEXUAL_DIGINITY:
						$totalLine = FALSE;
						break;
			case SUM_TOTAL_CRIMINALITY:
						$totalLine = FALSE;
						break;
			case TOTAL_COPS_ACTIONS:
						$totalLine = FALSE;
						break;
			case TOTAL_TRANSIT_CRIMES:
						$totalLine = FALSE;
						break;
			default:	$totalLine = TRUE;
		}
		
		return $totalLine;
	}
	
	
	public function __setNatureza($natureza){
		$this->natureza = $natureza;
	}
	
	public function __getNatureza(){
		return $this->natureza;
	}
	
	public function __setTempo($tempo){
		$this->tempo = $tempo;
	}
	
	public function __getTempo(){
		return $this->tempo;
	}
	
	public function __setCrime($crime){
		$this->crime = $crime;
	}
	
	public function __getCrime(){
		return $this->crime;
	}
	
	public function __setCategoria($categoria){
		$this->categoria = $categoria;
	}
	
	public function __getCategoria(){
		return $this->categoria;
	}

	public function __setRegiao($regiao){
		$this->regiao = $regiao;
	}

	public function __getRegiao(){
		return $this->regiao;
	}
}