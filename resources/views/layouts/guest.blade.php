<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    @yield('meta')
    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('before-styles')

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    @stack('after-styles')

</head>
<?php
$setting = !empty($_GET['theme']) ? $_GET['theme'] : '';
$theme = 'theme-cyan';
$menu = '';
if ($setting == 'p') {
    $theme = 'theme-purple';
} elseif ($setting == 'b') {
    $theme = 'theme-blue';
} elseif ($setting == 'g') {
    $theme = 'theme-green';
} elseif ($setting == 'o') {
    $theme = 'theme-orange';
} elseif ($setting == 'bl') {
    $theme = 'theme-blush';
} else {
    $theme = 'theme-cyan';
}

?>

<body class="<?= $theme ?>">
    <div class="authentication">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    @yield('before-scripts')
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
    @yield('after-scripts')
</body>

</html>
