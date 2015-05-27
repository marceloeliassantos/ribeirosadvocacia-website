<?php
    include('includes/conexao.php');
    include('includes/postagem.php');
    include('includes/categoria.php');
    include('includes/usuario.php');

    $noticia = new Postagem;
    $noticias = $noticia->fetch_custom("autor", $_GET['id']);
    $qtd = $noticia->get_qtd();

    $categoria = new Categoria();
    $categorias = $categoria->fetch_all();

    $user = new Usuario($_GET['id']);    

    $limite = 5;
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
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Ribeiro Advocacia - Escritório de Advocacia em Pires do Rio - Goiás | <?php echo $user->get_nome(); ?></title>

    <link href="assets/normalize.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    
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
                <img src="images/logo.png" alt="Logo Ribeiro Advocacia Pires do Rio">
            </div>

            <div id="jhonata">
                <img src="images/jhonata-ribeiro-advogado.png" /> 
                <p>Dr. Jhonata Wilhian Ribeiro Mendes</p>
                <div class="clear"></div>
            </div> 

            <nav>
                <a href="index.php">Início</a>
                <a href="escritorio.php">Escritório</a>
                <a href="atuacao.php">Atuação</a>
                <a class="active" href="noticias.php">Notícias</a>
                <a href="contato.php">Contato</a>
            </nav>  

        </div>
        <div class="clear"></div>
    </header>

    <section id="slider" class="page">
        <div class="container">
            <h1>Postagens de <?php echo $user->get_nome(); ?></h1>
        </div>
    </section>
    
    <section id="content" class="escritorio">
        <div class="container">
            <div class="posts">

                <?php 
                    if(!$qtd)
                        echo '<div class="noticia-index-snippet noticia-noticias-snippet"><br/><br/><h2>Não exixtem postagens nesta categoria</h2><br/><br/></div>';
                    
                    for($i = ($limite * ($page-1)); $i < ($limite * $page) AND $qtd > 0; $i++, $qtd--):
                        $postagem = new Postagem($noticias[$i]['id']);                
                ?>

                <div class="noticia-index-snippet noticia-noticias-snippet">
                    <div class="noticia-titulo">
                        <h3><a href="noticia.php?id=<?php echo $noticias[$i]['id']; ?>"><?php echo $postagem->get_titulo(); ?></a></h3>
                    </div>
                    <div class="noticia-conteudo">
                        <p>
                            <?php echo $postagem->conteudo(2); ?>
                        </p>
                    </div>
                    <div class="noticia-info">
                        <div class="noticia-data"><p><?php echo $postagem->data(); ?><p></p></div>
                        <div class="noticia-categoria"><a href="#"><?php echo $postagem->get_nomecategoria(); ?></a></div>
                        <div class="noticia-leiamais"><a href="noticia.php?id=<?php echo $noticias[$i]['id']; ?>">Leia Mais +</a></div>
                        <div class="clear"></div>
                    </div> 
                </div> 

                <?php 
                    endfor;
                    if($page > 1)
                        echo '<a id="ult" href="noticias.php?page='.($page-1).'">&#171 Última Página</a>';
                    
                    if($qtd > 0)
                        echo '<a id="prox" href="noticias.php?page='.($page+1).'">Próxima Página &#187</a>';
                ?>

            </div>
            
            <div class="categoria">
                <h2>Categorias</h2>

                <?php
                    foreach($categorias as $posts):
                        $cat = new Categoria($posts['id']);
                ?>

                <a href="categoria.php?id=<?php echo $posts['id']; ?>"><?php echo $cat->get_nome(); ?></a>

                <?php endforeach;?>

            </div>
            
            <div class="clear"></div>
        </div>
    </section>


    <footer>
        <div class="container">
            <nav>
                <a href="index.php">Início</a>
                <a href="escritorio.php">Escritório</a>
                <a href="atuacao.php">Atuação</a>
                <a href="noticias.php">Notícias</a>
                <a href="contato.php">Contato</a>
                <a href="login.php">Área Restrita</a>
            </nav>  
            
            <div class="footer-logo">
                <img src="images/logobranca.png" alt="Logo Ribeiro Advocacia" />
            </div>
            
            <div class="footer-info">
                <p>
                    Rua Michel Santinone, nº 2D,<br/> 
                    Bairro São Miguel, Pires do Rio - Goiás
                </p>
                
                <a href="http://gabrielima.com"><img src="images/gabrielima-logo.png" alt="Gabriel Lima Desenvolvedor Web"></a>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
    
</body>
</html>