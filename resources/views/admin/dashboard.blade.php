@extends('layouts.app')

@section('title')
    ADMIN EVENTS
@endsection

@section('after-styles')
    <link rel="stylesheet" href="{{ asset('css/adminCss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jqueryConfirm.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="bg-gray-50 px-5 py-4 mb-4 shadow-md rounded-lg drop-shadow-lg">
        <div class="text-center text-2xl uppercase mb-2">Select User</div>
        <div class="mx-auto text-center">
            <form action="{{ route('admin.dashboard') }}" class="flex space-x-10 justify-between items-center"
                method="get">
                @csrf
                <select name="filter" id="" class="form-control">
                    <option selected disabled value="">Select Un utilisateur</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button name="filterButton" type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>
    <div class=" mb-10 ">
        <div id='calendar' class="bg-gray-50 p-5 shadow-2xl rounded-lg drop-shadow-2xl"></div>
    </div>
@endsection


@section('after-scripts')
    <script>
        var eventDtat = {{ Js::from($eventsData) }};
        // console.log(eventDtat.original);
    </script>
    <script src="{{ asset('fullcalendar/fullcalendarglobal.js') }}"></script>
    <script src="{{ asset('js/jqueryConfirm.js') }}"></script>
    <script src="{{ asset('js/adminJs.js') }}"></script>
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
@endsection

@section('modal')
    @include('modals.admin.editNotification')
@endsection
