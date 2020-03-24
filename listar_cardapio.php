<?php
	
	include("classeCabecalho.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	
	$bd = new BancoDeDados($conexao);

	$tabela[]="cardapio";

	$coluna[]= "id_cardapio as ID";
	$coluna[]= "pizza as Pizza";
	$coluna[]= "ingredientes as Ingredientes";
	$coluna[]= "preco as Preco";

	$condicao = null;
	
	$ordenacao = "pizza";

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"cardapio",true);
	$t->exibe();

?>