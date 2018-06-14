<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('nomeNoticia') - Portal Formosa</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('news/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('news/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/noticiasV3.min.css') }}">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css"/>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css"/>
    <meta name="theme-color" content="#008ad6">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#008ad6">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#008ad6">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008ad6">

</head>

<body>
<ul id="gn-menu" class="gn-menu-main">
    <li class="gn-trigger">
        <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
        <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
                <ul class="gn-menu">
                    <li class="gn-search-item">

                        <form action="{{ route('todasNoticiasAberta') }}" method="GET">
                            <input placeholder="Pesquisa" type="search" name="pesquisa" class="gn-search">
                        </form>

                        <a class="gn-icon gn-icon-search"><span>Pesquisar</span></a>
                    </li>
                    <li><a class="gn-icon ion-ios-home-outline">Início</a></li>
                    <li><a class="gn-icon ion-flag">Empresas</a></li>
                    <li><a class="gn-icon gn-icon-news">Notícias</a></li>
                    <li><a class="gn-icon ion-mic-c">Eventos</a></li>
                    <li><a class="gn-icon gn-icon-help">Ajuda</a></li>
                    <li>
                        <a class="gn-icon ion-ios-person">Login</a>
                        <ul class="gn-submenu">
                            <li><a class="gn-icon ion-ios-personadd-outline">Registrar-se</a></li>
                            <li><a class="gn-icon ion-ios-pricetag" href="{{ route('cadastroNovaEmpresa') }}" style="color: #5f6f81;">Cadastrar empresa</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /gn-scroller -->
        </nav>
    </li>
    <li><a href="{{ route('inicio') }}">Portal Formosa</a></li>
    <li onclick="window.history.back();"><a class="pf-icon ion-android-arrow-back menu-link"><span> Voltar uma página</span></a></li>
    {{--
    <li><a class="pf-icon pf-icon-prev menu" href="http://tympanus.net/Development/HeaderEffects/"><span>Previous Demo</span></a></li>
    <li><a class="pf-icon pf-icon-drop menu" href="http://tympanus.net/pf/?p=16030"><span>Back to the pf Article</span></a></li>
    --}}
</ul>

<nav id="slide-menu">
    <div class="icon-btn slide-close"><i class="fa fa-close"></i></div>
    <div class="menu">

        <ul class="mobile-menu-pf">
            <li class="busca">
                <input type="text" class="form-control input-pesquisa" placeholder=" Buscar notícia" >
            </li>
            <li class="link-menu">
                <a href="#" class="ion-ios-home"> Início</a>
            </li>
            <li class="link-menu">
                <a href="#" class="ion-map"> Empresas</a>
            </li>
            <li class="link-menu">
                <a href="#" class="ion-ios-book-outline"> Notícias</a>
            </li>
            <li class="link-menu">
                <a href="#" class="ion-ios-musical-notes"> Eventos</a>
            </li>
            <li class="link-menu">
                <a href="#" class="ion-ios-person"> Login</a>
            </li>
        </ul>

    </div>
</nav>

<div class="mobile-sticky">
    <div class="inner-sticky">
        <ul>
            <li>
                <div class="icon-btn trigger">
                    <i class="ion-navicon-round fa-2x" style="color: #fff"></i>
                </div>
            </li>
            <li>
                <a href="{{ route('home') }}">
                    <i class="ion-person fa-2x" style="color: #fff"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('inicio') }}">
                    <i class="ion-home fa-2x" style="color: #fff"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<section id="conteudo">
    <article class="content-wrapper">
        <div class="container">
            <div id="main-contents">
                <header>
                    <h1 class="titulo-noticia">
                        @yield('nomeNoticia')
                    </h1>
                    <p class="imagem" >
                        <figure align="center">
                            <img src="https://i.redd.it/ounq1mw5kdxy.gif" data-src="@yield('fonteImagem')" class="img-fluid imagem-principal"
                                 alt="Imagem da notícia @yield('nomeNoticia') postada postada no Portal Formosa">
                        </figure>
                    </p>
                    <h2 class="descricao">
                        @yield('descricao')
                    </h2>
                    <hr>
                    <div align="right">
                        <p class="informacoes">
                            @yield('informacoesPostagem')
                        </p>
                    </div>
                </header>
                <br>
                <main>
                    @yield('conteudoNoticia')
                </main>
                <div id="share">
                </div>
            </div>
        </div>
    </article>
</section>

<section class="content-wrapper outras-noticias">
    <div class="container">
        <div class="row">
            @yield('outrasNews')
        </div>
    </div>
</section>
<footer class="sticky-footer footer-site-padrao">
    <div class="container">
        <div class="text-center">
            <a href="{{ route('inicio') }}">
                &copy; Portal Formosa 2018
            </a>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script src="{{ asset('news/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('js/default/site/lazy.min.js') }}"></script>
<script src="{{ asset('news/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('news/js/sb-admin.min.js') }}"></script>
<script src="{{ asset('js/default/mostrarNoticia.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script src="{{ asset('js/vendor/jquery.easeScroll.min.js') }}"></script>
<script src="{{ asset('js/classie.min.js') }}"></script>
<script src="{{ asset('js/gnmenu.min.js') }}"></script>
<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
@yield('script-src')
</body>
</html>