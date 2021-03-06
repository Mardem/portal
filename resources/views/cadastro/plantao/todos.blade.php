@extends('layouts.default.dashboard')

@section('localSite', 'Todos plantões cadastrados')
@section('title', 'Todos plantões cadastrados -  Dashboard - Portal Formosa')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Todos Plantões</li>
    </ol>
@endsection
@section('container')

    <div class="offset-md-3 col-md-4">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-medkit f-s-40 color-danger"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="counter">
                        {{ $p->count() }}
                    </h2>
                    <p class="m-b-0">Todos plantões cadastrados</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <div align="right">

            <a href="{{ route('criarPlantao') }}" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Novo
            </a>
        </div>
    </div>
    <div class="card">
        <small class="text-info">
             <i class="fa fa-info-circle" aria-hidden="true"></i> Todos os plantões abaixo serão removidos diariamente às <b>08:00 hrs</b>.
        </small>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        @can('admin')
                            <th width="180px">Ações</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($p as $plantao)
                            <tr>
                                <td>{{ $plantao->nome }}</td>
                                <td>{{ $plantao->endereco }}</td>
                            @can('admin')
                                    <td>
                                        <a href="{{ route('apagarPlantao', ['id' => $plantao->id]) }}" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Apagar
                                        </a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
@endsection