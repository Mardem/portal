let corBarraLateral = $('#inputBarra');
let barraLateral = $('#sideNav');
$('#pickerBarraLateral').colorpicker().on('change', function () {

    barraLateral.css("cssText", "background-color: " + corBarraLateral.val() + " !important");
});

$("#criarFrase").click(function () {
    $("#frase").toggle("show", function () {

    });
});

$("#CriarfraseProdutos").click(function () {
    $("#fraseProdutos").toggle("show", function () {

    });
});

$("#imagensProd").click(function () {
    $("#upImgProd").toggle("show", function () {

    });
});
$("#btAdicionarGaleria").click(function () {
    $("#imagemGaleria").toggle("show", function () {

    });
});