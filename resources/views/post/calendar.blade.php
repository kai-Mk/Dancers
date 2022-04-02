<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
   <title>Dancers</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.js"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
           
          selectable: true,
          select: function (info) {
              alert("selected " + info.startStr + " to " + info.endStr);
          },
          
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>