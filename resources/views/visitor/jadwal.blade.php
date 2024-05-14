<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>{{ $SubTitle }} | {{ config('appsproperties.APPS_NAME') }}</title>
    <!-- Meta Name -->
    <x-metas :subtitle="$SubTitle"></x-metas>
    <meta http-equiv="refresh" content="600">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Bootrap for the demo page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Animate CSS for the css animation support if needed -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <link href="{{ asset('wizards/jquery-smart-wizard/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }

      a {
        color: black;
        text-decoration: none;
      }

      .fc-day-sun {
        background-color: #da4770;
      }

      .fc-day-sun .fc-daygrid-day-number {
        color: white;
      }

      .footer span {
        font-size: 12px;
      }
    </style>
  </head>
  <body>
    <!-- Navbar Visitor -->
    <x-navbar-visitor></x-navbar-visitor>
    <br><br>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div id='calendar'></div>
        </div>
      </div>
    </div>
    
    <!-- Navbar Visitor -->
    <x-footer-visitor></x-footer-visitor>

    <!-- Loader -->
    <x-loader></x-loader>
    
    <!-- Bootrap for the demo page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script>
      function load_data() {
        $.ajax({
          url : "{{ route('visitor.jadwal-list') }}",
          type: "POST",
          data: {
            StartDate: "{{ $StartDate }}",
            EndDate: "{{ $EndDate }}",
            "_token": "{{ csrf_token() }}"
          },
          dataType: "JSON",
          beforeSend: function (params) {
            $("#loading").show();
          },
          success: function(data)
          {
            //console.log(data);
            let Responses   = data.data;
            let DataEvents  = [];
            let FirstDate   = Responses[Responses.length - 1];
            var calendarEl  = document.getElementById('calendar');

            Object.keys(Responses).forEach(key => {
              //console.log(key, Responses[key]);
              let Titles = Responses[key].VisitorName + " (" + Responses[key].ArrivalDestination + ")";
              let Url    = "{{ URL::to('/') }}/visitor/visitor-detail/" + Responses[key].VisitorEmail + "/" + Responses[key].Tickets + "/User";
              DataEvents.push(
                {
                  'title': Titles,
                  'start': Responses[key].CheckinDate,
                  'end': Responses[key].CheckoutDate,
                  'url': Url
                }
              )
            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
              aspectRatio: 3,
              initialView: 'dayGridMonth',
              initialDate: FirstDate.CheckinDate, //'2024-03-07',
              headerToolbar: {
                left: 'prev, next, today',
                center: 'title',
                right: 'dayGridMonth, timeGridWeek, timeGridDay'
              },
              events: DataEvents,
              eventBackgroundColor: '#378006',
              eventClick: function(event) {
                if (event.event.url) {
                  event.jsEvent.preventDefault()
                  window.open(event.event.url, "_blank");
                }
              }
              // events: [
              //   {
              //     title: 'All Day Event',
              //     start: '2024-03-01'
              //   },
              //   {
              //     title: 'Long Event',
              //     start: '2024-03-07',
              //     end: '2024-03-10'
              //   },
              //   {
              //     groupId: '999',
              //     title: 'Repeating Event',
              //     start: '2024-03-09T16:00:00'
              //   },
              //   {
              //     groupId: '999',
              //     title: 'Repeating Event',
              //     start: '2024-03-16T16:00:00'
              //   },
              //   {
              //     title: 'Conference',
              //     start: '2024-03-11',
              //     end: '2024-03-13'
              //   },
              //   {
              //     title: 'Meeting',
              //     start: '2024-03-12T10:30:00',
              //     end: '2024-03-12T12:30:00'
              //   },
              //   {
              //     title: 'Lunch',
              //     start: '2024-03-12T12:00:00'
              //   },
              //   {
              //     title: 'Meeting',
              //     start: '2024-03-12T14:30:00'
              //   },
              //   {
              //     title: 'Birthday Party',
              //     start: '2024-03-13T07:00:00'
              //   },
              //   {
              //     title: 'Click for Google',
              //     url: 'https://google.com/',
              //     start: '2024-03-28'
              //   }
              // ]
            });

            calendar.render();
            $("#loading").hide();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            $("#loading").hide();
            let ErrorResaponses = jqXHR;
            if (jqXHR.status == 422) {
              Swal.fire({
                title: capitalizeFirstLetter(textStatus + " " + jqXHR.status),
                text: jqXHR.statusText,
                icon: textStatus
              });
            } else if (jqXHR.status == 500) {
              Swal.fire({
                title: capitalizeFirstLetter(textStatus + " " + jqXHR.status),
                text: "Oops something went wrong",
                icon: textStatus
              });
            } else if (jqXHR.status == 419) {
              Swal.fire({
                title: capitalizeFirstLetter(textStatus + " " + jqXHR.status),
                text: jqXHR.responseJSON.message,
                icon: textStatus
              });
            }
          }
        });
      }

      $(document).ready(function() {
        $("#loading").hide();
        load_data();
      });
    </script>
  </body>
</html>