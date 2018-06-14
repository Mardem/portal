@extends('layouts.default.dashboard')

@section('localSite', 'Cadastro de banner')
@section('title', 'Cadastro de banner - Portal Formosa')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('todosCadastros') }}">Cadastro</a></li>
    <li class="breadcrumb-item active">Banner</li>
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
    <form action="{{ route('salvarBanner') }}" method="post" class="card" data-toggle="validator"  enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label>Título do Banner</label>
        <input name="nome" type="text" class="form-control" value="{{ old('nome') }}">
        <small class="text-muted">Escreva o título do banner a ser apresentado na Home Page do site</small>
      </div>

      <div class="form-group">
        <label>Link de redirecionamento</label>
        <input name="link" type="text" class="form-control" value="{{ old('link') }}">
        <small class="text-muted">
          Insira o link de redirecionamento que o usuário irá acessar ao clicar no banner
        </small>
      </div>

      <div class="form-group">
        <label>Imagem do Banner</label>
        <input name="imagem" type="file" class="form-control">
        <small class="text-muted">
          Selecione a imagem que será utilizada no banner, preferencialmente em:
          <br>
          <b>Largura: 220px</b><br>
          <b>Altura: 150px</b>
        </small>
      </div>

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