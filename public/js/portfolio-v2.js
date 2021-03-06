function msgBemVindo(nome) {
    swal({
        title: "Bem vindo " + nome + "!",
        text: "Olá " + nome + '! Seja bem vindo ao novo Portfolio do Portal Formosa! O que você está vendo agora é uma apresentação padrão.' +
        ' Comece selecionando uma cor, para que possamos adapta-la ao seu portfolio. ',
        button: "OK!",
        icon: "success"
    });
}

let empresa = $('.texto-chamada');
let fundoCor = $('.jumbotron');
let corBarraLateral = $('#inputBarra');
let links = $('.nav-link');
let corNav = $('#corNav');

let fundoOfertas = $('.corOfertasFundo');
let frenteOfertas = $('.corOfertasFrente');
let corFrente = $('.corFrente');

let corFrenteProdutos = $('.corFrenteProdutos');
let corLabelProdutos = $('.corLabelProdutos');

$('#pickerPadrao').colorpicker().on('change', function () {
    //empresa.css("cssText", "color: " + corBarraLateral.val() + " !important");
    fundoCor.css("cssText", "background-color: " + corBarraLateral.val() + " !important");
});
$('#pickerOfertas').colorpicker().on('change', function () {
    //empresa.css("cssText", "color: " + corBarraLateral.val() + " !important");
    fundoOfertas.css("cssText", "fill: " + corBarraLateral.val() + " !important");
});
$('#pickerOfertasFrente').colorpicker().on('change', function () {
    //empresa.css("cssText", "color: " + corBarraLateral.val() + " !important");
    frenteOfertas.css("cssText", "fill: " + corFrente.val() + " !important");
});

$('#pickerFundoProdutos').colorpicker().on('change', function () {
    //empresa.css("cssText", "color: " + corBarraLateral.val() + " !important");
    corLabelProdutos.css("cssText", "fill: " + corFrenteProdutos.val() + " !important");
});


$.jnoty("Você está em modo de edição. Para começar a editar clique na opção desejada.", {

    // success, warning, info, danger
    theme: 'jnoty-info',
    sticky: true,
    header: 'Modo de edição',
    icon: 'fa fa-info-circle'
});

$("#descricaoPrincipal").iziModal({
    title: 'Alterar descrição principal',
    subtitle: 'Altere a descrição principal da sua empresa',
    headerColor: '#0e1258',
    padding: 10,
});

$("#descricaoOfertas").iziModal({
    title: 'Alterar descrição de ofertas',
    subtitle: 'Desenvolva um texto atraente para seus clientes',
    headerColor: '#0e1258',
    padding: 10,
});
$("#descricaoProdutos").iziModal({
    title: 'Alterar descrição de produtos',
    subtitle: 'Faça uma descrição do seus produtos',
    headerColor: '#0e1258',
    padding: 10,
});
$("#sobreEmpresa").iziModal({
    title: 'Alterar "Sobre"',
    subtitle: 'Vamos falar sobre você um pouco mais...',
    headerColor: '#0e1258',
    padding: 10,
});


$('#textDescPrin').limitText();
$('#textDescOfer').limitText();
$('#textDescProd').limitText();
$('#textSobre').limitText({limit: 400});

$('#descProd').limitText({limit: 100});
$('#nomeProd').limitText({limit: 100});
$('#precoProd').limitText({limit: 10, warningLimit: 1});


function salvarDadosAjax(id) {
    let attrForm = document.getElementById(id);
    let idPadrao = attrForm.dataset.empresa;
    let token = attrForm.dataset.token;
    let rota = attrForm.dataset.rota;
    let code = attrForm.dataset.code;
    let input = attrForm.dataset.input;
    let resultado = attrForm.dataset.result;
    let update = $('#' + input).val();
    $.ajax({
        method: "POST",
        url: rota,
        data: {
            id: idPadrao,
            data: update,
            opt: code
        },
        headers: {
            'X_CSRF_TOKEN': token,
        },
    }).done(function (res) {
        $('#' + resultado).text(res.data);
        swal({
            title: res.title,
            text: res.msg,
            button: "OK!",
            icon: res.type
        });
    });
}


const driver = new Driver({
    doneBtnText: 'Entendi!',
    closeBtnText: 'Fechar',
    nextBtnText: 'Próximo',
    prevBtnText: 'Anterior',
    allowClose: false
});

driver.defineSteps([
    {
        element: '#navbarPrincipal',
        popover: {
            title: 'Barra de navegação',
            description: 'Utilize a barra de navegação para navegar no seu portfólio. Essa barra é fixada ao rolar á página.',
            position: 'bottom'
        }
    }, {
        element: '#nomePrincipal',
        stageBackground: '#007ba0',
        popover: {
            title: 'Nome do seu portfólio',
            description: 'Aqui fica o nome do se portfólio, aqui é onde seu portfólio será reconhecido com o nome da sua empresa.',
            position: 'bottom'
        }
    },
    {
        element: '#lead-descricao-principal',
        stageBackground: '#007ba0',
        popover: {
            title: 'Descrição do portfólio',
            description: 'Essa é a sua descrição do portfólio, descreva aqui o que há de mais interessante na sua empresa. <br><i>(Clique sobre o texto)</i>',
            position: 'top'
        }
    },
    {
        element: '#principalHeader',
        popover: {
            title: 'Alterar cor de fundo',
            description: 'Utilize essa ferramenta para mudar a cor de fundo quando quiser.',
            position: 'top'
        }
    },
    {
        element: '#lead-descricao-oferta',
        popover: {
            title: 'Descrição de ofertas',
            description: 'Chame mais a atenção do seu usuário, escreva uma descrição do seu produto. <br><i>(Clique sobre o texto)</i>',
            position: 'top'
        }
    },
    {
        element: '#newOfferHeader',
        popover: {
            title: 'Adicionar oferta',
            description: 'Adicione uma nova oferta, você pode adicionar no máximo 4 ofertas.',
            position: 'bottom'
        }
    },
    {
        element: '#headerCoresOfertas',
        popover: {
            title: 'Trocar cores do banner de Ofertas',
            description: 'Troque aqui as cores do seu banner de ofertas, salve parcialmente cada cor.',
            position: 'bottom'
        }
    },
    {
        element: '#ofertasBox',
        popover: {
            title: 'Caixa de ofertas',
            description: 'Aqui é onde ficará suas ofertas após serem inseridas.',
            position: 'top'
        }
    },
    {
        element: '#lead-descricao-produtos',
        popover: {
            title: 'Descrição de ofertas',
            description: 'Da mesma forma que você insere a descrição, você pode inserir a descrição dos <b>produtos</b>. <br><i>(Clique sobre o texto)</i>',
            position: 'top'
        }
    },
    {
        element: '#section1HeaderId',
        popover: {
            title: 'Adicionar produto',
            description: 'Adicione até 8 produtos para mostrar aos seus clientes o que você vende.',
            position: 'bottom'
        }
    },
    {
        element: '#secaocoresProdutos',
        popover: {
            title: 'Trocar cores dos produtos',
            description: 'Altere a cor do banner de produto, deixe o seu portfólio mais atraente e faça mais vendas.',
            position: 'top'
        }
    },
    {
        element: '#linhaProdutos',
        popover: {
            title: 'Caixa de produtos',
            description: 'Aqui é onde ficará seus produtos após serem inseridos.',
            position: 'top'
        }
    },
    {
        element: '#sobreText',
        popover: {
            title: 'Sobre a empresa',
            description: 'Local reservado para a descrição completa da sua empresa',
            position: 'right'
        }
    },
    {
        element: '#mapaFrame',
        popover: {
            title: 'Mapa do Portfólio',
            description: 'Utilize o mapa para mostrar onde sua empresa fica, gere diretamente no Google.',
            position: 'bottom'
        }
    },
    {
        element: '#fim',
        popover: {
            title: 'Fim do portfólio',
            description: 'Esse é o fim do site, formado por suas informações cadastrais.',
            position: 'top'
        }
    }
]);


if (localStorage.tutorialPortfolio === undefined) {
    driver.start();
    localStorage.tutorialPortfolio = '1';
}