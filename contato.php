<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Escritorio de Advocacia em Pires do Rio - Goiás especializado em Direito Civil, Direito Penal, Direito Trabalhista, Direito Empresarial. Jhonata Ribeiro Advogado de Pires do Rio - Goiás">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Ribeiro Advocacia - Escritório de Advocacia em Pires do Rio - Goiás | Contato</title>

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
                <a href="noticias.php">Notícias</a>
                <a class="active" href="contato.php">Contato</a>
            </nav>  
        </div>
        <div class="clear"></div>
    </header>

    <section id="slider" class="page">
        <div class="container">
            <h1>Contato</h1>
        </div>
    </section>
    
    <section id="content">
        <div class="container">
            <div id="endereco">
                    <h2>Localização</h2>
                    <p>O escritório dispõe de sede própria na cidade de Pires do Rio/GO, na Rua Michel Santinone, 
                    nº 2D, Bairro São Miguel, CEP: 75200000, com telefone para contato nº (64) 3461 - 3328.
                    </p>
                </div>
            <div id="formulario">
            <form name="form1" method="post" action="enviar.php" id="contato">
                    <div style="float:left">
                        Nome:<br/><input name="nome" type="text" placeholder="Digite seu nome" required><br/>
                        Email:<br/><input name="email" type="email" placeholder="Digite seu email" required><br/>
                        Assunto:<br/><input name="assunto" type="text" placeholder="Digite o assunto"><br/>
                    </div>

                    <div style="float:right">
                        Mensagem:<br/><textarea name="mensagem" placeholder="Digite sua mensagem" required></textarea>
                        <input class="submit-button" id="submit" type="submit" name="Submit" value="Enviar">
                    </div>        
                </form> 
            <div class="clear"></div>
            </div> 
            <section id="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d952.3518398111244!2d-48.274473!3d-17.29588370000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94a762f47e0ff499%3A0x7d53c2a53b2dd13b!2sRibeiro+Advocacia!5e0!3m2!1sen!2sbr!4v1394974717860" width="900" height="400" frameborder="0" style="border:0"></iframe><br />
            </section>
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