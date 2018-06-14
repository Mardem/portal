<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('nomeNoticia') - Portal Formosa</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/default/noticias/noticias.min.css') }}">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css"/>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css"/>
</head>

<body>
<section>
    <div class="primary-nav">
        <button href="#" class="hamburger open-panel nav-toggle"><span class="screen-reader-text">Menu</span></button>
        <nav role="navigation" class="menu"><a href="{{ route('inicio') }}" class="logotype">PORTAL<span>FORMOSA</span></a>
            <div class="overflow-container">
                <ul class="menu-dropdown">
                    <li><a href="{{ route('inicio') }}">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span>
                    </li>
                    <li class="menu-hasdropdown"><a href="#">Social</a><span class="icon"><i
                                    class="fa fa-share-alt"></i></span>
                        <label title="toggle menu" for="settings"> <span class="downarrow"><i
                                        class="fa fa-caret-down"></i></span> </label>
                        <input type="checkbox" class="sub-menu-checkbox" id="settings"/>
                        <ul class="sub-menu-dropdown">
                            <li><a href="">Facebook</a> <span class="icon"><i class="fa fa-facebook"></i></span></li>
                            <li><a href="">Twitter</a> <span class="icon"><i class="fa fa-twitter"></i></span></li>
                            <li><a href="">Instagram</a> <span class="icon"><i class="fa fa-instagram"></i></span></li>
                        </ul>
                    </li>
                    <li><a href="#">Settings</a><span class="icon"><i class="fa fa-gear"></i></span></li>
                    <li><a href="#">Messages</a><span class="icon"><i class="fa fa-envelope"></i></span></li>
                </ul>
            </div>
        </nav>
    </div>
</section>

<section>
    <div class="container categoria" align="center" id="categoria">
        <h2>
            <img src="{{ asset('img/svg/logo-portal-formosa.svg') }}" alt="" width="50">
                @yield('categoria')
        </h2>
    </div>
</section>

<section>
    <article>
        <div class="new-wrapper">
            <div id="main">
                <div id="main-contents">
                    <header>
                        <h1 class="titulo-noticia">
                            @yield('nomeNoticia')
                        </h1>
                        <p class="imagem">
                            <figure>
                                <img src="@yield('fonteImagem')" class="imagem-principal"
                                     alt="Imagem da notícia @yield('nomeNoticia') postada postada no Portal Formosa">
                            </figure>
                        </p>
                        <h2 class="descricao">
                            @yield('descricao')
                        </h2>
                        <p class="informacoes">
                            @yield('informacoesPostagem')
                        </p>
                    </header>
                    <br>
                    <main>
                        @yield('conteudoNoticia')
                    </main>
                </div>
            </div>
        </div>
    </article>
</section>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script src="{{ asset('js/vendor/jquery.fixit.js') }}"></script>
<script src="{{ asset('js/default/mostrarNoticia.min.js') }}"></script>
</body>
</html>
