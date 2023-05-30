// const { right } = require("@popperjs/core");

document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('agenda');

var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    // locale:"nl",

    // headerToolbar:{
    // left:'prev,next today',
    // center:'title',
    // right: 'dayGridMonth, timeGridWeek, listWeek '

// },

});

calendar.render();
});


