@extends('layouts.default.dashboard')

@section('localSite', 'Visualizar empresa')
@section('title', 'Visualização de empresas - Portal Formosa')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('todosCadastros') }}">Empresas</a></li>
        <li class="breadcrumb-item active">{{ $e->nome }}</li>
    </ol>
@endsection
@section('container')
    <div class="container">

        <div class="card">
            <div class="row">
                <div class="container">
                    <b>
                        <i class="fa fa-image" aria-hidden="true"></i> Adicionar imagem da empresa (Busca)
                    </b><br>

                    <form action="{{ route('salvarImagemEmpresa') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $e->id }}">

                        <input type="file" name="imagem" class="form-control m-b-5">
                        <button type="submit" class="btn btn-success m-b-30">
                            <i class="fa fa-save" aria-hidden="true"></i> Salvar
                        </button>
                        <br>
                        <small>
                            As imagens devem ter no máximo: <br>
                            <b>
                                Lagura: 350px <br>
                                Altura: 170px <br>
                                Tamanho: 200kB <br>
                            </b>
                            <b class="text-danger">
                                <i class="fa fa-warning" aria-hidden="true"></i> Imagens com o tamanho superior não será aceito.
                            </b>
                        </small>



                    </form>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="row">
                <div class="col-sm-12" align="center">
                    <h1 class="lead" style="font-size: 3.25rem;margin-bottom: 25px;color: #185cef;">{{ $e->nome }}</h1>
                </div>
                <div class="col-sm-4">
                    <label><b>Endereço:</b> {{ $e->endereco }}</label>
                </div>
                <div class="col-sm-4">
                    <label>
                        <b>Categoria:</b>
                        @if($e->categoria == 'x')
                            Não cadastrado (Cadastro externo)
                        @else
                            {{ $e->categoria }}
                        @endif
                    </label>
                </div>
                <div class="col-sm-4">
                    <label><b>Telefone:</b>

                        @if($e->telefone == '')
                            <b class="text-danger ion-close-round"> Não cadastrado</b>
                            <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                @csrf
                                <input type="text" id="telefone" name="telefone" class="form-control"
                                       placeholder="Digite o telefone">
                                <input type="text" name="opt" class="hidden" value="4">
                                <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                <button class="btn btn-primary btn-block" type="submit"
                                        style="border-radius:0 0 5px 5px">
                                    Atualizar
                                </button>
                            </form>
                        @else
                            {{ $e->telefone }}
                        @endif
                    </label>
                </div>

                <div class="col-sm-4" style="border: 1px solid #efefef;padding: 10px;border-radius: 10px">
                    <label><b>Status atual da empresa</b></label>
                    @if($e->revisado == 1)
                        <b class="text-success">(Ativo)</b>
                    @else
                        <b class="text-danger">(Desativado)</b>
                    @endif


                    <br>
                    @if($e->revisado == 1)

                        <form action="{{ route('alterarStatusEmpresa') }}" method="post">
                            @csrf
                            <input type="hidden" name="code" value="0">
                            <input type="hidden" name="id" value="{{ $e->id }}">
                            <button href="#" class="btn btn-danger"> <i class="fa fa-toggle-off" aria-hidden="true"></i> Desativar</button>
                        </form>

                        @else
                        <form action="{{ route('alterarStatusEmpresa') }}" method="post">
                            @csrf
                            <input type="hidden" name="code" value="1">
                            <input type="hidden" name="id" value="{{ $e->id }}">
                            <button href="#" class="btn btn-success"> <i class="fa fa-toggle-on" aria-hidden="true"></i> Ativar</button>
                        </form>
                    @endif

                </div>
            </div>

            <div class="row">
                <div class="container">
                    @if($e->categoria == 'x')
                        <div class="col-md-6 offset-md-2">
                            <h3 align="center"><b><u>Cadastre a categoria:</u></b></h3>
                            <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                @csrf

                                <select name="categoriaCadastro" id="categoriaCadastro" class="form-control">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->nome }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>

                                <input type="text" name="opt" class="hidden" value="11">
                                <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                <button class="btn btn-danger btn-block" type="submit"
                                        style="border-radius:0 0 5px 5px">
                                    Cadastrar e Liberar
                                </button>
                            </form>
                            <small>
                                <i>Quando você cadastra a empresa, automaticamente estará liberando a mesma.</i> <br>
                                A empresa não se encaixa em nenhuma categoria?
                                <b class="pointer" id="criarCategoria">Crie uma nova!</b>
                            </small>

                            <div id="categoria" class="oculte">
                                @include('layouts.default.components.cadastrar-categoria-empresa')
                            </div>

                        </div>

                        <br><br>
                        <br><br>

                        <br><br>
                    @else
                        <br><br>
                    @endif
                </div>
            </div>

            <div class="row">
                <hr style="width:80%">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-3">
                            <label>
                                <b>CNPJ:</b>
                                @if($e->cnpj == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" id="cnpj" name="cnpj" class="form-control"
                                               placeholder="Digite o CNPJ">
                                        <input type="text" name="opt" class="hidden" value="0">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    @php
                                        $data = Crypt::decryptString($e->cnpjView);
                                    @endphp

                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" id="cnpj" name="cnpj" class="form-control"
                                               value="{{ $data }}" placeholder="Digite o CNPJ">
                                        <input type="text" name="opt" class="hidden" value="0">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label>
                                <b>Razão Social:</b>
                                @if($e->razaoSocial == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" name="razao_social" class="form-control"
                                               placeholder="Digite a Razão Social">
                                        <input type="text" name="opt" class="hidden" value="1">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" name="razao_social" class="form-control"
                                               value="{{ $e->razaoSocial }}" placeholder="Digite a Razão Social">
                                        <input type="text" name="opt" class="hidden" value="1">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label>
                                <b>Celular:</b>
                                @if($e->celular == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" id="celular" name="celular" class="form-control"
                                               placeholder="Digite o nº de celular">
                                        <input type="text" name="opt" class="hidden" value="2">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" id="celular" name="celular" class="form-control"
                                               value="{{ $e->celular }}" placeholder="Digite o nº de celular">
                                        <input type="text" name="opt" class="hidden" value="2">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <label>
                                <b>Email:</b>
                                @if($e->email == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Digite o email">
                                        <input type="text" name="opt" class="hidden" value="3">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Digite o email" value="{{ $e->email }}">
                                        <input type="text" name="opt" class="hidden" value="3">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                    </div>
                    <br><br>
                    <div class="row" align="center">
                        <div class="col-sm-12" align="center">
                            <h2 class="lead" style="margin: 20px 0;font-size: 2em;">Redes Sociais</h2>
                        </div>
                        <div class="col-sm-4">
                            <label>
                                <b><i class="fa fa-facebook"></i> Facebook:</b>
                                @if($e->facebook == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="facebook" class="form-control"
                                               placeholder="Link da página">
                                        <input type="text" name="opt" class="hidden" value="5">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else

                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="facebook" class="form-control"
                                               value="{{ $e->facebook }}" placeholder="Link da página">
                                        <input type="text" name="opt" class="hidden" value="5">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>

                                @endif
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label>
                                <b> <i class="fa fa-linkedin"></i> Linkedin:</b>
                                @if($e->linkedin == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="linkedin" class="form-control"
                                               placeholder="Link da página">
                                        <input type="text" name="opt" class="hidden" value="6">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="linkedin" class="form-control"
                                               value="{{ $e->linkedin }}" placeholder="Link da página">
                                        <input type="text" name="opt" class="hidden" value="6">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label>
                                <b> <i class="fa fa-twitter"></i> Twitter:</b>
                                @if($e->twitter == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="twitter" class="form-control"
                                               placeholder="Link da página">
                                        <input type="text" name="opt" class="hidden" value="7">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="twitter" class="form-control" value="{{ $e->twitter }}"
                                               placeholder="Link da página">
                                        <input type="text" name="opt" class="hidden" value="6">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label>
                                <b><i class="fa fa-google-plus" aria-hidden="true"></i> Google Plus:</b>
                                @if($e->googlePlus == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="googlePlus" class="form-control"
                                               placeholder="Link do perfil">
                                        <input type="text" name="opt" class="hidden" value="8">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="googlePlus" class="form-control"
                                               value="{{ $e->googlePlus }}" placeholder="Link do perfil">
                                        <input type="text" name="opt" class="hidden" value="8">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <label>
                                <b><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube:</b>
                                @if($e->youtube == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="youtube" class="form-control"
                                               placeholder="Link do canal">
                                        <input type="text" name="opt" class="hidden" value="9">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="url" name="youtube" class="form-control" value="{{ $e->youtube }}"
                                               placeholder="Link do canal">
                                        <input type="text" name="opt" class="hidden" value="9">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                    </form>
                                @endif
                            </label>
                        </div>

                        <div class="col-sm-4">
                            <label>
                                <b><i class="fa fa-globe" aria-hidden="true"></i> Link Personalizado:</b>
                                @if($e->link == '')
                                    <b class="text-danger ion-close-round"> Não cadastrado</b>
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" name="link" class="form-control"
                                               placeholder="Link para empresa">
                                        <input type="text" name="opt" class="hidden" value="10">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Gerar
                                        </button>
                                        <small>
                                            Link personalizado para a empresa ser apresentada em nosso site
                                        </small>
                                    </form>
                                @else
                                    <form action="{{ route('atualizarDadosEmpresa') }}" method="post">
                                        @csrf
                                        <input type="text" name="link" class="form-control" value="{{ $e->link }}"
                                               placeholder="Link para empresa">
                                        <input type="text" name="opt" class="hidden" value="10">
                                        <input type="text" name="id" class="hidden" value="{{ $e->id }}">
                                        <button class="btn btn-primary btn-block" type="submit"
                                                style="border-radius:0 0 5px 5px">
                                            Atualizar
                                        </button>
                                        <small>
                                            Link personalizado para a empresa ser apresentada em nosso site
                                        </small>
                                    </form>
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12" align="center">
                            <h2 class="lead" style="font-size: 1.8em;">
                                Plano atual:

                                <b>@if($e->plano == 0)
                                        Grátis
                                    @elseif($e->plano == 1)
                                        Básico
                                    @elseif($e->plano == 2)
                                        Intermediário
                                    @elseif($e->plano == 3)
                                        Avançado
                                    @endif</b>

                            </h2>

                            <hr>

                            <small>
                                Use a ferramenta para alterar o plano do usuário. <br>
                                Plano atual do usuário é:
                                <b>
                                    @if($e->plano == 0)
                                        Grátis
                                    @elseif($e->plano == 1)
                                        Básico
                                    @elseif($e->plano == 2)
                                        Intermediário
                                    @elseif($e->plano == 3)
                                        Avançado
                                    @endif
                                </b>
                            </small>
                            <form action="{{ route('atualizarPlano') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$e->id}}">
                                <select name="plano" class="form-control">
                                    <option value="0">Grátis</option>
                                    <option value="1">Básico</option>
                                    <option value="2">Intermediário</option>
                                    <option value="3">Avançado</option>
                                </select>
                                <button class="btn btn-primary" type="submit" style="margin-top: 5px;"><i class="fa fa-save"></i>
                                    Atualizar plano
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-src')
    <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
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

    @if(Session::has('error'))
        <script>
            swal({
                title: "Ops!",
                text: "{{ Session::get('error') }}",
                button: "OK!",
                icon: "error"
            });
        </script>
    @endif
    <script>
        $('#telefone').inputmask("(99) 9999-9999");
        $('#cnpj').inputmask("99.999.999/9999-99");
        $('#celular').inputmask("(99) 9 9999-9999");

        $( "#criarCategoria" ).click(function() {
            $('#categoria').toggleClass( "display" );
        });
    </script>
@endsection

@section('links-src')
    <style>
        .pointer:hover {
            cursor: pointer !important;
        }
        .oculte {
            display: none;
        }
        .display {
            display: block;
        }
    </style>
@endsection