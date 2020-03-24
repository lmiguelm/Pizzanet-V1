<?php
	
	include("classeCabecalho.php");
	include("classeTabela.php");
	include("classeBancoDeDados.php");
	

	$bd = new BancoDeDados($conexao);

	$tabela[]="visao_pagamento";
	
	$coluna[]= "id_pagamento AS ID";
	$coluna[]= "cod_pedido AS 'Pedido Nº'";
	$coluna[]= "cliente AS Cliente";
	$coluna[]= "pizza AS Pizza";
	$coluna[]= "preco AS Preço";
	$coluna[]= "data_pagamento AS Data ";
	$coluna[]= "bandeira_cartao AS  Cartao";
	$coluna[]= "cartao_credito AS Numero";

	$condicao = null;

	$ordenacao = null;

	$m = $bd->select($tabela,$coluna,$condicao,$ordenacao);

	$t = new Tabela($m,"pagamento",true);

	$t->exibe();

?>