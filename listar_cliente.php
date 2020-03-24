<?php
	
	include("classeCabecalho.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$bd = new BancoDeDados($conexao);

	$tabela[]="cliente";
	
	$coluna[]= "id_cliente as ID";
	$coluna[]= "cliente as Nome";
	$coluna[]= "telefone as Telefone";
	$coluna[]= "sexo as Sexo";
	$coluna[]= "data_nascimento as 'Data de Nascimento'";

	$condicao = null;
	$ordenacao = "cliente";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);
	
	$t = new Tabela($m,"cliente",true);
	$t->exibe();

?>