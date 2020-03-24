<?php
	
	include("classeCabecalho.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$bd = new BancoDeDados($conexao);

	$tabela[]="funcionario";
	
	$coluna[]= "id_funcionario as ID";
	$coluna[]= "funcionario as Nome";
	$coluna[]= "salario as Salario";
	$coluna[]= "sexo as Sexo";
	$coluna[]= "data_nascimento as 'Data de Nascimento'";

	$condicao = null;

	$ordenacao = "funcionario";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"funcionario",true);
	$t->exibe();

?>