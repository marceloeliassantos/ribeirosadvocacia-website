<?php

	class Postagem
	{
		private $titulo;
		private $conteudo;
		private $data;
		private $autor;
		private $nomeautor;
		private $categoria;
		private $nomecategoria;
		private $qtd;
		
		function __construct($id = NULL)
		{
			if(!$id)
				return;

			global $pdo;

			$query = $pdo->prepare('SELECT * FROM postagem WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();
			$result = $query->fetch();

			$this->titulo = $result['titulo'];
			$this->conteudo = $result['conteudo'];
			$this->data = $result['data'];
			$this->autor = $result['autor'];
			$this->nomeautor = $this->nome_autor($result['autor']);
			$this->categoria = $result['categoria'];
			$this->nomecategoria =$this->nome_categoria($result['categoria']);

			return;
		}

		function fetch_all()
		{
			global $pdo;

			$query = $pdo->prepare("SELECT id FROM postagem ORDER BY data DESC");

			if($query->execute())
			{
				$this->qtd = $query->rowCount();
				return $query->fetchAll();
			}

			else
				return NULL;
		}	

		function fetch_custom($tabela, $id)
		{
			global $pdo;

			if($tabela == 'categoria')
				$query = $pdo->prepare("SELECT id FROM postagem WHERE categoria = ? ORDER BY data DESC");
			else
				$query = $pdo->prepare("SELECT id FROM postagem WHERE autor = ? ORDER BY data DESC");
			
			$query->bindValue(1, $id);

			if($query->execute())
			{
				$this->qtd = $query->rowCount();
				return $query->fetchAll();
			}

			else
			{
				$this->qtd = 0;
				return NULL;
			}			
		}

		function inserir($titulo, $conteudo, $autor, $categoria)
		{
			global $pdo;

			$titulo = $titulo;
			$conteudo = $conteudo;

			try{
				$query = $pdo->prepare("INSERT INTO postagem(titulo, conteudo, autor, categoria, data) VALUES (?, ?, ?, ?, ?)");
				$query->bindValue(1, $titulo);
				$query->bindValue(2, $conteudo);
				$query->bindValue(3, $autor);				
				$query->bindValue(4, $categoria);	
				$query->bindValue(5, date("Y-m-d H:i:s"));
				$query->execute();
			}catch(PDOException $e){
				return false;
			}
			
			return true;
		}

		function editar($titulo, $conteudo, $categoria, $id)
		{
			global $pdo;

			$titulo = $titulo;
			$conteudo = $conteudo;

			try{
				$query = $pdo->prepare("UPDATE postagem SET titulo = ?, conteudo = ?, categoria = ? WHERE id = ?");
				$query->bindValue(1, $titulo);
				$query->bindValue(2, $conteudo);
				$query->bindValue(3, $categoria);				
				$query->bindValue(4, $id);
				$query->execute();
			}catch(PDOException $e){
				return false;
			}
			
			return true;
		}

		function deletar($id)
		{
			global $pdo;

			$query = $pdo->prepare('DELETE FROM postagem WHERE id = ?');
			$query->bindValue(1, $id);
			
			if($query->execute())
				return true;
			
			return false;
		}

		function data()
		{
			$dia = date("d", strtotime($this->data));
			$mes = date("m", strtotime($this->data));
			$ano = date("Y", strtotime($this->data));

          	return $dia.'/'.$mes.'/'.$ano;
		}

		function conteudo($op)
		{
			if($op == 1)
            {
            	$conteudo = implode(' ', array_slice(explode(' ', $this->conteudo), 0, 35));
            	$conteudo = strip_tags($conteudo, '<p>');
            }
        
            else if($op == 2)
			{
				$conteudo = implode(' ', array_slice(explode(' ', $this->conteudo), 0, 55));
            	$conteudo = strip_tags($conteudo, '<p>');
            }

            return $conteudo;		
		}		

		function nome_autor($id)
		{
			global $pdo;

			$query = $pdo->prepare('SELECT nome FROM usuario WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();

			$result = $query->fetch();
			$nome = $result['nome'];

			return $nome;	
		}

		function nome_categoria($id)
		{
			global $pdo;

			$query = $pdo->prepare('SELECT nome FROM categoria WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();

			$result = $query->fetch();
			$nome = $result['nome'];
			
			return $nome;			
		}	

		function get_titulo(){
			return $this->titulo;
		}	
		function get_conteudo(){
			return $this->conteudo;
		}	
		function get_categoria(){
			return $this->categoria;
		}	
		function get_nomecategoria(){
			return $this->nomecategoria;
		}	
		function get_autor(){
			return $this->autor;
		}	
		function get_nomeautor(){
			return $this->nomeautor;
		}
		function get_qtd(){
			return $this->qtd;
		}	
	}
?>
