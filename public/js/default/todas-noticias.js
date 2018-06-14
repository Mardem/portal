let categoria = $('#categoria');
let categoriaSelecionada = $('#categoriaSelecionada');
let autor = $('#autor');
let autorSelecionado = $('#autorSelecionado');
let formPesquisa = $('#form-pesquisa');
let pesquisa = $('#pesquisa');
let url = window.location.href;

$(function() {
    categoriaSelecionada.text(localStorage.categoria);
    autorSelecionado.text(localStorage.autor);
});

$(categoria).change(() => {
    let selecionado = $('#categoria option:selected').text();
    localStorage.setItem('categoria', selecionado);
    location.href = URL_add_parameter(location.href, 'categoria', categoria.val());
});

$(formPesquisa).submit((e) => {
    e.preventDefault();
    location.href = URL_add_parameter(location.href, 'pesquisa', pesquisa.val());
});

$(autor).change(() => {
    let selecionado = $('#autor option:selected').text();
    localStorage.setItem('autor', selecionado);
    location.href = URL_add_parameter(location.href, 'autor', autor.val());
});



function URL_add_parameter(url, param, value){
    let hash       = {};
    let parser     = document.createElement('a');

    parser.href    = url;

    let parameters = parser.search.split(/\?|&/);

    for(let i=0; i < parameters.length; i++) {
        if(!parameters[i])
            continue;

        let ary      = parameters[i].split('=');
        hash[ary[0]] = ary[1];
    }

    hash[param] = value;

    let list = [];
    Object.keys(hash).forEach(function (key) {
        list.push(key + '=' + hash[key]);
    });

    parser.search = '?' + list.join('&');
    return parser.href;
}