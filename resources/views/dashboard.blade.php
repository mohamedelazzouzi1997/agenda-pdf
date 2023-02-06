@extends('layouts.app')

@section('after-styles')
    <style>
        .fc .fc-toolbar .fc-button {
            background-color: #1a252f !important;
        }

        .fc-button-group,
        .fc-today-button {
            filter: drop-shadow(2px 3px 3px #000);
        }

        .fc .fc-toolbar h2 {
            font-size: 35px !important;
        }
        .fc-event-time{
            font-weight: bolder !important;
            font-size: 15px !important;
        }
        .tooltip{
            padding: 0 !important;
        }
        .tooltip-inner
        {
            border-radius: 5px !important;
            background-color: #88e6be !important;
        }
        .bg-enatend{
            background-color: #f5b400 !important;
        }
        .bg-valide{
            background-color: #27e988 !important;
        }
        .bg-rejete{
            background-color: #ff2b2b !important;
        }
        .fc-daygrid-more-link {
            color: green !important;
        }
    </style>
@endsection

@section('content')
    <div class=" mb-10 ">
        <div id='calendar' class="bg-gray-50 p-5 shadow-2xl rounded-lg drop-shadow-2xl"></div>
    </div>
@endsection


@section('after-scripts')
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
    @endif
    <script src="{{ asset('fullcalendar/fullcalendarglobal.js') }}"></script>
    {{-- <script src="{{ asset('popper/main.js') }}"></script> --}}
    {{-- <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/js/mdb.min.js"></script> --}}
    {{-- <script src="{{ asset('tooltips/main.js') }}"></script> --}}
    {{-- <script defer src="{{ asset('fullcalendar/core/index.global.min.js') }}"></script>
    <script defer src="{{ asset('fullcalendar/core/locales-all.global.min.js') }}"></script>
    <script defer src="{{ asset('fullcalendar/bootstrap5/index.global.min.js') }}"></script>
    <script defer src="{{ asset('fullcalendar/daygrid/index.global.min.js') }}"></script>
    <script defer src="{{ asset('fullcalendar/interaction/index.global.min.js') }}"></script>
    <script defer src="{{ asset('fullcalendar/list/index.global.min.js') }}"></script>
    <script defer src="{{ asset('fullcalendar/timegrid/index.global.min.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr', // change calendare to fr lang
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay,list'
                },
                dayMaxEvents: 3, // for all non-TimeGrid views
                buttonText: {
                    today: "Aujourd'hui",
                    month: 'Mois',
                    week: 'Semain',
                    day: 'Jour',
                    list: 'list'
                },
                eventTextColor:'black',
                navLinks: true,
                // editable: true,
                selectable: true,
                initialDate: Date.now(),
                eventDidMount: function(info) {
                    $(info.el).tooltip({
                        title: info.event.extendedProps.description,
                        placement: "top",
                        trigger: "hover",
                        container: "body"
                    });
                },
                events: '/getEvents',
                eventClick: function(info){
                    // alert(info.event.classNames);
                    var currentDate = info.event.start;
                    var month = currentDate.getMonth() +1;
                    if (month < 10) month = "0" + month;
                    var dateOfMonth = currentDate.getDate();
                    if (dateOfMonth < 10) dateOfMonth = "0" + dateOfMonth;
                    var year = currentDate.getFullYear();
                    var hour = currentDate.getHours();
                    if (hour < 10) hour = "0" + hour;

                    var minute = currentDate.getMinutes();
                    if (minute < 10) minute = "0" + minute;

                    var formattedDate = year + "/" + month + "/" + dateOfMonth +' ' + hour +':'+minute;

                    const title = info.event.title;
                    const statusBgColor = info.event.classNames;
                    const description = info.event.extendedProps.description;
                    const start = formattedDate;
                    const status = info.event.extendedProps.status;
                    const eventId = info.event.id;

                    $('#editEventTile').val(title);
                    $('#editeventDate').html(start);
                    $('#eventstatus').html(status);
                    $('#eventstatus').addClass(statusBgColor);
                    $('#editEventDescription').val(description);
                    $('#editNotification').modal();

                    $('#editmyform').attr('action', '/event/update/'+ eventId);

                },
                select: function(selectionInfo){
                    $('#eventDate').val(selectionInfo.startStr +'T00:00');
                    $('#addNotification').modal();
                }
            });
            calendar.render();
        });
    </script>
    <script>
        $('.fc-button-group').addClass('shadow-lg')
    </script>
@endsection

@section('modal')
    @include('modals.editNotification')
@endsection
