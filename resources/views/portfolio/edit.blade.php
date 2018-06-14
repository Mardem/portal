@extends('layouts.portfolio.estrutura')
@section('tituloPort', 'Portfólio ' . $portfolio->nome)
@section('nomeEmpresa', $portfolio->nome)

@section('imagemPrincipal', $imagemCarregada)

@section('container')
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand back-portal" href="{{ route('verEmpresaUsuario', ['id' => $portfolio->id]) }}">
                <ion-icon name="arrow-round-back"></ion-icon>
                Voltar a dashboard</a>
        </nav>

        <div class="container">
            <div class="row">
                @if($checkPadrao == 0)
                    <div class="alert alert-danger" style="width: 100%;background-color: #b50011;" align="center">
                        <h3 style="color: #fff;text-transform: inherit">Para começar a editar, por favor crie um novo
                            padrão de cores!</h3>

                        <form action="{{ route('criarNovoPadraoCores') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $portfolio->id }}">
                            <button class="btn btn-danger btn-block">
                                Criar padrão
                            </button>
                        </form>

                    </div>
                @else
                    <div class="col-sm-4">
                        <div id="editBarraLateral">
                            <br>
                            <p>
                                <ion-icon name="color-fill"></ion-icon>
                                Altere a cor da sua barra lateral
                            </p>

                            @php
                                try {
                                $cor = '#0079e0';
                                    if ($pegaPadroes->barralateral == '') {
                                            $cor = '#0079e0';
                                    } else {
                                        $cor = $pegaPadroes->barralateral;
                                    }
                            } catch(\Exception $e) {
                            }
                            @endphp

                            <form action="{{ route('salvarCoresPortfolio') }}" method="post">
                                @csrf
                                <input type="hidden" name="code" value="0">
                                <input type="hidden" name="empresa" value="{{ $portfolio->id }}">
                                <input type="hidden" name="id" value="{{ $pegaPadroes->id }}">
                                <div id="pickerBarraLateral" class="input-group colorpicker-component"
                                     title="Alterar cor da barra lateral" data-color="{{ $cor }}">
                                    <input type="hidden" name="background" aria-describedby="basic-addon1"
                                           id="inputBarra">
                                    <span class="input-group-addon" id="basic-addon1"
                                          style="text-align: center;color: #fff;padding: 10px;width: 100%;margin-bottom: 10px;">
                                    <b><ion-icon name="color-palette"></ion-icon> Barra lateral</b>
                                </span>
                                </div>
                                <button class="btn btn-success btn-block">
                                    <ion-icon name="save"></ion-icon>
                                    Salvar
                                </button>
                            </form>

                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div id="editBarraLateral">
                            <br>
                            <p>
                                <ion-icon name="image"></ion-icon>
                                Alterar imagem da barra lateral
                            </p>

                            <form action="{{ route('imagemPortfolio') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="file" class="form-control" name="imagem" style="margin-bottom: 10px;" required>
                                <input type="hidden" value="{{ $portfolio->link }}" name="link">
                                <input type="hidden" value="{{ $pegaPadroes->id }}" name="id">

                                <button class="btn btn-success btn-block">
                                    <ion-icon name="save"></ion-icon>
                                    Salvar
                                </button>
                            </form>

                        </div>
                    </div>
                @endif
            </div>
        </div>


        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
                <h1 class="mb-0">
                    {{ $portfolio->nome }}
                </h1>
                <div class="subheading mb-5">
                    <ion-icon name="pin"></ion-icon>
                    {{ $portfolio->endereco }}, nº {{ $portfolio->numero }}
                    - {{ $portfolio->bairro }}
                    - {{ $portfolio->cidade }}/{{ $portfolio->estado }}
                    <br>
                    @php
                        try {
                        $email = \App\User::where('cpf', '=', $portfolio->cpf)->get()[0];
                    } catch (\Exception $exception) {
                    }
                    @endphp
                    <ion-icon name="mail"></ion-icon>
                    E-mail: <a href="mailto:name@email.com" style="color: {{ $cor }};">{{ $email->email }}</a>
                    <br>
                    <ion-icon name="call"></ion-icon> Tel: {{ $portfolio->telefone }}
                </div>

                <p class="mb-5">
                    {{ $pegaPadroes->txtapresentacao }}
                </p>

                <form action="{{ route('salvarFrase') }}" method="post" style="margin-bottom: 6px;">
                    @csrf
                    <b>Escreva uma descrição sobre sua empesa ou uma frase impacto:</b>
                    <br>
                    <button class="btn btn-info" type="button" id="criarFrase"><ion-icon name="add-circle-outline"></ion-icon> Criar</button>

                    <div class="hidden" style="margin-top: 10px" id="frase">
                        <textarea name="frase" placeholder="{{ $pegaPadroes->txtapresentacao }}" id="frase" cols="10"
                                  rows="10" class="form-control" style="resize: none" maxlength="260"></textarea>
                        <small style="float: right;">
                            <i>Máximo 260 caracteres.</i>
                        </small>
                        <input type="hidden" value="{{ $pegaPadroes->id }}" name="id">
                        <button class="btn btn-success " style="margin-top: 10px;">
                            <ion-icon name="save"></ion-icon>
                            Salvar
                        </button>
                    </div>

                </form>


                <ul class="list-inline list-social-icons mb-0">
                    <li class="list-inline-item">
                        <a href="{{ $portfolio->facebook }}" style="color: {{ $cor  }}8f"
                           onmouseover="this.style.color='{{ $cor }}'"
                           onmouseout="this.style.color='{{ $cor  }}8f'">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" style="color: {{ $cor  }}8f" onmouseover="this.style.color='{{ $cor }}'"
                           onmouseout="this.style.color='{{ $cor  }}8f'"
                        >
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" style="color: {{ $cor  }}8f" onmouseover="this.style.color='{{ $cor }}'"
                           onmouseout="this.style.color='{{ $cor  }}8f'"
                        >
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.google.com.br/maps/place/-15.5363159,-47.3351549"
                           style="color: {{ $cor  }}8f" onmouseover="this.style.color='{{ $cor }}'"
                           onmouseout="this.style.color='{{ $cor  }}8f'"
                        >
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <a href="{{ route('verEmpresaUsuario', ['id' => $portfolio->id]) }}" class="links">
                    <ion-icon name="create"></ion-icon>
                    Alterar redes sociais</a>
            </div>
        </section>

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="products">
            <div class="my-auto">
                <h2 class="mb-2">Produtos</h2>
                <p>
                    {{ $pegaPadroes->txtprodutos }}
                </p>

                <form action="{{ route('salvarTxtProdutos') }}" method="post" style="margin-bottom: 6px;">
                    @csrf
                    <b>Escreva uma descrição sobre os produtos da sua empresa:</b>
                    <br>
                    <button class="btn btn-info" type="button" id="CriarfraseProdutos"><ion-icon name="add-circle-outline"></ion-icon> Criar</button>
                    <div class="hidden" style="margin-top: 10px" id="fraseProdutos">
                        <textarea name="frase" placeholder="{{ $pegaPadroes->txtprodutos }}" id="frase" cols="10" rows="10"
                                  class="form-control" style="resize: none" maxlength="260"></textarea>
                        <small style="float: right;">
                            <i>Máximo 260 caracteres.</i>
                        </small>
                        <input type="hidden" value="{{ $pegaPadroes->id }}" name="id">
                        <button class="btn btn-success " style="margin-top: 10px;">
                            <ion-icon name="save"></ion-icon>
                            Salvar
                        </button>
                    </div>
                </form>

                <div class="resume-item mb-5">
                    <div class="container">
                        <div class="row">
                            <button class="btn btn-info" id="imagensProd">Adicionar imagens de produtos</button>

                            <div class="hidden" id="upImgProd" style="padding-left: 5px;">
                                <small>
                                    Adicione no máximo 4 imagens de produtos, quando for atingido o limite as imagens deverá ser apagada ou editadas.
                                </small>
                                <form action="{{ route('imgProdutoPort') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control" name="imagem" style="margin-bottom: 10px;" required>
                                    <input type="hidden" value="{{ $portfolio->link }}" name="link">
                                    <input type="hidden" value="{{ $portfolio->id }}" name="id">
                                    <input type="hidden" name="img" value="{{ $imagens->count() }}">
                                    <button class="btn btn-success">
                                        <ion-icon name="save"></ion-icon>
                                        Salvar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <br> <br>
                        <div class="row">

                            @if($imagens->count() == 0)
                                <div class="col-sm-6 mb-2">
                                    <img src="{{ asset('img/svg/portfolio/portfolio-sem-imagem-portal-formosa.svg') }}"
                                         class="img-fluid" style="max-width: 460px">
                                </div>
                                @else
                                @foreach($imagens as $imagem)
                                    <div class="col-sm-6 mb-2">
                                        <img src="{{ asset($imagem->link) }}"
                                             class="img-fluid" style="max-width: 460px">

                                        <form action="{{ route('removeProdutoPort') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $imagem->id }}">
                                            <input type="hidden" name="local" value="{{ $imagem->link }}">
                                            <button class="btn" style="background: #fbfbfb;border-radius: 0">
                                                <ion-icon name="remove-circle-outline"></ion-icon> Remover
                                            </button>
                                        </form>

                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
            <div class="my-auto">
                <h2 class="mb-5">Galeria</h2>

                <div class="resume-item d-flex flex-column flex-md-row mb-5" align="center">
                    <div class="resume-content mr-auto">
                        <h3 class="mb-3">
                            Veja as fotos da empresa {{ $portfolio->nome }}
                        </h3>

                        <div class="row">
                            <div class="container" style="margin-bottom: 5px;">
                                <button type="button" class="btn btn-info" id="btAdicionarGaleria">
                                    Adicionar imagens
                                </button>

                                <div class="hidden" id="imagemGaleria">
                                    <p class="lead">Adicionar imagens na galeria</p>
                                    <small>
                                        Adicione no máximo 4 imagens na galeria, quando for atingido o limite as imagens deverá ser apagada ou editadas.
                                    </small>
                                    <form action="{{ route('imgGaleriaPort') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" class="form-control" name="imagem" style="margin-bottom: 10px;" required>
                                        <input type="hidden" value="{{ $portfolio->link }}" name="link">
                                        <input type="hidden" value="{{ $portfolio->id }}" name="id">
                                        <input type="hidden" name="img" value="{{ $galeria->count() }}">
                                        <div align="left">
                                            <button class="btn btn-success">
                                                <ion-icon name="save"></ion-icon>
                                                Salvar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @if($galeria->count() == 0)
                                <div class="col-sm-6" style="margin-bottom: 10px">
                                    <img src="{{ asset('img/svg/portfolio/portfolio-sem-imagem-portal-formosa.svg') }}"
                                         width="400px" alt="">
                                </div>
                                <div class="col-sm-6" style="margin-bottom: 10px">
                                    <img src="{{ asset('img/svg/portfolio/portfolio-sem-imagem-portal-formosa.svg') }}"
                                         width="400px" alt="">
                                </div>
                                <div class="col-sm-6" style="margin-bottom: 10px">
                                    <img src="{{ asset('img/svg/portfolio/portfolio-sem-imagem-portal-formosa.svg') }}"
                                         width="400px" alt="">
                                </div>
                                <div class="col-sm-6" style="margin-bottom: 10px">
                                    <img src="{{ asset('img/svg/portfolio/portfolio-sem-imagem-portal-formosa.svg') }}"
                                         width="400px" alt="">
                                </div>
                            @else
                                @foreach($galeria as $imagem)
                                    <div class="col-sm-6 mb-2">
                                        <img src="{{ asset($imagem->link) }}"
                                             class="img-fluid" style="max-width: 460px">

                                        <form action="{{ route('removeGaleriaPort') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $imagem->id }}">
                                            <input type="hidden" name="local" value="{{ $imagem->link }}">
                                            <button class="btn" style="background: #fbfbfb;border-radius: 0">
                                                <ion-icon name="remove-circle-outline"></ion-icon> Remover
                                            </button>
                                        </form>

                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <i class="lead" style="font-size: 15px">
                {{ $portfolio->nome }} gerado pelo <a href="{{ route('inicio') }}">Portal Formosa</a>
            </i>

        </section>
    </div>
@endsection

@section('scripts-src')
    <script src="{{ asset('js/vendor/bootstrap-color-picker/dist/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('js/edit-portfolio.min.js') }}"></script>
    <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>

    @if(Session::has('error'))
        <script>
            swal({
                title: "Ocorreu um erro!",
                text: "{{ Session::get('error') }}",
                button: "OK!",
                icon: "error"
            });
        </script>
    @endif
    @if(Session::has('success'))
        <script>
            swal({
                title: "Tudo certo",
                text: "{{ Session::get('success') }}",
                button: "OK!",
                icon: "success"
            });
        </script>
    @endif
@endsection

@section('links-src')
    <link rel="stylesheet" href="{{ asset('js/vendor/bootstrap-color-picker/dist/css/bootstrap-colorpicker.css') }}">
    <style>
        a.links {
            color: {{ $pegaPadroes->barralateral }}   !important;
        }

        .hidden {
            display: none;
        }
        .show {
            display: block;
        }
    </style>
@endsection