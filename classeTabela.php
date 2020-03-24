<?php
	
	class Tabela implements Exibicao{
		
		private $matriz;
		private $alterar;
		private $remover;
		private $tabela;
		
		public function __construct($matriz,$tabela,$remover){			
				$this->matriz = $matriz;
				$this->remover = $remover;
				$this->tabela = $tabela;
		}
		
		
		public function exibe(){
			
			if($this->matriz!=null)
			{
				echo "<nav><table border='1'>";	
						foreach($this->matriz as $i=>$linha){		
							
							if($i==0){
								
								echo "
								<thead>
								<tr>";
								foreach($linha as $j=>$valor){					
									if(!is_numeric($j)){
										echo "<th>$j</th>";
									}
								}
								
								if($this->remover!=null){
									echo "<th></th>";
								}
								
								echo "</tr>
									  </thead>
									  <tbody>";
							}
							
							echo "<tr class='tr_body'>";
							foreach($linha as $j=>$valor){					
								if(!is_numeric($j)){
									echo "<td>$valor</td>";
								}
							}
							if($this->remover!=null && isset($_SESSION["usuario"]))
							{
								echo "<td>";				
									echo "<a href='remover.php?tabela=$this->tabela&id=$linha[0]' class='remove'></a>";
								echo "</td>";							
							}
							else{
								echo "<td></td>";
							}
							echo "</tr>";					
						}
				echo "</tbody></table></nav>";	
			}
			else
			{
				echo
				'
					<nav>
						<h2 class="erro">Nenhum dado inserido. Cadastre primeiro!</h2>
					</nav>
				';
			}
		}
		
		
	}


?>