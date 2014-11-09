<?php
	
	public class HistoricalSeries extends Parse{
			define('NUMBER_OF_LINES', 40); //Number of Lines of Spreadsheet 'Serie Historica 2001-2010'
			define('NUMBER_OF_COLUMNS', 15); //Number of Columns of Spreadsheet 'Serie Historica 2001-2010'
			
			//Numbers of columns that should be read differently
			define('CRIMINALITY_TYPE_CRIMINALIDADE', 2); //Type of offense: 'Criminalidade'
			define('CRIMINALITY_TYPE_ACAO_POLICIAL', 33); //Type of offense: 'Ação Policial'
			define('CRIMINALITY_TYPE_TRANSITO', 38); //Type of offense: 'Transito'
			
			public function 
			for( $i=0,$indexOfCategory=0; $i<NUMBER_OF_LINES; $i++ ){
				
				if( $i == CRIMINALITY_TYPE_CRIMINALIDADE ){
					$this->categoria[$indexOfCategory] = $this->dados->val($i,1,0);
					$indexOfCategory++;
				}
				if( $i == CRIMINALITY_TYPE_ACAO_POLICIAL ){
					$this->categoria[$indexOfCategory] =  $this->dados->val($i,1,0);
					$indexOfCategory++;
				}
				if( $i == CRIMINALITY_TYPE_TRANSITO ){
					$this->categoria[$indexOfCategory] =  $this->dados->val($i,1,0);
				}
			}
			
			/**  
			* Loop that takes nature of the criminality
			* 
			**/
			for( $i=1,$indexOfNature=0; $i<NUMBER_OF_LINES; $i++ ){
				if(($i == 1)||($i == 5)||($i == 21)||($i == 27)||($i == 28)||($i == 31)||($i == 32)||($i == 37)||($i == 40)){
					continue;
				}
				else{	
					if($i>32){
						if($i<37){
							$this->natureza[$this->__getCategoria()[1]][$indexOfNature]= $this->dados->val($i,'B',0);
						}else{
							$this->natureza[$this->__getCategoria()[2]][$indexOfNature]= $this->dados->val($i,'B',0);
						}
					}else{
						if($i<32){
							$this->natureza[$this->__getCategoria()[0]][$indexOfNature]= $this->dados->val($i,'C',0);
						}else if($i>32 && $i<37){
							$this->natureza[$this->__getCategoria()[1]][$indexOfNature]= $this->dados->val($i,'C',0);
						}else{
							$this->natureza[$this->__getCategoria()[2]][$indexOfNature]= $this->dados->val($i,'C',0);
						}
					}
					$indexOfNature++;
				}
			}
			$criminalidade = utf8_encode("Criminalidade");
			$acao = utf8_encode("Ação Policial");
			$transito = utf8_encode("Trânsito");
			//loop que pega os anos disponiveis
			for($i=1,$auxTempo = 0; $i<NUMBER_OF_COLUMNS; $i++){
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
			for($i=1,$auxLinha=0; $i<NUMBER_OF_LINES; $i++){	
				if(($i == 1)||($i == 5)||($i == 21)||($i == 27)||($i == 28)||($i == 31)||($i == 32)||($i == 37)||($i == 40)){
					continue;
				}else{	
					for($j=4,$auxColuna=0,$indexOfCategory; $j<NUMBER_OF_COLUMNS; $j++){
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
?>