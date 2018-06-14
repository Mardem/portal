@extends('layouts.default.v2.noticias')
@section('titlePage', 'Todas empresas online cadastrada no ')
@section('metaDescription', 'Aqui desenvolvo a meta description do site')
@section('metaKeywords', 'cadastrar empresa, minha empresa online, aparecer no google')

@section('container')

    <section class="container">
        <div class="apresentacao" align="center">
            <h1>Vejas as todas empresas que estão no Portal Formosa </h1>
            <h2 class="subtitulo"><i>
                    Encontrar uma empresa online nunca foi tão fácil!
                </i></h2>
            <p class="lead">
                Encontre abaixo uma variedade de empresas que estão cadastrado no
                <b><a href="{{ route('inicio') }}">Portal Formosa</a></b> se a sua empresa não está cadastrada no portal,
                 <b><a href="{{ route('cadastrarMinhaEmpresa') }}">cadastre</a> sua empresa</b>
                no Portal Formosa e apareça no Google com nossas técnicas de <a href="https://pt.wikipedia.org/wiki/Otimiza%C3%A7%C3%A3o_para_motores_de_busca">SEO</a> e Marketing Digital.
                Divulgue Gratuitamente a sua empresa no portal e compartilhe a sua empresa no <a href="https://www.facebook.com/">Facebook</a>,
                <a href="https://twitter.com/">Twitter</a> e <a href="https://pt.wikipedia.org/wiki/Rede_social#Vis%C3%A3o_geral">outras redes sociais</a>!
            </p>
        </div>
    </section>

    <section class="container filtro">
        <div class="card" style="padding: 0">
            <div class="card-header header-filtro ion-android-funnel">
                Filtro
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group" style="margin-right: 10px;">
                            <label for="" class="ion-ios-search-strong"> Pesquisar</label>

                            <form action="" id="form-pesquisa">
                                <input type="text" name="pesquisa" id="pesquisa" class="form-control"
                                       placeholder=" O que você procura?" value="{{ $pesquisado }}">
                            </form>

                        </div>
                    </div>


                    <div class="col-sm">
                        <div class="form-group" style="margin-right: 10px;">
                            <label for="" class="ion-bookmark"> Categoria</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <optgroup label="Categoria selecionada:">
                                    <option>{{ $categoriaSelecionada }}</option>
                                </optgroup>
                                <optgroup label="">

                                </optgroup>
                                <option value="">Nenhuma</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->nome }}">{{ ucfirst($categoria->nome) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <p align="right">
                            <a class="btn btn-link ion-ios-settings-strong" data-toggle="collapse" href="#avancado"
                               role="button" aria-expanded="false" aria-controls="avancado">
                                Avançado
                            </a>
                        </p>
                        <div class="collapse" id="avancado">
                            <div class="row border p-10 card-body">
                                <div class="col-sm-12">
                                    <div class="form-group" style="margin-right: 10px;">
                                        <label> <i class="fa fa-map-pin" aria-hidden="true"></i> Bairro</label>
                                        <select name="bairro" class="form-control" id="bairro">
                                            <optgroup label="Bairro selecionado:">
                                                <option>{{ $bairroSelecionado }}</option>
                                            </optgroup>

                                            @foreach($bairros as $bairro)
                                                <option value="{{ $bairro->bairro }}">{{ ucfirst($bairro->bairro) }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="resultado-noticias">

        <div class="container">

            @if($result->total() == 0)
                <div class="row">
                    <div class="container">
                        <div class="alert sem-resultado" role="alert" style="padding: 30px;">
                            Não foi encontrado nenhuma empresa pra essa pesquisa
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <p class="lead">
                            Veja aqui algumas opções alternativas:
                        </p>

                        <div class="row">
                            @foreach($outros as $empresa)
                                <div class="col-sm-4">
                                    <div class="card card-empresas">

                                        @if($empresa->imagem == '')
                                            <img src="{{ asset('img/svg/empresa-sem-imagem.svg') }}" alt=""
                                                 style="width: 100%!important;" class="imagem-header">
                                        @else
                                            <img src="{{ asset($empresa->imagem) }}"
                                                 alt="Imagem da nótica {{ $empresa->titulo }} que está no Portal Formosa"
                                                 class="imagem-header">
                                        @endif

                                        <div class="card-body">
                                            <p align="center">
                                                <a class="nome-empresa" href="">{{ $empresa->nome }}</a>
                                            </p>
                                            <p class="lead" align="justify">
                                            <ul>
                                                <li class="content-data-icon icon-endereco">
                                        <span class="text-map">
                                            {{ $empresa->endereco }}
                                        </span>
                                                </li>
                                                <li class="content-data-icon icon-numero">
                                        <span class="text-map">
                                            nº {{ $empresa->numero }}
                                        </span>
                                                </li>
                                                <li class="content-data-icon icon-bairro">
                                        <span class="text-map">
                                            {{ $empresa->bairro }}
                                        </span>
                                                </li>
                                                <li class="content-data-icon icon-estado-cid">
                                        <span class="text-map">
                                            {{ $empresa->cidade }}/{{ $empresa->estado }}
                                        </span>
                                                </li>
                                                <li class="content-data-icon icon-categoria">
                                        <span class="text-map categoria">
                                            <a href="?categoria={{ $empresa->categoria }}"
                                               style="color: #fff;">{{ $empresa->categoria }}</a>
                                        </span>
                                                </li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                @foreach($result as $empresa)
                    @php
                        try {
                            $port = \App\Models\Portfolio::where('empresa', $empresa->id)->count();
                        } catch (\Exception $e) {

                        }
                    @endphp

                    <div class="col-sm-4">
                        <div class="card card-empresas">

                            @if($empresa->imagem == '')
                                <img src="{{ asset('img/svg/empresa-sem-imagem.svg') }}" alt="Imagem padrão para {{ $empresa->nome }} que não tem imagens cadastradas"
                                     style="width: 100%!important" class="imagem-header">
                            @else
                                <img src="{{ asset($empresa->imagem) }}"
                                     alt="Imagem da nótica {{ $empresa->titulo }} que está no Portal Formosa"
                                     class="imagem-header">
                            @endif

                            <div class="card-body">
                                <p align="center">
                                    <b class="no-bolder"><a class="nome-empresa" href="">{{ $empresa->nome }}</a></b>
                                </p>
                                @if(isset($port) != 0)
                                    <span class="text-map categoria">
                                            <a href="?categoria={{ $empresa->categoria }}"
                                               style="color: #fff;">{{ $empresa->categoria }}</a>
                                        </span>
                                @else
                                @endif
                                <p class="lead" align="justify">
                                <ul>
                                    <li class="content-data-icon icon-endereco">
                                        <span class="text-map endereco">
                                            <b>{{ $empresa->endereco }}</b>
                                        </span>
                                    </li>
                                    <li class="content-data-icon icon-numero">
                                        <span class="text-map">
                                            nº {{ $empresa->numero }}
                                        </span>
                                    </li>
                                    <li class="content-data-icon icon-bairro">
                                        <span class="text-map">
                                            {{ $empresa->bairro }}
                                        </span>
                                    </li>
                                    <li class="content-data-icon icon-estado-cid">
                                        <span class="text-map">
                                            {{ $empresa->cidade }}/{{ $empresa->estado }}
                                        </span>
                                    </li>

                                    @if(isset($port) != 0)
                                        <li class="content-data-icon portolio">
                                            <span class="text-map">
                                                <a href="{{ route('portfolio', [$empresa->link]) }}" class="link-portfolio">
                                                    <img src="{{ asset('img/svg/icones/empresa-portolio-icon.svg') }}" width="30" alt=""> Acessar portfólio
                                                </a>
                                            </span>
                                        </li>
                                    @else
                                        <li class="content-data-icon icon-categoria">
                                        <span class="text-map categoria">
                                            <a href="?categoria={{ $empresa->categoria }}"
                                               style="color: #fff;">{{ $empresa->categoria }}</a>
                                        </span>
                                        </li>
                                    @endif
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col">
                    <div class="float-right">
                        {{ $result->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@section('styles-src')
    <link rel="stylesheet" href="{{ asset('css/navbar-nivel-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/todas-empresas.min.css') }}">
@endsection

@section('script-src')
    <script src="{{ asset('js/default/todas-empresas.min.js') }}"></script>
@endsection