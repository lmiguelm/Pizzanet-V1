<?php
	
	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeForm.php");

	$_SESSION["flag"]=true;

	$parametros=null;
	$parametros["action"]="insere.php?tabela=cliente";
	$parametros["method"]="post";
	$f=new Form($parametros);

	$parametros=null;
	$parametros["name"]="cliente";
	$parametros["type"]="text";
	$parametros["placeholder"]="Cliente...";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "data_nascimento";
	$parametros["type"] = "date";
	$parametros["label"] = "Data de Nascimento";
	$parametros["required"]="required";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "sexo";
	$parametros["type"] = "radio";
	$parametros["opcoes"] = array("Masc"=>"Masc.","Fem"=>"Fem.");
	$parametros["label"] = "Sexo";	
	$f->add_inputOpcoes($parametros);

	$parametros = null;
	$parametros["name"] = "telefone";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o telefone...";
	$parametros["class"] = "telefone";
	$parametros["required"]="required";	
	$f->add_input($parametros);

	$parametros = "Cadastrar";
	$f->add_button($parametros);

	$f->exibe();

?>