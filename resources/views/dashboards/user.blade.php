@extends('layouts.default.dashboard')

@can('admin')
    @section('title', 'Dashboard administrativa - Portal Formosa')
@endcan
@section('container')
    <div class="container-fluid">
        <!-- Start Page Content -->

        @if(Auth::user()->cpf == '' || Auth::user()->cpf == md5('') )
            <div class="alert" role="alert" style="background: #ff2247;color: #fff;text-align: center">
                <strong>Seus dados ainda estão incompletos! Confirme os seus dados para tirar o máximo de proveito da
                    plataforma.</strong>
                <br><br>
                <a href="{{ route('dadosUsuarios') }}" class="btn btn-dark">Completar dados</a>
            </div>
        @else
        @endif


        @can('admin')
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{ $UsersPagos }}</h2>
                                <p class="m-b-0">Clientes pagos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>1178</h2>
                                <p class="m-b-0">Vendas do mês</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{ $gEmpresasA->count() }}</h2>
                                <p class="m-b-0">Empresas cadastradas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>{{ $cUsersA }}</h2>
                                <p class="m-b-0">Usuários cadastrados</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('user')

            <div class="offset-md-4 col-md-4">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-industry f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2></h2>
                            <p class="m-b-0">Empresa cadastrada</p>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        {{--

          <div class="row bg-white m-l-0 m-r-0 box-shadow ">

          <!-- column -->
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Extra Area Chart</h4>
                <div id="extra-area-chart"></div>
              </div>
            </div>
          </div>
          <!-- column -->

          <!-- column -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body browser">
                <p class="f-w-600">iMacs <span class="pull-right">85%</span></p>
                <div class="progress ">
                  <div role="progressbar" style="width: 85%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                </div>

                <p class="m-t-30 f-w-600">iBooks<span class="pull-right">90%</span></p>
                <div class="progress">
                  <div role="progressbar" style="width: 90%; height:8px;" class="progress-bar bg-info wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                </div>

                <p class="m-t-30 f-w-600">iPhone<span class="pull-right">65%</span></p>
                <div class="progress">
                  <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                </div>

                <p class="m-t-30 f-w-600">Samsung<span class="pull-right">65%</span></p>
                <div class="progress">
                  <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                </div>

                <p class="m-t-30 f-w-600">android<span class="pull-right">65%</span></p>
                <div class="progress m-b-30">
                  <div role="progressbar" style="width: 65%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                </div>
              </div>
            </div>
          </div>
          <!-- column -->

        --}}

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    @can('user')
                        <h4>Suas empresas</h4>
                    @endcan
                    @can('admin')
                        <h4>Empresas cadastradas</h4>
                    @endcan
                </div>
                <div class="card-body">

                    @can('admin')
                        @if($gEmpresasA->count() == 0)
                            <h2 style="text-align: center">Ainda não existe nenhuma empresa cadastrada!</h2>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Plano</th>
                                        <th>CPF</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gEmpresasA as $empresaA)
                                        <tr>
                                            <td>
                                                {{ $empresaA->id }}
                                            </td>
                                            <td>
                                                {{ $empresaA->nome }}
                                            </td>
                                            <td>
                                                <b style="padding: 5px;border-radius: 4px;background: #4392F1;color: #fff;text-transform: uppercase;">
                                                    @if($empresaA->plano == 0)
                                                        Grátis
                                                    @elseif($empresaA->plano == 1)
                                                        Básico
                                                    @elseif($empresaA->plano == 2)
                                                        Intermediário
                                                    @elseif($empresaA->plano == 3)
                                                        Avançado
                                                    @endif
                                                </b>
                                            </td>
                                            <td>
                                                {{ $empresaA->cpf }}
                                            </td>
                                            <td>
                                                <a href="{{ route('verEmpresa', [$empresaA->id]) }}">
                                                    <span class="badge badge-success" style="padding: 10px;"> Ver</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endcan

                    @can('user')
                        @if($gEmpresasU->count() == 0)

                            <h2 style="text-align: center">Você ainda não tem nenhuma empresa cadastrada.</h2>
                            <small>
                                Quando você tiver uma empresa cadastrada você poderá:
                                <ul>
                                    <li style="list-style-type: circle">Ver a empresa no site</li>
                                    <li style="list-style-type: circle">Alterar o Plano</li>
                                    <li style="list-style-type: circle">Adicionar mídias sociais</li>
                                    <li style="list-style-type: circle">Adicionar um portfólio online</li>
                                    <li style="list-style-type: circle">Apresentar sua empresa para clientes</li>
                                    <li style="list-style-type: circle">Aparecer no Google</li>
                                    <li style="list-style-type: circle">Poderá ser encontrado facilmente</li>
                                </ul>
                                E muito mais...
                            </small>
                            <br><br>
                            O que você está esperando? <a href="{{ route('cadastrarMinhaEmpresa') }}"><b>Cadastre sua
                                    empresa agora!</b></a>
                        @else
                            @can('user')
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Plano</th>
                                            <th>Telefone</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gEmpresasU as $empresaU)
                                            <tr>
                                                <td>
                                                    {{ $empresaU->id }}
                                                </td>
                                                <td>
                                                    {{ $empresaU->nome }}
                                                    @if($empresaU->revisado == 0)
                                                        <b class="text-danger">
                                                            (Não liberado)
                                                        </b>
                                                        @else
                                                        <b class="text-success">(Liberado)</b>
                                                    @endif
                                                </td>
                                                <td>

                                                    <b style="padding: 5px;border-radius: 4px;background: #4392F1;color: #fff;text-transform: uppercase;">
                                                    @if($empresaU->plano == 0)
                                                        Grátis
                                                    @elseif($empresaU->plano == 1)
                                                        Básico
                                                    @elseif($empresaU->plano == 2)
                                                        Intermediário
                                                    @elseif($empresaU->plano == 3)
                                                        Avançado
                                                    @endif
                                                    </b>
                                                </td>
                                                <td>
                                                    {{ $empresaU->telefone }}
                                                </td>

                                                <td>

                                                    @if($empresaU->plano != 3)

                                                    <a href="{{ route('pesquisaEmpresa', 'pesquisa=' . preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $empresaU->nome ) )) }}">
                                                        <span class="badge badge-success" style="padding: 10px;"> Ver na busca</span>
                                                    </a>
                                                    @else
                                                        <a href="{{ route('verEmpresaUsuario', $empresaU->id) }}">
                                                            <span class="badge badge-primary ion-gear-b" style="padding: 10px;"> Administrar</span>
                                                        </a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @endcan
                        @endif
                    @endcan

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="year-calendar"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        {{--
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todo</h4>
                    <div class="card-content">
                        <div class="todo-list">
                            <div class="tdl-holder">
                                <div class="tdl-content">
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="checkbox"><i class="bg-primary"></i><span>Build an angular app</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i class="bg-danger"></i><span>Design One page theme</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>

                                        <li>
                                            <label>
                                                <input type="checkbox" checked><i class="bg-success"></i><span>Creating component page</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <input type="text" class="tdl-new form-control" placeholder="Type here">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}

    </div>
@endsection

@section('script-src')
    @component('layouts.default.components.alert-success-error')
    @endcomponent

    <script>
        window.onload = () => {
            if (localStorage.CADASTREMPRESA == 1) {
                @if(Auth::user()->cpf == '' || Auth::user()->cpf == md5(''))
                alert('Você precisa cadastrar seu CPF!')
                window.location.replace("{{ route('cadastrarMinhaEmpresa') }}");
                @else
                setTimeout(() => {
                    window.location.replace("{{ route('cadastrarMinhaEmpresa') }}");
                    localStorage.CADASTREMPRESA = 0;
                }, 2000);
                @endif
            }
        }
    </script>
@endsection