@extends('layouts.default.entrada')
@section('metaDescription', 'O Portal Formosa é uma vitrine virtual de negócios, cultura e lazer que integra todas as empresas, comércios e serviços através de um sistema de busca simples, intuitivo e eficiente. Saiba tudo o que tem em formosa como notícias, empresas, portfolios e muito mais.')
@section('metaKeywords', 'portal formosa, empresas em formosa, empresas online, pizzaria, locais de show, noticias de formosa, ultimas notícias, tecnologia,
marketing digital, portfolio online, aparecer no google')
@section('metaRobots', 'index, follow')
@section('canonical', route('inicio'))
@section('container')
    <section>
        <div class="busca">
            <form action="{{ route('pesquisaEmpresa') }}" method="get">
                <input type="text" class="form-control input-busca" name="pesquisa" placeholder=" O que você procura?"
                       autofocus>
            </form>
        </div>
        <img src="{{ asset('img/loaders/carregamento-noticias-portal-formosa.gif') }}"
             data-src="{{ asset('img/svg/portal-formosa-dia.svg') }}"
             alt="Banner principal do site Portal Formosa, imagem mostrando o dia com movimentos"
             class="banner-principal-dia">
    </section>

    @component('layouts.default.components.busca-fundo')
    @endcomponent

    <section class="destaques-p">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">

                    @foreach($banners as $banner)
                        <div class="item">
                            <div class="card card-plus">
                                <img class="card-img-top"
                                     src="{{ asset('img/loaders/carregamento-noticias-portal-formosa.gif') }}"
                                     data-src="{{ asset($banner->imagem) }}" alt="Banner {{ $banner->nome }}">
                                <div class="card-body">
                                    <h5 class="card-title card-title-pf">
                                        <a href="{{ url($banner->link) }}" target="_blank">{{ $banner->nome }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>


    <section class="categoria-destaque">
        <div class="container">
            <h1 class="texto-descricao-categorias">
                Encontre <b class="txt-destaque">eventos</b>, <b class="txt-destaque">festas</b> e <b
                        class="txt-destaque">locais de shows</b>.
                <span class="mais-texto-destaque">Saiba onde encontrar os pontos turísticos como: <b
                            class="txt-destaque">Salto do
                    Itiquira</b> ,
                    <b class="txt-destaque">Hoteís Fazenda </b> e <b class="txt-destaque">Expoagro</b>.</span>
            </h1>
            <div class="row">
                <div class="col-sm-6">
                    <figure>
                        <img src="/img/destaques/fundo-destaque-padaria-v2.svg" alt="">
                    </figure>
                </div>

                <div class="col-sm-6">
                    <figure>
                        <img src="/img/destaques/fundo-destaque-pizzaria.svg" alt="">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure>
                        <img src="/img/destaques/fundo-destaque-dentista.svg" alt="">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure>
                        <img src="/img/destaques/fundo-destaque-hospital.svg" alt="">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <!-- Conveniência -->
                    <figure>
                        <img src="/img/destaques/fundo-destaque-farmacia.svg" alt="">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <!-- Farmácia -->
                    <figure>
                        <img src="/img/destaques/fundo-destaque-conveniencia.svg" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <hr>
    <section>
        <div align="center">

            {{--
            <a href="whatsapp://send?phone=5561996759227?text=Mensagem%20via%20Portal%20Formosa">Enviar mensagem</a>
            --}}

            <a href="{{ route('cadastrarMinhaEmpresa') }}" class="link-sem-traco">
                <div class="cadastro-empresa">
                    <h2>Cadastre sua empresa</h2>
                    <p class="lead">
                        Cadastre sua empresa em nosso portal e <b>anuncie grátis</b> em nosso site.
                        Tenha acesso a uma administração gratuita para cadastrar sua empresa e já começar a
                        divulgar!
                    </p>
                </div>
            </a>
        </div>
    </section>
    <hr>
    <br><br>
    <section class="noticias-destaque">

        {{--
        Serão 6 notícias vindas do Blog ambas serão as mais atuais as recentemente postada
            Uma categoria de filtro deverá ser criada para que o usuário possa alterar as notícias
            Lembrando: As 6 notícias, exemplo:
            Se ele clicar em Educação essas 6 notícias em destaques aleatório passam a ser 6
            notícias em destaque de EDUCAÇÃO.

            Usar de links buscando dados do servidor como foi usado na Biblioteca
        --}}

        <div class="container">
            <div class="row">
                @foreach($noticias as $noticia)
                    <div class="col-sm-4 card-noticias">
                        <div class="card">
                            <img class="card-img-top"
                                 src="{{ asset('img/loaders/carregamento-noticias-portal-formosa.gif') }}"
                                 data-src="{{ $noticia->imagem }}" alt="{{ $noticia->titulo }}">
                            <div class="card-body card-body-news">
                                <h5 class="card-title card-title-pf">
                                    <a href="noticia/{{ $noticia->link }}">
                                        @php
                                            echo substr($noticia->titulo, 0, 33)
                                        @endphp
                                    </a>
                                </h5>
                                <p class="card-text">
                                    @php
                                        echo substr($noticia->descricao, 0, 140) . "..."
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="todas-noticias">
        <div class="container py-4">
            <div class="row">

                <div class="col-sm-8"> <!-- Inicio - Noticias -->
                    <br><br>
                    @foreach($noticiasPF as $noticiaPortal)
                        <div class="card w-100 mg-b-15">
                            <div class="card-body">
                                <h5 class="card-title">{{ $noticiaPortal->titulo }}</h5>
                                <p class="card-text">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('img/loaders/carregamento-noticias-portal-formosa.gif') }}"
                                                 data-src="{{ $noticiaPortal->imagem }}" width="100">
                                        </td>
                                        <td style="padding-left: 10px">
                                            {{ $noticiaPortal->descricao }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </p>
                                <a href="{{ $noticiaPortal->link }}" class="btn btn-primary">Saber mais</a>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- Fim - notícias -->

                <!-- Inicio barra lateral de informações -->
                <div class="col-sm-4">
                    <div class="panel">
                        <div class="panel-header">
                            <p class="title-panel">Economia</p>
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <div class="info-cotacao">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="lead">
                                                DÓLAR COMERCIAL
                                            </p>
                                            <b id="valor-dolar" class="lead info-cotacao">
                                                <div class="loader"></div>
                                            </b>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="lead">
                                                EURO COMERCIAL
                                            </p>
                                            <b id="valor-euro" class="lead info-cotacao">
                                                <div class="loader"></div>
                                            </b>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-header" style="background: #9513ab;">
                            <p class="title-panel">Eventos</p>
                        </div>
                        <div class="panel-body">
                            <p class="lead">
                                EVENTOS EM FORMOSA
                            </p>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" style="background: #007bff;">
                            <p class="title-panel plantao">
                                <span style="float: left;">
                                    <img src="{{ asset('img/svg/plantao/logo-plantoes.svg') }}" width="50px"
                                         style="margin-top: -13px;" alt="Icone mostre-me portal formosa">
                                </span>
                                Plantão de farmácia
                            </p>
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach($plantoes as $plantao)
                                    <li style="text-align: center;border-bottom: 1px solid #f1f1f1;">

                                        @if($plantao->long == null || $plantao->lat == null)
                                            <a href="https://www.google.com.br/maps/place/{{ $plantao->endereco }}"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ $plantao->endereco }}">
                                                <img src="{{ asset('img/svg/plantao/logo-plantao.svg') }}" width="50px"
                                                     alt=""> {{ $plantao->nome }}
                                            </a>
                                        @else
                                            <a href="https://www.google.com.br/maps/place/{{ $plantao->long }},{{ $plantao->lat }}"
                                               data-toggle="tooltip" data-placement="top"
                                               title="{{ $plantao->endereco }}">
                                                <img src="{{ asset('img/svg/plantao/logo-plantao.svg') }}" width="50px"
                                                     alt=""> {{ $plantao->nome }}
                                            </a>
                                        @endif

                                        &nbsp;•&nbsp;
                                        @if($plantao->long == null || $plantao->lat == null)
                                            <a href="https://www.google.com.br/maps/place/{{ $plantao->endereco }}">
                                                <img src="{{ asset('img/svg/plantao/mostre-me-icon.svg') }}"
                                                     width="30px" alt="Icone mostre-me portal formosa">
                                                Mostre-me
                                            </a>
                                        @else
                                            <a href="https://www.google.com.br/maps/place/{{ $plantao->long }},{{ $plantao->lat }}">
                                                <img src="{{ asset('img/svg/plantao/mostre-me-icon.svg') }}"
                                                     width="30px" alt="Icone mostre-me portal formosa">
                                                Mostre-me
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="panel-turisticos">
                        <header class="panel-header">
                            <h2>Pontos turísticos</h2>
                        </header>
                        <main class="panel-body">
                            <ul class="pontos-turisticos-list">
                                @foreach($pontos as $ponto)
                                    <li class="content-data-icon icon-endereco">
                                    <span class="text-map endereco">
                                        <a href="{{ $ponto->link }}">{{ $ponto->nome }}</a>
                                    </span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="fim-pontos-turistico">

                            </div>
                        </main>
                    </div>
                </div> <!-- Fim barra lateral de informações -->

            </div>
        </div>
    </section>

@endsection

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.min.css') }}">
    <style>
        .card-body {
            border-top: .5px solid rgba(116, 96, 238, 0.42);
        }
    </style>
@endsection

@section('script-src')
    <script src="{{ asset('/assets/owl/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/node_modules/jets/jets.min.js') }}"></script>
    <script src="{{ asset('/js/home.js') }}"></script>
    <script src="{{ asset('/js/default.min.js') }}"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection