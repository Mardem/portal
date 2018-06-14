let loadFile = function (event) {
    let output = document.getElementById('previewBanner');
    output.src = URL.createObjectURL(event.target.files[0]);
};

$('#cpf').inputmask("999.999.999-99");  //static mask

$('#dia').pignoseCalendar({
    format: 'DD/MM/YYYY',
    lang: 'pt',
    theme: 'light'
});

$('#horas').mdtimepicker({
    theme: 'purple',
    format: 'hh:mm',
});
