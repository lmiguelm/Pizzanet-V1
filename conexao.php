<?php
	include_once("classeCabecalho.php");

    $bd = "mysql:host=localhost:3307;dbname=pizzanet;charset=utf8";
    $user = "root";
    $senha = "usbw";

    try{
    	$conexao = new PDO($bd,$user,$senha);
    }
	catch(Exception $e){
		echo "<nav><h2 class='erro'>Nosso sistema está indisponivel no momento. Tente novamento mais tarde :'(</h2></nav>";
		die();
	}
?>