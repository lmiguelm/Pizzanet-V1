<?php
	
	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeForm.php");

	$_SESSION["flag"]=true;
	
	$parametros=null;
	$parametros["action"]="insere.php?tabela=cardapio";
	$parametros["method"]="post";
	$f=new Form($parametros);

	$parametros=null;
	$parametros["name"]="pizza";
	$parametros["type"]="text";
	$parametros["placeholder"]="nome da pizza...";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["name"]="ingredientes";
	$parametros["type"]="text";
	$parametros["placeholder"]="Ingredientes...";
	$parametros["class"]="ingredientes";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "preco";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Preço...";	
	$parametros["required"]="required";
	$parametros["class"]="dinheiro";
	$f->add_input($parametros);

	$parametros = "Cadastrar";
	$f->add_button($parametros);

	$f->exibe();

?>