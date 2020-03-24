<?php
	session_start();

	if(!isset($_SESSION['start_login'])) 
	{ 	
	    $_SESSION['start_login'] = time();
	    $_SESSION['logout_time'] = $_SESSION['start_login'] + (30*60); 
	}

	if(time() >= $_SESSION['logout_time']) { 
	    header("location:logout.php?sessao=1"); 
	    session_destroy();
	} 

	include("interfaceExibicao.php");

	class Cabecalho implements Exibicao{
	
		private $charset;
		private $title;
		private $links;
		private $scripts;
		private $icone;
		
		public function __construct($parametros){
			$this->charset = $parametros["charset"];
			$this->title = $parametros["title"];
			

			if(isset($parametros["icone"])){
				$this->icone=$parametros["icone"];
			}
			if(isset($parametros["links"])){
				$this->links = $parametros["links"];
			}
			if(isset($parametros["scripts"])){
				$this->scripts = $parametros["scripts"];
			}
		}
		
		public function exibe(){
			echo "<!DOCTYPE html>
					<html>
					<head>
						<meta charset='$this->charset' />
						 <title>$this->title</title>";

			if($this->links!=null){
					
				echo "<link rel='icon' type='image/png' href='$this->icone'/>";
				
			}		
						 
			if($this->links!=null){
					foreach($this->links as $i=>$l){
						echo "<link rel='stylesheet' href='$l' />";
					}
			}			 
			if($this->scripts!=null){
					foreach($this->scripts as $i=>$s){
						echo "<script type='text/javascript' src='$s'></script>";
					}
			}
			echo "
					</head>	
						<body>
						";
			
		}
		
		public function exibe_menu(){
			
			echo '<center><img src="img/pizzanet.png" width="300" height="190"/></center>';
			echo '';
			if(isset($_SESSION["usuario"]))
			{
				echo 
				'	
					<nav>
					    <ul class="menu"> 
					    <li class="home"><a href="index.php">Home</a></li> 
					       <li><a>Cliente</a>
					            <ul class="submenu-1">
					                <li><a href="form_cliente.php">Cadastrar</a></li>
					                <li><a href="listar_cliente.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Funcionario</a>
					            <ul class="submenu-1">
					                <li><a href="form_funcionario.php">Cadastrar</a></li>
					                <li><a href="listar_funcionario.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Cardapio</a>
					            <ul class="submenu-1">
					                <li><a href="form_cardapio.php">Cadastrar</a></li>
					                <li><a href="listar_cardapio.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Pedido</a>
					            <ul class="submenu-1">
					                <li><a href="form_pedido.php">Cadastrar</a></li>
					                <li><a href="Listar_pedido.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Pagamento</a>
					            <ul class="submenu-1">
					                <li><a href="form_pagamento.php">Cadastrar</a></li>
					                <li><a href="listar_pagamento.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Usuários do sistema</a>
					            <ul class="submenu-1">
					                <li><a href="form_usuario.php">Cadastrar</a></li>
					                <li><a href="listar_usuario.php">Listar</a></li>
					            </ul>
					        </li> 
					         <li class="login"><a href="logout.php">Sair</a></li> 
					    </ul>
					</nav>
					<br><br>
				';
			}
			else
			{
				echo 
				'	
					<nav>
					    <ul class="menu"> 
					   		<li class="home"><a href="index.php">Home</a></li> 
					       	<li><a>Cliente</a>
					       	     <ul class="submenu-1">
					       	         <li><a href="listar_cliente.php">Listar</a></li>
					        	    </ul>
					      	  </li> 
					        <li><a>Funcionario</a>
					            <ul class="submenu-1">
					                <li><a href="listar_funcionario.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Cardapio</a>
					            <ul class="submenu-1">
					                <li><a href="listar_cardapio.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Pedido</a>
					            <ul class="submenu-1">
					                <li><a href="Listar_pedido.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li><a>Pagamento</a>
					            <ul class="submenu-1">
					                <li><a href="listar_pagamento.php">Listar</a></li>
					            </ul>
					        </li> 
					        <li class="login"><a href="form_login.php">Entrar</a></li> 
					    </ul>
					</nav>
					<br><br>
				';
			}
		}	
	}
	
	$parametros["charset"]="utf-8";
	$parametros["title"]="Cadastro de funcionarios";
	$parametros["links"][] = "css/estilos.css";
	$parametros["links"][] = "css/tabelas.css";
	$parametros["icone"] = "img/icone.png";
	$parametros["scripts"][] = "js/jquery.js";
	$parametros["scripts"][] ="js/jquery.mask.js";
	$parametros["scripts"][] = "js/mask.js";
	$c = new Cabecalho($parametros);
	$c->exibe();	
	$c->exibe_menu();

		
?>


	