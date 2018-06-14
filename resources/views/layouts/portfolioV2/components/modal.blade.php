@php
    if($padrao->count() != 0) {
      $padrao->id;
    } else {
      $padrao = (object) ['id' => 8];
    }
@endphp

<div id="descricaoPrincipal">
    <small>
        Diga-nos um pouco sobre sua empresa
    </small>
    <div class="container form-modal-descPrin">
        <form action="javascript:salvarDadosAjax(`formDescricaoPrincipal`)" id="formDescricaoPrincipal" data-result="lead-descricao-principal" data-input="textDescPrin" data-code="0" data-empresa="{{ $padrao->id }}" data-token="{{ csrf_token() }}" data-rota="{{ route('alterarAjax') }}">
            <textarea class="form-control" id="textDescPrin" style="resize: none"></textarea>
            <div id="counter" class="text-right"></div>
            <br>
            <button class="btn btn-success btn-block">
                <i class="fa fa-save"></i> Salvar
            </button>
        </form>
    </div>
</div>

<div id="descricaoOfertas">
    <small>
        Faça uma bela descrição para atrair seus clientes!
    </small>
    <div class="container form-modal-descPrin">
        <form action="javascript:salvarDadosAjax(`formDescricaoOferta`)" id="formDescricaoOferta" data-result="lead-descricao-oferta" data-input="textDescOfer" data-code="1" data-empresa="{{ $padrao->id }}" data-token="{{ csrf_token() }}" data-rota="{{ route('alterarAjax') }}">
            <textarea class="form-control" id="textDescOfer" style="resize: none"></textarea>
            <div id="counter" class="text-right"></div>
            <br>
            <button class="btn btn-success btn-block">
                <i class="fa fa-save"></i> Salvar
            </button>
        </form>
    </div>
</div>
<div id="descricaoProdutos">
    <small>
        Faça uma bela descrição para atrair seus clientes!
    </small>
    <div class="container form-modal-descPrin">
        <form action="javascript:salvarDadosAjax(`formDescricaoProduto`)" id="formDescricaoProduto" data-result="lead-descricao-produtos" data-input="textDescProd" data-code="2" data-empresa="{{ $padrao->id }}" data-token="{{ csrf_token() }}" data-rota="{{ route('alterarAjax') }}">
            <textarea class="form-control" id="textDescProd" style="resize: none"></textarea>
            <div id="counter" class="text-right"></div>
            <br>
            <button class="btn btn-success btn-block">
                <i class="fa fa-save"></i> Salvar
            </button>
        </form>
    </div>
</div>

<div id="sobreEmpresa">
    <small>
        Que tal falarmos mais sobre sua empresa?
    </small>
    <div class="container form-modal-descPrin">
        <form action="javascript:salvarDadosAjax(`formSobreEmpresa`)" id="formSobreEmpresa" data-result="sobreText" data-input="textSobre" data-code="3" data-empresa="{{ $padrao->id }}" data-token="{{ csrf_token() }}" data-rota="{{ route('alterarAjax') }}">
            <textarea class="form-control" id="textSobre" style="resize: none"></textarea>
            <div id="counter" class="text-right"></div>
            <br>
            <button class="btn btn-success btn-block">
                <i class="fa fa-save"></i> Salvar
            </button>
        </form>
    </div>
</div>