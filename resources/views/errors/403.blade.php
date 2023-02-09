@extends('layouts.guest')
@section('title', '403')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <form class="card auth_form">
                <div class="header">
                    <img class="logo mx-auto" src="{{ asset('assets/images/logo.svg') }}" alt="">
                    <h5>Error 403</h5>
                    <span>Page Forbiden</span>
                </div>
                <div class="body">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block waves-effect waves-light">GO TO
                        HOMEPAGE</a>

                </div>
            </form>
            <div class="copyright text-center">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <img class="rounded-ful" src="{{ asset('assets/images/403.png') }}" alt="403" />
            </div>
        </div>
    </div>
@stop
