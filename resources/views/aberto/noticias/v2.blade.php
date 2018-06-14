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
    <link href="{{ asset('news/css/sb-admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/noticiasV2.min.css') }}">
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

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->


<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-pf" id="mainNav">
    <img src="{{ asset('img/svg/logo-portal-formosa.svg') }}" style="margin-right: 5px" alt="Logo do Portal Formosa - 2 Homens em um barco representando Formosa GO" width="40" id="imagemPadrao">
    <a class="navbar-brand" href="{{ route('inicio') }}">
        <img src="{{ asset('img/svg/logo-portal-formosa.svg') }}" style="margin-right: 5px" alt="Logo do Portal Formosa - 2 Homens em um barco representando Formosa GO" width="40" id="responsiveImage"> Portal Formosa
    </a>
    <button class="navbar-toggler navbar-toggler-right" id="closeButton" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ion-navicon-round" id="iconBar"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" id="pesquisa">
                <input type="text" class="form-control input-pesquisa" placeholder=" Buscar notícia">
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Você esta na categoria de @yield('categoria')">
                <a class="nav-link" href="index.html">
                    <i class="ion-android-funnel" aria-hidden="true"></i>
                    <span class="nav-link-text">Categoria: <b style="color: #585858">@yield('categoria')</b></span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Voltar para o início">
                <a class="nav-link" href="{{ route('inicio') }}">
                    <i class="ion-ios-home" aria-hidden="true"></i>
                    <span class="nav-link-text">Início</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categorias">
                <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Categorias</span>
                </a>
                <ul class="sidenav-second-level collapse show" id="collapseMulti">
                    @yield('categorias')
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item back-button">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

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

<section>
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
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Portal Formosa 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </article>
</section>

<section class="content-wrapper outras-noticias">
    <div class="container">
        <div class="row">
            @yield('outrasNews')
        </div>
    </div>
</section>

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
@yield('script-src')
</body>
</html>