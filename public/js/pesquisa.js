$("img").unveil();
$("img").on('dragstart', function (e) {
    e.preventDefault();
});

$("#fix").fixit({
    zIndex : 999
});
