<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keyword')">

    <title>Log In{{ config('app.name', 'eDainikPost') }}</title>
    <link rel="preload" href="{{ asset('/stylesheets/animate.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('/stylesheets/animate.css') }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </noscript>

    @yield('links')

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="blue lighten-1" style="padding-top: 10vh">

        <div class="container">
            <div class="row">
                <a href="/" class="col m4 offset-m5 ">
                    <img src="{{asset('/images/0.png')}}" height="75px" class="center" alt="eDainik Post">
                </a>
            </div>
        </div>
        @yield('content')

        <script async defer src="{{ mix('js/app.js') }}"></script>
        <script src="/js/cssrelpreload.js"></script>
</body>
</html>
