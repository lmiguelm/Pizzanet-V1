<?php
	include("classeCabecalho.php");
	include("classeForm.php");
	include("conexao.php");

	$_SESSION["flag"]=true;
	
	$parametros = null;
	$parametros["action"] = "validacao.php";
	$parametros["method"] = "post";
	$f = new Form($parametros);
	
	$parametros = null;
	$parametros["name"] = "email";
	$parametros["type"] = "email";
	$parametros["placeholder"] = "Usuario";	
	$f->add_input($parametros);

	$parametros = null;
	$parametros["name"] = "senha";
	$parametros["type"] = "password";
	$parametros["placeholder"] = "Senha";
	$parametros["maxlength"] = 10;	
	$f->add_input($parametros);

	$parametros = "Logar";
	$f->add_button($parametros);	

	if(isset($_GET["erro"]))
	{
		echo "<nav><h2 class='invalido'>Login e/ou senha invalidos.</h2></nav>";
	}
	$f->exibe();

?>