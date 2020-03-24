<?php

	class Input implements Exibicao{
		
		private $name;
		private $type;
		private $value;
		private $placeholder;
		private $label;
		private $required;
		private $class;
		private $maxlength;
		
		public function get_name(){
			return($this->name);
		}

		public function get_type(){
			return($this->type);
		}

		public function get_label(){
			return($this->label);
		}	
		
		public function __construct($parametros){
			$this->name = $parametros["name"];
			$this->type = $parametros["type"];
			
			if(isset($parametros["value"])){
				$this->value = $parametros["value"];
			}
			if(isset($parametros["placeholder"])){
				$this->placeholder = $parametros["placeholder"];
			}
			if(isset($parametros["label"])){
				$this->label = $parametros["label"];
			}
			if(isset($parametros["disabled"]))
			{
				$this->disabled=$parametros["disabled"];
			}
			if(isset($parametros["required"]))
			{
				$this->required=$parametros["required"];
			}
			if(isset($parametros["class"]))
			{
				$this->class=$parametros["class"];
			}
			if(isset($parametros["maxlength"]))
			{
				$this->maxlength=$parametros["maxlength"];
			}
			
		}
		
		public function exibe(){
			
			if($this->label!=null){
				echo "<label>$this->label: </label>";
			}
			
			echo "<input type='$this->type' name='$this->name'";
						
			if($this->value!=null){
				echo " value='$this->value' ";
			}
			if($this->placeholder!=null){
				echo " placeholder='$this->placeholder' ";
			}
			if($this->required!=null){
				echo "required='required'";
			}
			if($this->class!=null){
				echo "class='$this->class'";
			}
			if($this->maxlength!=null){
				echo "maxlength='$this->maxlength'";
			}
		
			echo " />&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		
	}

?>