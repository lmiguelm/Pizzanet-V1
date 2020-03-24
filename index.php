<?php
	include("classeCabecalho.php");
?>

<nav>
	<br><br><br><br><br>
	<h1 class="muda" alt="caixa">Bem-vindo(a)</h1>
</nav>
<?php
	if(isset($_GET["sessao"]))
	{
		echo'<nav><h2 class="erro">Sua sessão encerrou. Faça o login novamente!</h2></nav>';
	}
?>	
