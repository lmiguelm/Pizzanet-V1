<?php
	
	include("classeBancoDeDados.php");
	include("classeValidacaoUsuario.php");

	$v=new ValidacaoUsuario($conexao, $_POST);
	$v->validar();


?>