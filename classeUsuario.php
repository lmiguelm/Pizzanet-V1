<?php
	
	class Usuario
	{
		private $id_usuario;
		private $nome;
		private $email;
		private $senha;
		private $confirma;
		private $permissao;

		public function __construct($parametros)
		{
			if(isset($parametros["id_usuario"]))
			{
				$this->id_usuario=$parametros["id_usuario"];
			}
			$this->nome=$parametros["nome"];
			$this->email=$parametros["email"];
			$this->senha=$parametros["senha"];
			$this->confirma=$parametros["confirma"];
			$this->premissao=$parametros["permissao"];
		}

		public function get_nome()
		{
			return($this->nome);
		}
		public function get_email()
		{
			return($this->email);
		}
	}
?>