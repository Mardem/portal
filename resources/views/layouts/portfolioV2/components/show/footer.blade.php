<footer class="footer-portfolio" id="fim" style="background-color: {{ $padrao->fundoCor }}">

    <div class="container">
        <div class="row">
            <div class="col-sm" align="center">
                <h4>
                    Venha nos conhecer
                </h4>
                <p>
                    {{ $info->endereco }}, nº {{ $info->numero }} - {{ $info->bairro }},
                    {{ $info->cidade }} - {{ $info->estado }}
                </p>
            </div>
            <div class="col-sm" align="center">
                <h4>
                    Faça uma chamada
                </h4>
                <p>
                    {{ $info->telefone }}
                </p>
            </div>
        </div>
    </div>

</footer>