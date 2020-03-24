<?php
	
	include("classeCabecalho.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");

	$bd = new BancoDeDados($conexao);

	$tabela[]="visao_pedido";
	
	$coluna[]= "id_pedido AS ID";
	$coluna[]= "cliente AS Cliente ";
	$coluna[]= "funcionario AS Funcionario";
	$coluna[]= "pizza AS Pizza";
	$coluna[]= "preco AS Preco";
	$coluna[]= "data_realizado AS Data";
	$coluna[]= "horario AS Horario";

	$condicao = null;
	$ordenacao = null;

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"pedido",true);
	$t->exibe();

?>