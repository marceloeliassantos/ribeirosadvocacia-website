<?php
	
	class Categoria
	{
		private $nome;

		function __construct($id = NULL)
		{
			if(!$id)
				return;

			global $pdo;

			$query = $pdo->prepare('SELECT * FROM categoria WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();
			$result = $query->fetch();

			$this->nome = $result['nome'];
			return;
		}

		function fetch_all()
		{
			global $pdo;
			
			try{
				$query = $pdo->prepare("SELECT id FROM categoria");
				$query->execute();
			}catch(PDOException $e){
				return false;
			}

			return $query->fetchAll();
		}		

		function inserir($nome)
		{
			global $pdo;

			try{
				$nome = $nome;
				$query = $pdo->prepare("INSERT INTO categoria(nome) VALUES (?)");
				$query->bindValue(1, $nome);
				$query->execute();
			}catch(PDOException $e){
				return false;
			}
			
			$query = $pdo->prepare("SELECT id FROM categoria WHERE nome = ?");
			$query->bindValue(1, $nome);
			$query->execute();
			
			return $query->fetch();
		}	

		function get_nome(){
			return $this->nome;
		}
	}
?>