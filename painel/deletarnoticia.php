<?php
    session_start();
    
    if(!isset($_SESSION['logged_in']))
    {
        header('Location: ../index.php');
        exit();
    }

    if(!isset($_GET['id']))
        header('Location: index.php');
    
    include('../includes/conexao.php');     
    include('../includes/postagem.php');

    $noticia = new Postagem();
    $noticia->deletar($_GET['id']);

    header('Location: index.php');

?>