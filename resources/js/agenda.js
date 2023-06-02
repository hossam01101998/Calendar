// const { right } = require("@popperjs/core");

document.addEventListener('DOMContentLoaded', function() {

    let formulair = document.querySelector("form");


var calendarEl = document.getElementById('agenda');

var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale:"nl",

    headerToolbar: {
    left:'prev,next today',
    center:'title',
    right: 'dayGridMonth,timeGridWeek,listWeek',

    timeFormat: 'HH:mm',

},
// events: "http://localhost/calender/public/event/show",
events: baseURL + "/event/show",


dateClick:function(info){
    formulair.reset();
    formulair.start.value=info.dateStr;
    formulair.end.value=info.dateStr;

    $("#event").modal("show");
},

// eventDragStop: function(info) {
//     var seg = calendar.getEventSegByTarget(info.el);
//     if (seg) {
//       var event = seg.event;
//       var clickedDate = calendar.getDateFromDayEl(info.el);

//       formulair.reset();
//       formulair.start.value = clickedDate.toISOString();
//       formulair.end.value = clickedDate.toISOString();
//       $("#event").modal("show");
//     }
//   },

eventClick:function (info){
    var event= info.event;
    var clickedDate = event.start;
    console.log(event);


    axios.post(baseURL + "/event/edit/"+info.event.id).
    // axios.post(url+info.event.id).

    then(
        (answer) =>{

            $("#event").modal("show");

            formulair.id.value=answer.data.id;
            formulair.title.value=answer.data.title;
            formulair.description.value=answer.data.description;
            formulair.start.value=answer.data.start;
            formulair.end.value=answer.data.end;
            //he añadido esto de la hora
            formulair.starthour.value=answer.data.starthour;
            formulair.endhour.value=answer.data.endhour;
            console.log(answer.data);

            // formulair.start.value = clickedDate.toISOString();
            // formulair.end.value = clickedDate.toISOString();


        }
    ).catch(
        error=>{
            if(error.response){
                console.log(error.response.data);
            }
        }
    )

}

});

calendar.render();

//SAVE

document.getElementById("btnSave").addEventListener("click", function(){

    const data =new FormData(formulair);
    // console.log(data);
    // console.log(formulair.title.value);

    sendData("/event/add");
    formulair.reset();

});



document.getElementById("btnDelete").addEventListener("click", function(){

    sendData("/event/delete/"+formulair.id.value);
    formulair.reset();

});

document.getElementById("btnModify").addEventListener("click", function(){

    sendData("/event/update/"+formulair.id.value);
    formulair.reset();

});

document.getElementById("btnClose").addEventListener("click", function(){
    formulair.reset();
    $("#event").modal("hide");

});

document.getElementById("btnClose2").addEventListener("click", function(){
    formulair.reset();
    $("#event").modal("hide");

});

function sendData(url){
    const data =new FormData(formulair);
    // console.log(data);
    // console.log(formulair.title.value);

    //esto he quitado de la hora tambien
    // data.append('starthour', formulair.starthour.value);
    // data.append('endhour', formulair.endhour.value);

    const newURL= baseURL+url;
    // console.log(newURL);

    axios.post(newURL, data).
    then(
        (answer) =>{
            calendar.refetchEvents();
            $("#event").modal("hide");
        }
    ).catch(
        error=>{
            if(error.response){
                console.log(error.response.data);
            }
        }
    )
}

});



