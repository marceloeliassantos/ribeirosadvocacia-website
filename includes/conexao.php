<?php

	$host = 'localhost';
	$dbname = 'escritorio';
	$user = 'root';
	$password = '';

	try{
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	}catch(PDOException $e){
		exit('Erro de banco de dados.');
	}

?>