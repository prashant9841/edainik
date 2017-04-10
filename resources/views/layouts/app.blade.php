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
    <link rel="stylesheet" href="/stylesheets/social.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>

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
        @include('layouts._flashNews')


        @yield('content')




        @include('layouts._frontendFooter')
            

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="/js/social.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

        <script>
             $(".share").jsSocials({
                shares: ["twitter", "facebook", "googleplus", "pinterest"],
                showLabel: false,
                showCount: false,
                url: "https://www.facebook.com/jojiri/?ref=br_rs"
            });
             $('#flash-news').slick({
                dots: true,
                infinite: true,
                speed: 600,
                autoplay: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        </script>


</body>
</html>
