<?php

	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeBancoDeDados.php");
	
	$operacao = new BancoDeDados($conexao);

	$operacao->remocao($_GET["tabela"],$_GET["id"]);
	
	echo'
	<nav>
		<h2 class="removido">'.$_GET["tabela"].' removido(a) com sucesso!</h2>
	</nav>';
?>