@extends('layouts.default.dashboard')

@section('localSite', 'Todos bairros cadastrados')
@section('title', 'Todos bairros cadastrados -  Dashboard - Portal Formosa')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Todos Bairros</li>
    </ol>
@endsection
@section('container')

    <div class="offset-md-3 col-md-4">
        <div class="card p-30">
            <div class="media">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-road f-s-40 color-danger"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="counter">{{ $bairros->count() }}</h2>
                    <p class="m-b-0">Todos bairros cadastrados</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <div align="right">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus" aria-hidden="true"></i> Novo
            </button>
        </div>
    </div>
    <div class="card">
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="30px">#</th>
                        <th>Nome</th>
                        <th width="180px">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bairros as $bairro)
                        <tr>
                            <td scope="row">{{ $bairro->id }}</td>
                            <td>{{ $bairro->bairro }}</td>
                            <td>
                                <a href="{{ route('apagarBairro', [$bairro->id]) }}" class="btn btn-danger"><i
                                            class="fa fa-trash" aria-hidden="true"></i> Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{ route('salvarBairro') }}" method="post">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inserir um novo bairro</h5>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" class="form-control" autofocus name="bairro"
                               placeholder=" Digite o nome do Bairro" required>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Limpar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>

            </form>
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