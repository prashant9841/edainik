<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') Dashboard</title>

    <link rel="stylesheet" href="/stylesheets/font-awesome.css">
    <link rel="stylesheet" href="/stylesheets/themify-icons.css">
    <link rel="stylesheet" href="/stylesheets/animate.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    
    @include('layouts._dashSideNav')        
    
    <div class="container">
        <div class="row">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            @yield('page-title')

            @yield('content')
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    
</body>
</html>
