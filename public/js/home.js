$.ajax({
    type: 'get',
    url: 'http://economia.awesomeapi.com.br/json/USD-BRL/1',
    success: function (data) {
        let a = $.makeArray(data);
        $.map(a, function (val, i) {
            let valorDolar = val.bid;
            let resD =
                valorDolar.toString().substr(0, 5).replace('.', ',');
            $('#valor-dolar').html("R$ " + resD);
        });
    }
});
$.ajax({
    type: 'get',
    url: 'http://economia.awesomeapi.com.br/json/EUR-BRL/1',
    success: function (data) {
        let a = $.makeArray(data);
        $.map(a, function (val, i) {
            let valorEuro = val.ask;
            let resE = valorEuro.toString().substr(0, 5).replace('.', ',');
            $('#valor-euro').html("R$ " + resE);
        });
    }
});

//Sort random function
function random(){
    let seletor = $('.owl-carousel');
    seletor.children().sort(function(){
        return Math.round(Math.random()) - 0.5;
    }).each(function(){
        $(this).appendTo(seletor);
    });
}

$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    lazyLoad: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    },
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    onInitialize : function () {
        random();
    }
});

let search = new Jets({
    searchTag: '.pesquisa-categoria-input',
    contentTag: '.search-category-pf'
});
