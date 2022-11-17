var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];
const myModal = new bootstrap.Modal(document.getElementById('myModal'));
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      headerToolbar:{
          left:'prev,next today',
          center:'title',
          right:'dayGridMonth,timeGridWeek,timeGridDay'
      },
      dateClick: function (info){
        console.log(info);
        document.getElementById('start_datetime').value= info.dateStr;
        document.getElementById('titulo').textContent= 'Registro de eventos';
        myModal.show();
      }
});
});
$(function() {
    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({ id: row.id, title: row.title, start: row.start_datetime, end: row.end_datetime });
        })
    }
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    calendar = new Calendar(document.getElementById('calendar'),{
        locale:"es",
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        dateClick: function(info) {
            console.log(info);
            document.getElementById('start_datetime').value= info.dateStr;
            document.getElementById('titulo').textContent='Registro de eventos';
            myModal.show();
        },
        selectable: true,
        themeSystem: 'bootstrap',
        //Random default events
        events: events,
        eventClick: function(info) {
            var _details = $('#event-details-modal')
            var id = info.event.id
            if (!!scheds[id]) {
                _details.find('#title').text(scheds[id].title)
                _details.find('#description').text(scheds[id].description)
                _details.find('#start').text(scheds[id].sdate)
                _details.find('#end').text(scheds[id].edate)
                _details.find('#edit,#delete').attr('data-id', id)
                _details.modal('show')
            } else {
                alert("Eventi sin definir");
            }
        },
        eventDidMount: function(info) {
            
        },
        editable: true
    });

    calendar.render();

    // Form reset
    $('#formulario').on('reset', function() {
        $(this).find('input:hidden').val('')
        $(this).find('input:visible').first().focus()
    })

    // Edit
    $('#edit').click(function() {
        var id = $(this).attr('data-id')
        if (!!scheds[id]) {
            var _form = $('#formulario')
            console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime))
            _form.find('[name="id"]').val(id)
            _form.find('[name="title"]').val(scheds[id].title)
            _form.find('[name="description"]').val(scheds[id].description)
            _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
            _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
            _form.find('#edit,#delete').attr('data-id', id)
            $('#event-details-modal').modal('hide')
            _form.find('[name="title"]').focus()
            $('#myModal').modal('show')
        } else {
            alert("Evento sin definir");
        }
    })

    // Boton eliminar / Eliminar evento
    $('#delete').click(function() {
        var id = $(this).attr('data-id')
        if (!!scheds[id]) {
            var _conf = confirm("Estas seguro?");
            if (_conf === true) {
                location.href = "./delete_schedule.php?id=" + id;
            }
        } else {
            alert("Evento sin definir");
        }
    })
})