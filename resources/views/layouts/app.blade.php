<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        {{-- Ads --}}
        <div class="ads container">
            {!! Ads::show('responsive') !!}
        </div>
        {{-- Ads --}}

        <header class="pageHeader container">
            <div class="logo-div row">
                <div class="col s12 m4 logo">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <h1>Nice and clean Ads</h1>
                        </div>
                    </div>                    
                </div>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <h1>Nice and clean Ads</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @include('layouts._frontendNav')


        @yield('content')




        @include('layouts._frontendFooter')
            

        <script src="{{ mix('js/app.js') }}"></script>


</body>
</html>
