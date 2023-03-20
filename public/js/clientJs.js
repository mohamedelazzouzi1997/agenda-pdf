        const ToasterOptions = {
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

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr', // change calendare to fr lang
                initialView: 'timeGridWeek',
                slotDuration: '00:10:00',
                slotLabelInterval: '01:00',
                slotMinTime: '09:00',
                slotMaxTime: '18:00',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridYear,dayGridMonth,timeGridWeek,timeGridDay,list'
                },
                businessHours: {
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    daysOfWeek: [1, 2, 3, 4, 5], // Monday - Thursday

                    startTime: '09:00', // a start time (10am in this example)
                    endTime: '18:00', // an end time (6pm in this example)
                },
                dayMaxEvents: 5, // for all non-TimeGrid views
                buttonText: {
                    today: "Aujourd'hui",
                    month: 'Mois',
                    week: 'Semain',
                    day: 'Jour',
                    list: 'list',
                    year: 'Année',
                },
                eventTextColor: 'black',
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
                eventClick: function(info) {
                    // alert(info.event.classNames);
                    var currentDate = info.event.start;

                    var month = currentDate.getMonth() + 1;
                    if (month < 10) month = "0" + month;

                    var dateOfMonth = currentDate.getDate();
                    if (dateOfMonth < 10) dateOfMonth = "0" + dateOfMonth;
                    var year = currentDate.getFullYear();

                    var hour = currentDate.getHours();
                    if (hour < 10) hour = "0" + hour;

                    var minute = currentDate.getMinutes();
                    if (minute < 10) minute = "0" + minute;

                    var formattedDate = year + "/" + month + "/" + dateOfMonth + ' ' + hour + ':' +
                        minute;

                    const title = info.event.title;
                    const statusBgColor = info.event.classNames;
                    const description = info.event.extendedProps.description;
                    const file = info.event.extendedProps.file.split('/');
                    // console.log(file[3]);
                    const start = formattedDate;
                    const status = info.event.extendedProps.status;
                    const eventId = info.event.id;

                    $('#editEventTile').val(title);
                    if (file[2]) {
                        $('#fileEmbed').show();
                        $('#fileEmbed').attr('href', '/storage/files/pdf/' + file[2]);
                    } else {
                        $('#fileEmbed').hide();
                    }
                    $('#editeventDate').html(start);
                    $('#eventstatus').html(status);
                    if ($('#eventstatus').hasClass('has-bg')) {
                        $('#eventstatus').removeClass('bg-enatend');
                        $('#eventstatus').removeClass('bg-rejete');
                        $('#eventstatus').removeClass('bg-valide');
                    }
                    $('#eventstatus').addClass(statusBgColor);
                    $('#eventstatus').addClass('has-bg');
                    $('#editEventDescription').val(description);
                    $('#editNotification').modal();

                    $('#editmyform').attr('action', '/event/update/' + eventId);

                },
                select: function(selectionInfo) {
                    if (selectionInfo.view.type == 'timeGridWeek' || selectionInfo.view.type == 'timeGridDay') {

                        var currentDate = selectionInfo.start;

                        var month = currentDate.getMonth() + 1;
                        if (month < 10) month = "0" + month;

                        var dateOfMonth = currentDate.getDate();
                        if (dateOfMonth < 10) dateOfMonth = "0" + dateOfMonth;
                        var year = currentDate.getFullYear();

                        var hour = currentDate.getHours();
                        if (hour < 10) hour = "0" + hour;

                        var minute = currentDate.getMinutes();
                        if (minute < 10) minute = "0" + minute;

                        var formattedDate = year + "-" + month + "-" + dateOfMonth + 'T' + hour + ':' +
                            minute;
                        console.log(formattedDate);
                        $('#eventDate').val(formattedDate);

                    } else {
                        $('#eventDate').val(selectionInfo.startStr + 'T00:00');
                    }
                    $('#addNotification').modal();
                }
            });
            calendar.render();
        });