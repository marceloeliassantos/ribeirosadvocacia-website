<?php

	class Usuario
	{
		private $login;
		private $senha;
		private $nome;
		private $email;
		private $admin;

		function __construct($id = NULL)
		{
			if(!$id)
				return;

			global $pdo;

			$query = $pdo->prepare('SELECT * FROM usuario WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();
			$result = $query->fetch();

			$this->login = $result['login'];
			$this->nome  = $result['nome'];
			$this->senha = $result['senha'];
			$this->email = $result['email'];
			$this->admin = $result['administrador'];

			return;
		}

		function valida_usuario($login, $senha)
		{
			global $pdo;

			$query = $pdo->prepare("SELECT id FROM usuario WHERE login = ? AND senha = ?");
			$query->bindValue(1, $login);
			$query->bindValue(2, $senha);
			$query->execute();
			$num = $query->rowCount();

			if($num)
				return $query->fetch()['id'];

			else
				return false;
		}

		function inserir($nome, $login, $email, $senha)
		{
			global $pdo;

			$nome = $nome;
			$login = $login;
			$email = $email;
			$senha = $senha;

			try{
				$query = $pdo->prepare("INSERT INTO usuario(nome, login, email, senha) VALUES (?, ?, ?, ?)");
				$query->bindValue(1, $nome);
				$query->bindValue(2, $login);				
				$query->bindValue(3, $email);	
				$query->bindValue(4, $senha);
				$query->execute();
			}catch(PDOException $e){
				return false;
			}

			return true;
		}

		function editar($nome, $login, $email, $senha, $id)
		{
			global $pdo;

			$nome = $nome;
			$login = $login;
			$email = $email;
			$senha = md5($senha);

			try{
				$query = $pdo->prepare("UPDATE usuario SET nome = ?, login = ?, email = ?, senha = ? WHERE id = ?");
				$query->bindValue(1, $nome);
				$query->bindValue(2, $login);				
				$query->bindValue(3, $email);	
				$query->bindValue(4, $senha);
				$query->bindValue(5, $id);
				$query->execute();
			}catch(PDOException $e){
				return false;
			}
			return true;
		}

		function delete($id)
		{
			global $pdo;

			$query = $pdo->prepare('DELETE FROM usuario WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();

			return;
		}

		function is_admin()
		{
			if($this->admin)
				return true;
			else
				return false;
		}	

		function get_login(){
			return $this->login;
		}		
		function get_nome(){
			return $this->nome;
		}		
		function get_email(){
			return $this->email;
		}				
	}
?>
