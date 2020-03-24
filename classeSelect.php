<?php

	include("classeOption.php");

	class Select implements Exibicao{

		private $name;
		private $options;
		private $class;
		
		public function __construct($parametros){
			$this->name=$parametros["name"];

			if(isset($parametros["class"]))
			{
				$this->class=$parametros["class"];
			}

			foreach($parametros["options"] as $i=>$o){
				$this->options[] = new Option($o);
			}	
		}
		
		public function exibe(){
			if($this->class!=null){
				echo "<select name='$this->name' class='$this->class'>";
			}
			else{
				echo "<select name='$this->name'>";
			}
			
			
			foreach($this->options as $i=>$o){
				$o->exibe();
			}
			
			echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		
		
	}


?>