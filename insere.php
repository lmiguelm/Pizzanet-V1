<?php

	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeBancoDeDados.php");
	
	$operacao = new BancoDeDados($conexao);

	if($_SESSION["flag"])
	{

		if($_GET["tabela"]=="usuario")
		{
			/*$cont=false;

			$consulta="SELECT email FROM usuario";
			$stmt = $conexao->prepare($consulta);
			$stmt->execute();
			while($linha=$stmt->fetch())
			{
				if($linha[0]==$_POST["email"])
				{
					$cont=true;
				}
			}
			*/
			if($_POST["senha"] != $_POST["confirma"])
			{
				header("location: form_usuario.php?erro=1");
				die();
			}
		}
		
		$operacao->insercao($_GET["tabela"],$_POST);
	
		
		echo'
		<nav>
			<h2 class="cadastrado">'.$_GET["tabela"].' cadastrado com sucesso!</h2>
		</nav> ';
	}
	else
	{
		echo'<nav><h2 class="cadastrado">Este '.$_GET["tabela"].' já foi cadastrado no sistema!</h2></nav>';	
	}
	$_SESSION["flag"] = FALSE;

	
?>