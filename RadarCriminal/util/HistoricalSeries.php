<?php

 class HistoricalSeries extends Parse{

 	
 public function getHistorialSeriesParse(){
		
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
			
			$criminality = utf8_encode("Criminalidade");
			$action = utf8_encode("Ação Policial");
			$transit = utf8_encode("Trânsito");
			
			/**
			 * Constants to auxiliate the third loop
			 */
			
			define("FIRST_LINE_SEARCH", 1);
			
			/**
			 * Loop to get the disponibles years
			 */
			for($columnSearchYear=1,$auxTempo = 0; $columnSearchYear<$numeroColunas; $columnSearchYear++){
				$isNotAYearLine = $this->isNotColumnOfYear($columnSearchYear);
				if($isNotAYearLine){
					$this->tempo[$auxTempo] = $this->dados->val(FIRST_LINE_SEARCH,$columnSearchYear);
					$auxTempo++;
				}else{
					
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
		
	}
	
	/**
	 * Function to validate if one colunm of historical series spreadsheet is not a column of years
	 * The columns 1,2 and 3 will be ignored because they are not years columns
	 * @param int $column_to_search
	 * @return TRUE if the column is a column of year
	 */
	private function isNotColumnOfYear($column_to_search){
		define("CRIMINALITY_COLUMN", 1);
		define("CRIMES_TYPES_COLUMN", 2);
		define("CRIMES_NAMES_COLUMN", 3);
		
		switch ($column_to_search){
			case CRIMINALITY_COLUMN:
					$yearLine = FALSE;
					break;
			case CRIMES_TYPES_COLUMN:
					$yearLine = FALSE;
					break;
			case CRIMES_NAMES_COLUMN;
					$yearLine = FALSE;
					break;
			default: $yearLine = TRUE;
		}
		
		return $yearLine;
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
}
