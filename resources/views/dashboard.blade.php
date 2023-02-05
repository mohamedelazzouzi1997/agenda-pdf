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
    <script src="{{ asset('fullcalendar/fullcalendarglobal.js') }}"></script>
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
                // titleFormat: {
                //     year: 'numeric',
                //     month: 'short',
                //     day: 'numeric'
                // }, // like 'September 8 2009', for day views
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridYear,dayGridMonth,dayGridDay,list'
                },
                dayMaxEvents: 3, // for all non-TimeGrid views
                buttonText: {
                    today: "Aujourd'hui",
                    month: 'Mois',
                    week: 'Semain',
                    day: 'Jour',
                    list: 'list'
                },
                navLinks: true,
                editable: true,
                selectable: true,
                initialDate: Date.now(),
                events: '/getEvents'
            });
            calendar.render();
        });
    </script>
    <script>
        $('.fc-button-group').addClass('shadow-lg')
    </script>
@endsection
