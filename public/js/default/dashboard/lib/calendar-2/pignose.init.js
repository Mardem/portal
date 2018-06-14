$(function() {
    "use strict";
    $('.year-calendar').pignoseCalendar({
        theme: 'blue', // light, dark, blue
        lang: 'pt'
    });

    $('input.calendar').pignoseCalendar({
        format: 'DD-MM-YYYY', // date format string. (2017-02-02)
        weeks: [
            'Seg',
            'Ter',
            'Qua',
            'Qui',
            'Sex',
            'Sáb',
            'Dom'
        ],
        monthLong: [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
        months: [
            'Jan',
            'Fev',
            'Mar',
            'Abr',
            'Mai',
            'Jun',
            'Jul',
            'Ago',
            'Set',
            'Out',
            'Nov',
            'Dez'
        ],
        controls: {
            ok: 'OK',
            cancel: 'Cancelar'
        }
    });
});

