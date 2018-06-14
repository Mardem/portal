<section class="pesquisa-categoria">
    <div class="container">
        <h5 class="display-4">Busque por categorias</h5>
        <p class="lead">
            Utilize nossa ferramenta de busca para empresas como: <b>Padarias</b>, <b>Drogarias</b>, <b>Farmácias</b>, <b>Faculdades</b> e muito mais.
            Aproveite nosso sistema de busca inteligente para filtrar as categorias abaixo.
        </p>
        <div align="center">
            <input type="text" id="jetsSearch" class="pesquisa-categoria-input"
                   placeholder=" Digite o que você procura">
        </div>
        <br>

        @php
            $categorias = \App\Models\Categoria::where('local', '=', 0)->get();
        @endphp
        <div class="row">
            <div class="col-sm-12">
                <p class="lead"><i>Todas categorias do site</i></p>
                <ul class="lista-categorias search-category-pf">
                    @foreach($categorias as $categoria)
                        <li>• &nbsp;&nbsp;<a href="{{ route('pesquisaEmpresa', ['categoria' => $categoria->nome ]) }}"><b>{{ $categoria->nome }}</b></a>&nbsp;&nbsp;•</li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</section>