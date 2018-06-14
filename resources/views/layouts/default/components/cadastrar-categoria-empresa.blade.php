<div id="categoria">
    <br>
</div>
<br>
<div class="card">
    <legend>Cadastrar categoria de empresa</legend>

    <form action="{{ route('cadastroCategoria') }}" class="form-fluid" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Nome da categoria</label>
            <input type="text" name="categoria" class="form-control">
            <small class="text-muted">Escreva o nome da categoria para que possa aparecer no cadastro da empresa</small>
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
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @php
                $categoriasDeEmpresa = \App\Models\Categoria::orderBy('id', 'desc')->where('local', '=', 0)->get();
            @endphp

            @foreach($categoriasDeEmpresa as $categoria)
                <tr>
                    <td style="text-align: center">{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
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