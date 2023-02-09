@extends('layouts.guest')
@section('title', '404')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <form class="card auth_form">
                <div class="header">
                    <img class="logo mx-auto" src="{{ asset('assets/images/logo.svg') }}" alt="">
                    <h5>Error 404</h5>
                    <span>Page not found</span>
                </div>
                <div class="body">

                    <a href="{{ route('login') }}" class="btn btn-primary btn-block waves-effect waves-light">GO
                        TO HOMEPAGE</a>
                    <div class="signin_with mt-3">
                        <a href="javascript:void(0);" class="link">Need Help?</a>
                    </div>
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
                <img src="{{ asset('assets/images/404.svg') }}" alt="404" />
            </div>
        </div>
    </div>
@stop
