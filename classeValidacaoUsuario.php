<?php
	include("classeUsuario.php");
	
	class ValidacaoUsuario
	{
		private $conexao;
		private $email;
		private $senha;

		public function __construct($conexao, $parametros)
		{
			$this->conexao=$conexao;
			$this->email=$parametros["email"];
			$this->senha=$parametros["senha"];
		}

		public function validar()
		{
			$consulta="SELECT * FROM usuario WHERE email=:email AND senha=:senha";

			$stmt=$this->conexao->prepare($consulta);

			$stmt->BindValue(":email", $this->email);
			$stmt->BindValue(":senha", $this->senha);

			$stmt->execute();

			if($stmt->rowCount()==1) //Contas as linhas que retornou do select
			{
				session_start();

				$linha=$stmt->fetch();

				$_SESSION["usuario"]= new Usuario($linha);
				header("location: index.php");
			} 
			else
			{
				header("location:form_login.php?erro=1");
			}
		}

	}
?>