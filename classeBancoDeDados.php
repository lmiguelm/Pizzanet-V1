<?php

	include("conexao.php");
	//include("erro.php");

	class BancoDeDados{
		
		private $conexao;
		
		
		public function __construct(PDO $conexao){
			$this->conexao = $conexao;
		}
		
		public function remocao($tabela,$id){
			
			$remocao = "DELETE FROM $tabela
						WHERE 
						id_$tabela=:id_$tabela";
			$stmt = $this->conexao->prepare($remocao);
			$stmt->bindValue(":id_".$tabela,$id);
			$stmt->execute() or die($this->erro_foreignkey());		
		}
		
		
		private function erro_foreignkey()
		{
			echo
			'
				<nav>
					<h2 class="erro">Erro: Esses dados estão sendo utilizados em outras tabelas.</h2>
				</nav>
			';
		}


		public function insercao($tabela,$colunas){
			
			$insert = "INSERT INTO $tabela (";
			$cont=0;
			foreach($colunas as $i=>$v){
				if($cont==1){
					$insert .= ",";
				}
				$insert .= $i;
				$cont=1;
			}
			
			$insert .= ") VALUES (";
			
			$cont=0;
			foreach($colunas as $i=>$v){
				if($cont==1){
					$insert .= ",";
				}
				$insert .= ":".$i;
				$cont=1;
			}
			
			$insert .=")";
			
			$stmt = $this->conexao->prepare($insert);
			
			
			foreach($colunas as $i=>$v){
				$stmt->bindValue(":".$i,$v);
			}
			
			$stmt->execute() 
				or die(print_r($stmt->errorInfo()));
		}
		
		
		
		
		
		
		
		
		public function select($tabela, $coluna, $condicao, $ordenacao){
			
			$consulta = "SELECT ";
			
			foreach($coluna as $i=>$c){
				if($i>0){
					$consulta .=", ";
				}
				$consulta .= $c;
			}
			
			
			$consulta .= " FROM ";
			
			foreach($tabela as $i=>$t){
				
				if($i>0){
					$consulta .= " INNER JOIN ";
				}
				
				$consulta .= $t;

				if($i>0){
					$consulta .= " ON ".
								 $tabela[$i-1].".cod_".$t."=".
								 $t.".id_".$t;
				}
				
			}
			
			
			if($condicao !=null){
				print_r($condicao);
				$consulta .= " WHERE ";
				foreach($condicao as $i=>$c){
					if($i>0){
						$consulta .= " LIKE %";
					}
					$consulta.= $c;
				}
			}
			
			if($ordenacao!=null){
				$consulta.= " ORDER BY ".$ordenacao;
			}
			
			
			$stmt = $this->conexao->prepare($consulta);
			$stmt->execute();
			
			
			$matriz = null;
			while($linha=$stmt->fetch()){
				$matriz[] = $linha;
			}
						
			return($matriz);
		}
		
		
	}



?>