@extends('layouts.default.noticia-pesquisa')

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/pesquisa.min.css') }}">
    <style>
        #entrada {
            background: url("{{ asset('img/svg/banner-pesquisa.svg') }}") no-repeat fixed;
        }
    </style>
@endsection

@section('container')
    <section id="entrada">
        <div class="row">
            <div class="offset-sm-6 offset-md-6 offset-lg-6 col-sm-6 texto-pesquisa">
                <br><br><br><br>
                <h1>
                    Busca: {{ $pesquisado }}
                </h1>
                <p class="lead">
                    Encontre aqui resultados para a sua busca {{ $pesquisado }}, se não encontrar o que queria use também o <u><a href="#" onclick="$('#filtro').animatescroll({scrollSpeed:2000,easing:'easeInCubic'});" class="link-destaque ion-funnel"> filtro</a></u>
                    para melhorar sua busca.
                </p>
                <form action="{{ route('pesquisaEmpresa') }}" method="get">
                    <input type="text" name="q" class="form-control input-pesquisa" placeholder=" Realizar uma nova busca">
                </form>
            </div>
        </div>
    </section>

    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="text-align: center;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#pesquisaNavbar" aria-controls="pesquisaNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ion-navicon-round toggle"></i>
            </button>
            <div class="collapse navbar-collapse" id="pesquisaNavbar">
                <a class="navbar-brand ion-arrow-left-a" href="{{ route('inicio') }}" style="border-bottom: 1px solid rgba(255,255,255, 0.5);"> Portal Formosa</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <li class="nav-item active">
                        <a class="link-nav" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </div>
            </div>
        </nav>
    </section>

    <section class="filtro" id="filtro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card opt-filtro">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text"
                                       name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Help text</small>
                            </div>

                            <div class="form-group">
                                <label for=""></label>
                                <select name="categoria" class="form-control" id=""></select>
                                <small id="helpId" class="text-muted">Help text</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="resultados-busca">
        <div class="container">
            <div class="row">
                <legend>
                    Empresas encontradas (8)
                </legend>
                <div class="col-sm-3">

                    <div class="card">
                        <img class="card-img-top" src="https://i.redd.it/ounq1mw5kdxy.gif" data-src="{{ asset('img/svg/padrao-pesquisa-0.svg') }}" width="50px" alt="Card image cap">
                        <div class="card-body card-body-news">
                            <h5 class="card-title card-title-pf">
                                <a href="#">
                                    Drogaria Wanessa
                                </a>
                            </h5>
                            <p class="card-text">
                                AV. Valeriano de Castro 455 - Formosa GO
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@component('layouts.default.components.busca-fundo')
@endcomponent

@endsection

@section('script-src')
    <script src="{{ asset('/js/vendor/jquery.fixit.js') }}"></script>
    <script src="https://unipre.org/plugins/animatescroll/animatescroll.min.js"></script>
    <script src="{{ asset('/js/pesquisa.min.js') }}"></script>

@endsection