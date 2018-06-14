@extends('layouts.default.dashboard')

@section('localSite', 'Composição de notícia')
@section('title', 'Composição de notícia - Portal Formosa')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="">Noticias</a></li>
    <li class="breadcrumb-item active">Compor</li>
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
    <form action="{{ route('salvarNoticia') }}" method="post" class="card" data-toggle="validator"
          enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="">Título da notícia</label>
        <input name="titulo" type="text" class="form-control" value="{{ old('titulo') }}">
        <small class="text-muted">
          Selecione uma imagem principal para ser usada como destaque na notícia
        </small>
      </div>
      <div class="form-group">
        <label for="">Categoria da notícia</label>
        <select name="categoria" class="form-control" required>
          @foreach($categorias as $categoria)
            <option value="{{ $categoria->nome }}" {{ old('category_id') == 1 ? 'selected' : '' }}>{{ $categoria->nome }}</option>
          @endforeach
        </select>
        <small class="text-muted">Selecione em que a notícia se encaixa</small>
      </div>
      <div class="form-group" id="link">

      </div>

      <div class="form-group">
        <label for="">Imagem principal</label>
        <input name="imagem" type="file" class="form-control">
        <small class="text-muted">Selecione uma imagem principal para ser usada como destaque na
          notícia
        </small>
      </div>

      <div class="form-group">
        <label>Local da notícia</label>
        <select name="postado" class="form-control" required>
          <option value="1">Local padrão</option>
          <option value="2">Área reservada do Portal Formosa</option>
          <option value="0">Não postado</option>
        </select>
        <small class="text-muted">
          Selecione em qual local a notícia será colocada
          <br>
          <b>Local padrão</b><br>
          <b>Área reservada do Portal</b><br>
          <b>Não postado</b>
        </small>
      </div>

      <div class="form-group">
        <label for="">Pequena descrição</label>
        <textarea name="descricao" cols="30" rows="10" class="form-control" style="height: 120px"
                  maxlength="156">{{ old('descricao') }}</textarea>
        <small class="text-muted">Escreva uma pequena descrição sobre o que é tratado nessa notícia (Opcional)</small>
      </div>

      <div id="editor"></div>
      <textarea name="code" id="saveCode" class="hidden">{{ old('code') }}</textarea>
      <button class="btn btn-success" type="button" onclick="validar()" id="check">Validar</button>
      <button class="btn btn-success" type="submit" id="save" style="display: none;">Salvar</button>
    </form>
      <div class="card">
        <legend>Cadastrar categoria de notícia</legend>

        <form action="{{ route('cadastroCategoriaNoticia') }}" class="form-fluid" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nome da categoria</label>
            <input type="text" name="categoria" class="form-control">
            <small class="text-muted">Escreva o nome da categoria para que possa aparecer no cadastro de notícia</small>
          </div>
          <div class="form-group">
            <label>Descrição da categoria</label>
            <input type="text" name="descricao" class="form-control" required>
            <small class="text-muted">Escreva a descrição da categoria com o mínimo de 100 caracteres</small>
          </div>

            <div id="cp4" class="input-group colorpicker-component" title="Using color option">
                <input type="text" name="background" class="form-control input-lg" aria-describedby="basic-addon1"/>
                <span class="input-group-addon" id="basic-addon1" style="color: #fff;padding: 10px;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b class="ion-paintbucket"> Categoria</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </div>

            <br>
          <button class="btn btn-info btn-block">
            <i class="fa fa-save"></i>
            Salvar
          </button>



        </form>

        <div class="table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th>#</th>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
              <tr>
                <td style="background: {{ $categoria->fundo }}; color: #fff;text-align: center">{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->descricao }}</td>
                <td>
                  <a href="{{ route('apagarCategoria', [$categoria->id]) }}" class="btn btn-primary
                  ion-ios-trash-outline"> Apagar</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>


@endsection


@section('script-src')
  <script src="{{ asset('node_modules/trumbowyg/dist/trumbowyg.min.js') }}"></script>
  <script src="{{ asset('node_modules/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js') }}"></script>
  <script src="{{ asset('node_modules/trumbowyg/dist/plugins/template/trumbowyg.template.min.js') }}"></script>
  <script src="{{ asset('node_modules/trumbowyg/dist/plugins/base64/trumbowyg.base64.js') }}"></script>
  <script src="{{ asset('node_modules/trumbowyg/dist/plugins/upload/trumbowyg.upload.min.js') }}"></script>
  <script src="{{ asset('node_modules/trumbowyg/dist/langs/pt_br.min.js') }}"></script>
  <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/vendor/bootstrap-color-picker/dist/js/bootstrap-colorpicker.js') }}"></script>
  <script src="{{ asset('js/noticias.min.js') }}"></script>

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
  <link rel="stylesheet" href="{{ asset('node_modules/trumbowyg/dist/ui/trumbowyg.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/vendor/bootstrap-color-picker/dist/css/bootstrap-colorpicker.css') }}">
  <style>
    [contenteditable]:hover, [contenteditable]:focus {
      background: #fff !important;
    }
  </style>
@endsection
