@extends('aberto.noticias.v3')
@section('nomeNoticia', $noticia->titulo)

@section('informacoesPostagem')
  @section('categoria', $noticia->categoria)

  <span style="font-size: 15px;">
    <i class="fa fa-user" aria-hidden="true"></i> Autor: {{ $noticia->autor }}
  </span>
  <br>
  <span style="font-size: 15px;">
    <i class="ion-bookmark"></i> Categoria: {{ $noticia->categoria }}
  </span>
  <br>
  <span style="font-size: 15px;">
    <i class="ion-ios-calendar-outline"></i> Postado em:
  </span>
  @php
    $date = new Date($noticia->created_at);
  @endphp
  <time datetime="{{ $date }}" style="font-size: 15px;">
    @php
      echo $date->format('d/m/Y • H:m') . " hrs";
    @endphp
  </time>
@endsection
@section('fonteImagem')
  {{ url('' . $noticia->imagem) }}
@endsection
@section('descricao')
  {{ $noticia->descricao }}
@endsection
@section('conteudoNoticia')
  {!! $noticia->code !!}
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, cumque debitis deserunt dignissimos dolorem eaque incidunt ipsum labore laborum mollitia nesciunt nobis non porro quod saepe suscipit voluptas. Distinctio, nam.
@endsection

@section('outrasNews')
  @foreach($noticias as $noticia)
    <div class="col-sm-6 col-lg-4" style="text-align: justify">
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/loaders/carregamento-noticias-portal-formosa.gif') }}" data-src="..{{ $noticia->imagem }}" alt="Card image cap">
        <div class="card-body card-body-news">
          <h2 class="card-title card-title-pf">
            <a href="{{ $noticia->link }}">
              @php
                echo substr($noticia->titulo, 0, 33)
              @endphp
            </a>
            <hr style="width: 100%">
          </h2>
          <p class="card-text">
            @php
              echo substr($noticia->descricao, 0, 140) . "..."
            @endphp
          </p>
        </div>
      </div>
    </div>
  @endforeach
@endsection

@section('categorias')
  @foreach($categorias as $categoria)
    <li>
      <a href="#" class="submenu-item"> ■ {{ $categoria->nome }}</a>
    </li>
  @endforeach
@endsection

@section('script-src')
  <script>
    $("html").easeScroll();
  </script>
@endsection