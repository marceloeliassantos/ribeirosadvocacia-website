<?php
    
    session_start();
    include('includes/conexao.php');
    include('includes/usuario.php');

    if(isset($_SESSION['logged_in']))
    {
        header('Location: painel/index.php');
        exit();
    }

    if(isset($_POST['login']))
    {
        $user = new Usuario();
        $valida = $user->valida_usuario($_POST['login'], md5($_POST['senha']));

        if(!$valida)
        {
            header('Location: login.php?autenticacao=false');
            exit();
        }
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $valida;
        header('Location: painel/index.php');
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
    <title>Ribeiro Advocacia - Escritório de Advocacia em Pires do Rio - Goiás | Área Restrita</title>

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
            <h1>Login</h1>
        </div>
    </section>
    
    <section id="content">
        <div class="container login-page">
       
            <form action="login.php" method="post">
                <input type="text" name="login" placeholder="Login" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <br/><a href="#">Esqueceu login ou senha?</a>
                <input type="submit" value="Entrar">
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
                <a href="index.php">Área Restrita</a>
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
