<?php
	
	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeForm.php");

	$_SESSION["flag"]=true;

	$parametros=null;
	$parametros["action"]="insere.php?tabela=usuario";
	$parametros["method"]="post";
	$f=new Form($parametros);

	$parametros=null;
	$parametros["type"]="text";
	$parametros["name"]="nome";
	$parametros["placeholder"]="Usuário...";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="email";
	$parametros["name"]="email";
	$parametros["placeholder"]="E-mail...";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="senha";
	$parametros["maxlength"]=10;
	$parametros["placeholder"]="Senha...";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="password";
	$parametros["name"]="confirma";
	$parametros["maxlength"]=10;
	$parametros["placeholder"]="Confirme sua senha...";
	$parametros["required"]="required";
	$f->add_input($parametros);

	$parametros=null;
	$parametros["type"]="hidden";
	$parametros["name"]="permissao";
	$parametros["value"]=0;
	$f->add_input($parametros);

	$parametros=null;
	$parametros = "Cadastrar";
	$f->add_button($parametros);

	if(isset($_GET["erro"]))
	{
		echo "<nav><h2 class='invalido'>Senha ou email invalidos</h2></nav>";
	}
	$f->exibe();

?>