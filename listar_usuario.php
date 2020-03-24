<?php
	
	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$bd = new BancoDeDados($conexao);

	$tabela[]="usuario";
	
	$coluna[]= "id_usuario as ID";
	$coluna[]= "nome as Usuario";
	$coluna[]= "email as 'E-mail'";

	$condicao = null;

	$ordenacao = null;

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"usuario",true);
	$t->exibe();
?>