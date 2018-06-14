@extends('layouts.default.dashboard')

@section('localSite', 'Cadastro de Plantão')
@section('title', 'Cadastro de Plantão - Portal Formosa')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('todosCadastros') }}">Cadastro</a></li>
    <li class="breadcrumb-item active">Plantão</li>
  </ol>
@endsection
@section('container')
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('salvarPlantao') }}" method="post" class="card" data-toggle="validator"  enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Nome da empresa</label>
        <input name="nome" type="text" class="form-control" value="{{ old('nome') }}" required>
      </div>

      <div class="form-group">
        <label>Endereço</label>
        <input name="endereco" type="text" class="form-control" value="{{ old('endereco') }}" required>
      </div>

      @can('admin')
        <div class="form-group">
          <label>Longitude</label>
          <input name="long" type="text" class="form-control" value="{{ old('long') }}">
        </div>
        <div class="form-group">
          <label>Latitude</label>
          <input name="lat" type="text" class="form-control" value="{{ old('lat') }}">
        </div>
      @endcan
      <button class="btn btn-primary">
        <i class="fa fa-save"></i>
        Salvar
      </button>
    </form>
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
    $('#telefone').inputmask("(99) 9999-9999");  //static mask
    $('#cnpj').inputmask("99.999.999/9999-99");  //static mask
  </script>
@endsection