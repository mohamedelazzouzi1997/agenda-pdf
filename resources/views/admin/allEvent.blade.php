@extends('layouts.app')

@section('title')
    ALL NOTIFICATION - ADMIN AGENDA
@endsection

@section('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}" />
    <style>
        .buttons-copy,
        .buttons-print {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="text-center uppercase">
                    <h2 class="text-3xl"><strong class="text-green-500">Admin Tous</strong> Notification </h2>
                </div>
                <div class="body shadow-2xl">
                    <form action="" method="get">
                        <a href="{{ route('export.event') }}"
                            class="px-3 py-2 bg-slate-900 shadow-xl hover:bg-slate-800 text-white rounded ">EXEL
                        </a>
                        <button name="deleteevent" type="submite" class="btn shadow-xl btn-danger waves-effect"><i
                                class="zmdi zmdi-delete"></i>
                            Supprimé</button>
                        <div class="float-right flex justify-around items-center mb-3">
                            <div class="mx-2 space-x-3">
                                <label for="">En Attente</label><input type="radio" name="eventstatus"
                                    id="">
                                <label for="">Validé</label><input type="radio" name="eventstatus" id="">
                                <label for="">Rejeté</label><input type="radio" name="eventstatus" id="">
                            </div>
                            <button name="deleteevent" type="submite" class="btn shadow-xl btn-primary waves-effect"><i
                                    class="zmdi zmdi-edit"></i>
                                Modifier Status</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>/</th>
                                        <th>id</th>
                                        <th>date</th>
                                        <th>Title du tache</th>
                                        <th>description</th>
                                        <th>Etat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($EVENT as $event)
                                        <tr>
                                            <td>

                                                <input id="checkbox" type="checkbox">

                                            </td>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->start }}</td>
                                            <td>{{ Str::limit($event->title, 50) }}</td>
                                            <td>{{ Str::limit($event->description, 15) }}</td>
                                            <td>
                                                @if ($event->status == 'Rejete')
                                                    <span class="badge badge-danger uppercase">{{ $event->status }}</span>
                                                @elseif ($event->status == 'Valide')
                                                    <span class="badge badge-success uppercase">{{ $event->status }}</span>
                                                @else
                                                    <span class="badge badge-warning uppercase">{{ $event->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <a href="{{ route('export.event') }}"
                        class="px-3 py-2 bg-slate-900 shadow-xl hover:bg-slate-800 text-white rounded">EXEL
                    </a>

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
