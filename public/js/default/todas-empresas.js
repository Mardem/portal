let categoria = $('#categoria');
let formPesquisa = $('#form-pesquisa');
let pesquisa = $('#pesquisa');
let bairro = $('#bairro');
let url = window.location.href;

$(categoria).change(function () {
    location.href = URL_add_parameter(location.href, 'categoria', categoria.val());
});

$(categoria).change(function () {
    location.href = URL_add_parameter(location.href, 'categoria', categoria.val());
});

$(bairro).change(function () {
    location.href = URL_add_parameter(location.href, 'bairro', bairro.val());
});
$(formPesquisa).submit(function (e) {
    e.preventDefault();
    location.href = URL_add_parameter(location.href, 'pesquisa', pesquisa.val());
});



function URL_add_parameter(url, param, value){
    let hash       = {};
    let parser     = document.createElement('a');

    parser.href    = url;

    let parameters = parser.search.split(/[?&]/);

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
$('img').on('dragstart', function (e) {
    e.preventDefault();
});