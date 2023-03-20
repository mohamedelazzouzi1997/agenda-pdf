@extends('layouts.app')
@section('title')
    VALIDE NOTIFICATION - AGENDA
@endsection
@section('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}" />
    <style>
        .buttons-copy,
        .buttons-print,
        .buttons-csv {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="text-center uppercase">
                    <h2 class="text-3xl"><strong class="text-green-500">VALIDE</strong> Notification </h2>
                </div>
                <div class="body shadow-2xl">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>date</th>
                                    <th>Title du tache</th>
                                    <th>description</th>
                                    <th>Etat</th>
                                    <th>file</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($EVENT_VALIDES as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->start }}</td>
                                        <td>{{ Str::limit($event->title, 30) }}</td>
                                        <td>{{ Str::limit($event->description, 15) }}</td>
                                        <td> <span class="badge badge-success uppercase">{{ $event->status }}</span></td>
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
                </div>
            </div>
        </div>
    </div>
@endsection


@section('after-scripts')
    <script defer src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script defer src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
