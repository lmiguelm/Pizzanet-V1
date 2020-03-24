<?php
	
	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeForm.php");

	$_SESSION["flag"]=true;

	$parametros=null;
	$parametros["action"]="insere.php?tabela=funcionario";
	$parametros["method"]="post";
	$f=new Form($parametros);

	$parametros=null;
	$parametros["name"]="funcionario";
	$parametros["type"]="text";
	$parametros["placeholder"]="Funcionario...";
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
	$parametros["name"] = "salario";
	$parametros["type"] = "text";
	$parametros["placeholder"] = "Digite o salario...";	
	$parametros["required"]="required";
	$parametros["class"]="dinheiro";
	$f->add_input($parametros);

	$parametros = "Cadastrar";
	$f->add_button($parametros);

	$f->exibe();

?>