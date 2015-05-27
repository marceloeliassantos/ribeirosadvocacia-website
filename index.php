<?php
    include('includes/postagem.php');
    include('includes/conexao.php');

    $noticia = new Postagem;
    $noticias = $noticia->fetch_All();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Escritorio de Advocacia em Pires do Rio - Goiás especializado em Direito Civil, Direito Penal, Direito Trabalhista, Direito Empresarial. Jhonata Ribeiro Advogado de Pires do Rio - Goiás">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Ribeiro Advocacia - Escritório de Advocacia em Pires do Rio - Goiás</title>

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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="preload">
	<img src="images/r1.png">
</div>

<div class="content">
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
                <a class="active" href="index.php">Início</a>
                <a href="escritorio.php">Escritório</a>
                <a href="atuacao.php">Atuação</a>
                <a href="noticias.php">Notícias</a>
                <a href="contato.php">Contato</a>
            </nav>
        </div>
        <div class="clear"></div>
    </header>

    <section id="slider">
        <div class="container">
            <div class="slider-sidebar">
                <ul>
                    <li id="slider1" id="direitocivil">Direito Civil</li>
                    <li id="slider2" id="direitocomercial">Direito Penal </li>
                    <li id="slider3" id="direitoempresarial">Direito Trabalhista </li>
                    <li id="slider4" id="direitoempresarial">Direito Empresarial </li>
                    <div id="seta" class="seta-1"></div>
                </ul>
            </div>

            <div id="slider-images">
                <div id="slider1-box" class="in image-slider">
                    <img src="images/slider1.jpg" />
                    <div class="image-slider-info">
                        <p>Direito Civil - A empresa preocupa-se em oferecer o melhor apoio jurídico nas causas particulares...</p>
                        <a href="atuacao.php">Saiba Mais +</a>
                    </div>
                </div>
                <div id="slider2-box" class="image-slider">
                    <img src="images/slider2.jpg" />
                    <div class="image-slider-info">
                        <p>Direito Penal - O amparo nas causas penais tem sido uma das inúmeras tarefas do Ribeiro Advocacia...</p>
                        <a href="atuacao.php">Saiba Mais +</a>
                    </div>
                </div> 
                <div id="slider3-box" class="image-slider">
                    <img src="images/slider3.jpg" />
                    <div class="image-slider-info">
                        <p>Direito Trabalhista - Oportunidade de ver resguardado o seu direito como empregado ou empregador em suas variadas combinações fáticas...</p>
                        <a href="atuacao.php">Saiba Mais +</a>
                    </div>
                </div>
                <div id="slider4-box" class="image-slider">
                    <img src="images/slider4.jpg" />
                    <div class="image-slider-info">
                        <p>Direito Empresarial - Um dos fortes ramos da economia atual, o Direito Empresaria vem se destacando em sua abrangência e exigência...</p>
                        <a href="atuacao.php">Saiba Mais +</a>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </section>

    <section id="content">
        <div class="container">
            <h1 class="index-titulo">
                <spam  class="aspas">&#8220</spam>
                Bem Vindo ao Site do Escritório <br/>
                <spam class="index-advocacia">Ribeiro Advocacia.</spam>
                <spam class="aspas">&#8221</spam>
            </h1>

            <div class="content-index-info1">
                <div class="info-left">
                    <p>
                        Aqui você poderá verificar nossos artigos, notícias sobre as atividades 
                        jurídicas do escritório, bem como enviar ou receber mensagens de nossa 
                        equipe de atendimento. Nossos clientes terão atendimento on-line, obter 
                        relatórios e documentos, além de outras importantes e úteis ferramentas.
                    </p>
                </div>

                <div class="info-right">
                    <h2>O Escritório</h2>

                    <p>
                        O Escritório Ribeiro Advocacia atua desde sua fundação na área preventiva e contenciosa 
                        no ambito do Direito Empresarial. Forte na área do direito Bancário e Consumerista.
                    </p>
                    <p>
                        Apesar do Poder Judiciário encontrar-se abarrotada de ações, a experiência indica que o 
                        acompanhamento processual sistemático e diário, permite antecipar-se aos fatos e, em 
                        consequência, obter uma solução célere ao direito em litígio.
                    </p>

                    <a class="saibamais-info" href="escritorio.html">Saiba Mais +</a>
                </div>
                <div class="clear"></div>
            </div>

            <div class="content-index-info2">
                <div class="index-noticias">
                    <h2>Ultimas Notícias</h2>

                    <?php
                        $qtd = 0;
                        foreach($noticias as $posts):
                            $postagem = new Postagem($posts['id']);
                    ?>
                    <div class="noticia-index-snippet">
                        <div class="noticia-titulo">
                            <h3><a href="noticia.php?id=<?php echo $posts['id']; ?>"><?php echo $postagem->get_titulo(); ?></a></h3>
                        </div>
                        <div class="noticia-conteudo">
                            <p>
                                <?php echo $postagem->conteudo(1); ?>
                            </p>
                        </div>
                        <div class="noticia-info">
                            <div class="noticia-data"><p><?php echo $postagem->data(); ?></div>
                            <div class="noticia-categoria"><a href="categoria.php?id=<?php echo $postagem->get_categoria(); ?>"><?php echo $postagem->get_nomecategoria(); ?></a></div>
                            <div class="noticia-leiamais"><a href="noticia.php?id=<?php echo $posts['id']; ?>">Leia Mais +</a></div>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <?php 
                        if(++$qtd == 2) break;
                        endforeach;
                    ?>   

                    <div class="clear"></div>
                </div>                                     
                <div class="index-social-media"> 
                    <h2>Redes Sociais</h2>
                    <div class="facebookOuter">
                        <div class="facebookInner">
                            <div class="fb-like-box" data-href="https://www.facebook.com/Ribeirosadvocacia" data-width="245" data-height="480" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>         
                            </div>
                        </div>
                    <div id="fb-root"></div>   
                </div>
                <div class="clear"></div>
            </div>
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
</div>    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="assets/scripts.js"></script>
</body>
</html>