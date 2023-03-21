@extends('layouts.guest')
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <form action="{{ route('login') }}" class="card auth_form" method="post">
                @csrf
                <div class="header">
                    <img class="logo mx-auto" src="{{ asset('assets/images/logo.svg') }}" alt="">
                    <h5>Log in <span class="text-danger">Agenda Gestion</span></h5>

                </div>
                <div class="body">
                    @if ($errors->any())
                        <div class="text-red-500 mb-2 text-center">
                            <span><i class="zmdi zmdi-alert-circle"></i> Identifiant incorrect</span>
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') border border-danger @enderror"
                            name="name" placeholder="Username">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') border border-danger @enderror"
                            name="password" placeholder="Password">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block waves-effect ">CONNEXION</button>
                </div>
            </form>
            <div class="copyright text-center">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by <a href="#" target="_blank">######</a></span>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <img src="{{ asset('assets/images/signin.svg') }}" alt="Sign In" />
            </div>
        </div>
    </div>
@stop

@section('after-scripts')

@endsection
