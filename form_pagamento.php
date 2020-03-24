<?php
	
	include("classeCabecalho.php");
	include("autenticacao.php");
	include("classeForm.php");
	include("conexao.php");
	include("erro.php");

	$_SESSION["flag"]=true;

	$parametros=null;
	$parametros["action"]="insere.php?tabela=pagamento";
	$parametros["method"]="post";
	$f=new Form($parametros);
	
	$consulta = "SELECT id_pedido as value, CONCAT(id_pedido, ' / ',cliente,' / ', preco) as label FROM pedido INNER JOIN cardapio ON cardapio.id_cardapio=pedido.cod_cardapio INNER JOIN cliente ON pedido.cod_cliente=cliente.id_cliente AND id_pedido NOT IN (SELECT cod_pedido FROM pagamento) ORDER BY id_pedido";
	$stmt = $conexao->prepare($consulta);
	$stmt->execute();
	while($linha=$stmt->fetch()){
		$pedidos[] = $linha;
	}


	if(isset($pedidos))
	{
		$parametro=null;
		$parametro["label"]="Pedido nº";
		$f->add_label($parametro);

		$parametros=null;
		$parametros["name"]="cod_pedido";
		$parametros["options"]=$pedidos;
		$parametros["class"]="pagamento";
		$f->add_select($parametros);

		$parametros = null;
		$parametros["name"] = "data_pagamento";
		$parametros["type"] = "hidden";
		@$parametros["value"] = date('Y-m-d');	
		$f->add_input($parametros);

		$parametros = null;
		$parametros["name"] = "bandeira_cartao";
		$parametros["type"] = "radio";
		$parametros["opcoes"] = array("Visa"=>"Visa.","MasterCard"=>"MasterCard.", "Elo"=>"Elo");
		$parametros["label"] = "Cartão";	
		$f->add_inputOpcoes($parametros);

		$parametros=null;
		$parametros["name"]="cartao_credito";
		$parametros["type"]="text";
		$parametros["placeholder"]="Numero do cartão";
		$parametros["required"]="required";
		$parametros["class"]="cartao";
		$f->add_input($parametros);

		$parametros = "Registrar pagamento";
		$f->add_button($parametros);

		if(isset($_GET["erro"]))
		{
			echo "<nav><h2 class='invalido'> Este pedido já foi pago!</h2></nav>";
		}

		$f->exibe();

	}	
	else
	{
		nenhum_pedido();
	}

	
?>