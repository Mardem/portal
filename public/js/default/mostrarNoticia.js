$('.nav-toggle').click(function (e) {
    e.preventDefault();
    $("html").toggleClass("openNav");
    $(".nav-toggle").toggleClass("active");
});
$("#share").jsSocials({
    shareIn: "popup",
    shares: [
        "email",
        "twitter",
        {share: "facebook", label: 'Curtir'},
        "googleplus",
        {share: "linkedin", label: 'Compartilhar'}
    ]
});

$('#closeButton').click(function (e) {
    e.preventDefault();
    let className = $('#iconBar').attr('class');
    if (className == 'ion-navicon-round') {
        $('#iconBar').removeClass('ion-navicon-round');
        $('#iconBar').addClass('ion-close-round');
    } else {
        $('#iconBar').removeClass('ion-close-round');
        $('#iconBar').addClass('ion-navicon-round');
    }
});