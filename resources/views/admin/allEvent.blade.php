@extends('layouts.app')

@section('title')
    ALL NOTIFICATION - ADMIN AGENDA
@endsection

@section('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jqueryConfirm.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}" />

    <style>
        .buttons-copy,
        .buttons-print {
            display: none !important;
        }
    </style>
    <script src="https://kit.fontawesome.com/f4eca1ee68.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="text-center uppercase">
                    <h2 class="text-3xl"><strong class="text-green-500">Admin Tous</strong> Notification </h2>
                </div>
                <div class="">
                    <form action="{{ route('admin.all.event') }}" class="flex space-x-10 justify-center items-center"
                        method="get">
                        <div class="grid grid-cols-1 gap-2">
                            <div class="shadow-2xl border-2 border-gray-400 drop-shadow-lg rounded">
                                <select class=" ms select2" aria-placeholder="Select" name="filter">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button name="filterButton" type="submit" class="btn btn-primary shadow-md">Filter</button>
                        </div>
                        @csrf

                    </form>
                    <div>
                        @if ($current_user == 'all')
                            All Users
                        @else
                            <span class="text-xl font-extrabold text-green-500">User :</span> {{ $current_user->name }}
                        @endif
                    </div>
                </div>
                <div class="body shadow-2xl">

                    <form id="allEventForm" action="{{ route('admin.delete.multipl.event') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 mb-3">
                            <div class="text-start">
                                <a href="{{ route('export.event') }}"
                                    class="px-3 py-2 bg-slate-900 shadow-xl hover:bg-slate-800 text-white rounded ">EXEL
                                </a>
                                <button disabled id="deleteEventButton" name="deleteEventButton" type="submit"
                                    class="btn shadow-xl btn-danger waves-effect"><i class="zmdi zmdi-delete"></i>
                                    Supprimé</button>
                            </div>
                            <div class="text-end flex justify-center items-center space-x-2">

                                <select name="editEventStatusSelect" class="rounded ms shadow-md w-1/2"
                                    data-placeholder="Select">
                                    <option disabled selected>select status</option>
                                    <option class="bg-warning" value="En attente">En attente</option>
                                    <option class="bg-teal-500" value="Valide">Validé</option>
                                    {{-- <option class="bg-danger" value="Rejete">Rejeté</option> --}}
                                </select>
                                <button disabled id="editEventStatusButton" name="editEventStatusButton" type="submit"
                                    class="btn shadow-xl btn-primary w-1/2 waves-effect">
                                    Modifier</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th data-orderable="false"> <input id="makeAllChecked" type="checkbox"
                                                name="checkallbox"></th>
                                        <th>id</th>
                                        <th>date</th>
                                        <th>Title du tache</th>
                                        <th>description</th>
                                        <th>User</th>
                                        <th>Etat</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($EVENTS as $event)
                                        <tr>
                                            <td>
                                                <input class="evenCheckBox" type="checkbox" name="events[]"
                                                    value="{{ $event->id }}">
                                            </td>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->start }}</td>
                                            <td>{{ Str::limit($event->title, 50) }}</td>
                                            <td>{{ Str::limit($event->description, 15) }}</td>
                                            <td>{{ $event->user->name }}</td>

                                            <td>
                                                @if ($event->status == 'Rejete')
                                                    <span class="badge badge-danger uppercase">{{ $event->status }}</span>
                                                @elseif ($event->status == 'Valide')
                                                    <span class="badge badge-success uppercase">{{ $event->status }}</span>
                                                @else
                                                    <span class="badge badge-warning uppercase">{{ $event->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($event->file != 'no file')
                                                    <a class="btn btn-primary text-3xl" target="_blank"
                                                        href="{{ asset('storage/' . $event->file) }}"><i
                                                            class="zmdi zmdi-file-text text-white text-xl"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('after-scripts')
    <script defer src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script defer src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ asset('js/jqueryConfirm.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script>
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
        };
    </script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
            toastr.options = ToasterOptions;
        </script>
    @endif

    @if (Session::has('fail'))
        <script>
            toastr.error("{{ Session::get('fail') }}");
            toastr.options = ToasterOptions;
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            toastr.info("{{ Session::get('info') }}");
            toastr.options = ToasterOptions;
        </script>
    @endif

    <script>
        $('#editEventStatusButton').confirm({
            title: 'Confirm pour Modifier',
            content: 'Confirm pour modifier les event selectioné',
            type: 'blue',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'MODIFIER',
                    btnClass: 'btn-blue',
                    action: function() {
                        var input = $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "editEventStatusButton").val("edit");
                        $('#allEventForm').append(input);
                        $('#allEventForm').submit();
                    }
                },
                close: function() {}
            }
        });

        $('#deleteEventButton').confirm({
            title: 'Confirm pour supprimé',
            content: 'Confirm pour supprimé les event selectioné',
            type: 'red',
            typeAnimated: true,
            buttons: {
                tryAgain: {
                    text: 'DELETE',
                    btnClass: 'btn-red',
                    action: function() {
                        var input = $("<input>")
                            .attr("type", "hidden")
                            .attr("name", "deleteEventButton").val("delete");
                        $('#allEventForm').append(input);
                        $('#allEventForm').submit();
                    }
                },
                close: function() {}
            }
        });
        $(document).ready(function() {
            //page all notification
            var clicked = false;
            $("#makeAllChecked").on("click", function() {
                $(".evenCheckBox").prop("checked", !clicked);
                clicked = !clicked;

                $("#deleteEventButton").prop("disabled", !clicked);
                $("#editEventStatusButton").prop("disabled", !clicked);

            });
            $('.evenCheckBox').click(function() {
                var numberOfChecked = $('input:checkbox:checked').length;
                if (numberOfChecked > 0) {
                    $("#deleteEventButton").prop("disabled", false);
                    $("#editEventStatusButton").prop("disabled", false);
                } else {
                    $("#deleteEventButton").prop("disabled", true);
                    $("#editEventStatusButton").prop("disabled", true);
                }
            })
            $('.select2').select2()


        });
    </script>
@endsection
