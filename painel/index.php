<?php 
    include('../includes/postagem.php'); 
    include('../includes/conexao.php'); 
    session_start();

    if(!isset($_SESSION['logged_in']))
    {
        header('Location: ../index.php');
        exit();
    }

    $noticia = new Postagem;
    $noticias = $noticia->fetch_All();
    $qtd = $noticia->get_qtd();

    $limite = 10;
    if(!isset($_GET['page']))
        $page = 1;

    else
    {
        $page = $_GET['page'];
        $qtd = $qtd - (($page-1) * $limite);
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Escritorio de Advocacia em Pires do Rio - Goiás especializado em Direito Civil, Direito Penal, Direito Trabalhista, Direito Empresarial. Jhonata Ribeiro Advogado de Pires do Rio - Goiás">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>Ribeiro Advocacia - Escritório de Advocacia em Pires do Rio - Goiás</title>
 
    <link href="../assets/normalize.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <header>
        <div class="container">
            <div id="logo">
                <img src="../images/logo.png" alt="Logo Ribeiro Advocacia Pires do Rio">
            </div>

            <div id="jhonata">
                <img src="../images/jhonata-ribeiro-advogado.png" /> 
                <p>Dr. Jhonata Wilhian Ribeiro Mendes</p>
                <div class="clear"></div>
            </div> 

            <nav>
                <a href="../index.php">Início</a>
                <a href="../escritorio.php">Escritório</a>
                <a href="../atuacao.php">Atuação</a>
                <a href="../noticias.php">Notícias</a>
                <a href="../contato.php">Contato</a>
            </nav>  
        </div>
        <div class="clear"></div>
    </header>

    <section id="slider" class="page">
        <div class="container">
            <h1>Painel de Controle</h1>
        </div>
    </section>
    
    <section id="content">
        <div class="container">
       
            <a class="novanoticiabtn" href="novanoticia.php">Nova Notícia</a>
            <a class="novanoticiabtn sair" href="logout.php">Sair</a>
            <table>
            <?php 
                for($i = ($limite * ($page-1)); $i < ($limite * $page) AND $qtd > 0; $i++, $qtd--):
                    $postagem = new Postagem($noticias[$i]['id']);   

                    (strlen($postagem->get_titulo()) < 60) ? $str = $postagem->get_titulo() : $str = substr($postagem->get_titulo(), 0 , 65).'...';
            ?>

                <tr>
                    <td class="post"><a href="../noticia.php?id=<?php echo $noticias[$i]['id']; ?>"><?php echo $str; ?></a></td>
                    <td class="opcoes"><a href="../noticia.php?id=<?php echo $noticias[$i]['id']; ?>">Visualizar</a></td>
                    <td class="opcoes"><a href="editarnoticia.php?id=<?php echo $noticias[$i]['id']; ?>">Editar</a></td>
                    <td class="opcoes"><a href="deletarnoticia.php?id=<?php echo $noticias[$i]['id']; ?>">Deletar</a></td>
                </tr>

        
            <?php endfor;?>
            </table>         
                
            <?php
                if($page > 1)
                    echo '<a id="ult" href="index.php?page='.($page-1).'">&#171 Mais Recentes</a>';
                
                if($qtd > 0)
                    echo '<a id="prox" href="index.php?page='.($page+1).'">Mais Antigas &#187</a>';
            ?> 

            <div class="clear"></div>
        </div>
    </section>

    <footer>
        <div class="container">
            <nav>
                <a href="../index.php">Início</a>
                <a href="../escritorio.php">Escritório</a>
                <a href="../atuacao.php">Atuação</a>
                <a href="../noticias.php">Notícias</a>
                <a href="../contato.php">Contato</a>
                <a href="index.php">Área Restrita</a>
            </nav> 
            
            <div class="footer-logo">
                <img src="../images/logobranca.png" alt="Logo Ribeiro Advocacia" />
            </div>
            
            <div class="footer-info">
                <p>
                    Rua Michel Santinone, nº 2D,<br/> 
                    Bairro São Miguel, Pires do Rio - Goiás
                </p>
                
                <a href="http://gabrielima.com"><img src="../images/gabrielima-logo.png" alt="Gabriel Lima Desenvolvedor Web"></a>
            </div>
            <div class="clear"></div>
        </div>
    </footer> 

</body>
</html>
