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
    include('../includes/categoria.php');

    $noticia = new Postagem($_GET['id']);
    $categoria = new Categoria;
    $categorias = $categoria->fetch_all();
    
    if(isset($_POST['titulo']))
    {
        if(isset($_POST['outra']))
        {
            $cat = $categoria->inserir($_POST['outra']);
            $cat = $cat['id'];
            $noticia->editar($_POST['titulo'],$_POST['conteudo'],$cat, $_GET['id']);
        }
        else
            $noticia->editar($_POST['titulo'],$_POST['conteudo'],$_POST['categoria'], $_GET['id']);
            
        header('Location: index.php');
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
 
    <link rel="stylesheet" type="text/css" href="../editor/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../editor/lib/css/prettify.css">
    <link rel="stylesheet" type="text/css" href="../editor/src/bootstrap-wysihtml5.css"> 

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
            <h1>Editar Notícia</h1>
        </div>
    </section>
    
    <section id="content">
        <div class="container" id="painel">

            <a class="novanoticiabtn" href="index.php">Voltar</a>
            <a class="novanoticiabtn sair" href="logout.php">Sair</a>
            
            <form class="clear" action="editarnoticia.php?id=<?php echo $_GET['id']; ?>" method="post" autocomplete="off" role="form">
                <label>Titulo</label><br/><input type="text" name="titulo" required class="form-control" value="<?php echo $noticia->get_titulo(); ?>"><br/>
                <textarea id="editor" name="conteudo" required><?php echo $noticia->get_conteudo(); ?></textarea><br/>
                <label>Categoria</label><select name="categoria" required>
                 
                <?php 
                    foreach($categorias as $categoria):
                        $cat = new Categoria($categoria['id']);
                ?>
                <option value="<?php echo $categoria['id'];?>"<?php if ($categoria['id'] == $noticia->get_categoria()) echo 'selected';?>><?php echo $cat->get_nome();?></option>
                <?php endforeach;?>
                
                </select><br/><br/>
                <input type="checkbox" name="checkoutra"/><label>Nova Categoria</label><br/>
                <input type="text" name="outra" id="out" disabled=true><br />
                <input id="postar" type="submit" value="Editar">
            </form>
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
                <a href="../login.php">Área Restrita</a>
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


<script src="../editor/lib/js/wysihtml5-0.3.0.js"></script>
<script src="../editor/lib/js/jquery-1.7.2.min.js"></script>
<script src="../editor/lib/js/prettify.js"></script>
<script src="../editor/lib/js/bootstrap.min.js"></script>
<script src="../editor/src/bootstrap-wysihtml5.js"></script>

<script>
    $('#editor').wysihtml5();
    $('#some-textarea').wysihtml5({
        "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": false, //Button which allows you to edit the generated HTML. Default false
        "link": true, //Button to insert a link. Default true
        "image": true, //Button to insert an image. Default true,
        "color": false //Button to change color of font  
    });

    $("input:checkbox").click(function() {
        $("#out").attr("disabled", !this.checked); 
    });
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>

</body>
</html>
