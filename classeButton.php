<?php

	class Button implements Exibicao{
		
		private $label;
		
		public function __construct($label){
			$this->label = $label;
		}
		
		public function exibe(){
			echo "<br/><br/><nav><button>$this->label</button></nav>";
		}
		
	}


?>