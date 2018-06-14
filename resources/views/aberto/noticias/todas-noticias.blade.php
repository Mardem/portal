@extends('layouts.default.v2.noticias')
@section('titlePage', 'Todas as notícias do site - ')
@section('container')

    <section class="container">
        <div class="apresentacao" align="center">
            <h1>Vejas as todas notícias que estão no Portal Formosa </h1>
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolore nam optio voluptatibus?
                Asperiores delectus illo laborum nostrum perspiciatis quidem, rem sit ut veniam? Adipisci dolores
                eligendi fuga rem veniam?
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
                                    <option id="categoriaSelecionada"></option>
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
                                <label for="" class="ion-ios-person"> Autor</label>
                                <select name="categoria" class="form-control" id="autor">
                                    <optgroup label="Autor selecionada:">
                                        <option id="autorSelecionado"></option>
                                    </optgroup>
                                    <optgroup label="">

                                    </optgroup>
                                    <option value="">Nenhum</option>

                                    @foreach($autoresCadastrado as $autor)
                                        <option value="{{ $autor->name }}">{{ $autor->name }}</option>
                                    @endforeach
                                </select>
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
                            Não foi encontrado nenhuma notícia pra essa pesquisa
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <p class="lead">
                            Veja aqui algumas opções alternativas:
                        </p>

                        <div class="row">
                            @foreach($outros as $noticia)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <img src="{{ asset($noticia->imagem) }}"
                                             alt="Imagem da nótica {{ $noticia->titulo }} que está no Portal Formosa"
                                             class="imagem-header">
                                        <div class="card-body">
                                            <p align="center">
                                                <a href="{{ url($noticia->link) }}">{{ $noticia->titulo }}</a>
                                            </p>
                                            <p class="lead" align="justify">
                                                {{ $noticia->descricao }}
                                            </p>

                                            <p>
                                                @if($noticia->categoria == 'Educação')
                                                    <span style="float: right;" class="label l-esporte">
                                                        {{ $noticia->categoria }}
                                                    </span>
                                                @elseif ($noticia->categoria == 'Política')
                                                    <span style="float: right;" class="label l-politica">
                                                        {{ $noticia->categoria }}
                                                    </span>
                                                @endif
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
                @foreach($result as $noticia)
                    <div class="col-sm-4">
                        <div class="card">
                            <img src="{{ asset($noticia->imagem) }}"
                                 alt="Imagem da nótica {{ $noticia->titulo }} que está no Portal Formosa"
                                 class="imagem-header">
                            <div class="card-body">
                                <p align="center">
                                    <a href="{{ url($noticia->link) }}">{{ $noticia->titulo }}</a>
                                </p>
                                <p class="lead" align="justify">
                                    {{ $noticia->descricao }}
                                </p>
                                <p>

                                    @php
                                        $cor = \App\Models\Categoria::where('nome', '=', $noticia->categoria)->get()[0];
                                    @endphp

                                    <span style="float: right;background: {{ $cor->fundo }} !important;" class="label">
                                        <a href="?categoria={{ $noticia->categoria }}" style="color: #fff">{{ $noticia->categoria }}</a>
                                    </span>

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
    <link rel="stylesheet" href="{{ asset('css/todas-noticias.min.css') }}">
    <style>
        .main {
            display: block !important;
        }
    </style>
@endsection

@section('script-src')
    <script src="{{ asset('js/default/todas-noticias.js') }}"></script>
@endsection