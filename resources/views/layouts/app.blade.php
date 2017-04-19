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

    <title>@yield('title'){{ config('app.name', 'eDainikPost') }}</title>
    <link rel="preload" href="{{ asset('/stylesheets/animate.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('/stylesheets/social.css') }}" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="preload" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css" as="style" onload="this.rel='stylesheet'">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <noscript>
        <link rel="stylesheet" href="{{ asset('/stylesheets/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('/stylesheets/social.css') }}">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
    </noscript>

    @yield('links')
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

        <header class="pageHeader container 
        @if(isset($category))
            {{$category->header_color}}
        @endif
        ">
            <div class="logo-div row">
                <div class="col s12 m4">
                    <div class="logo">
                    <img src="{{asset('/images/logo34.png')}}" alt="">
                        
                    </div>
                    {{-- <h3>इदैनिक पोस्ट</h3> --}}
                </div>
                <div class="col s12 m4 ads">
                      {!! Ads::show('responsive') !!}  
                </div>
                <div class="col s12 m4 ads">
                     {!! Ads::show('responsive') !!}
                </div>
            </div>
            @include('layouts._frontendNav')
        </header>


        @yield('content')




        @include('layouts._frontendFooter')
            

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="/js/cssrelpreload.js"></script>
        <script defer async src="/js/social.js"></script>
        <script  type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f5d96ec9059cb3"></script>
        <script>
             $(".share").jsSocials({
                shares: ["twitter", "facebook", "googleplus"],
                showLabel: false,
                showCount: false,
                url: "http://www.edainikpost.com:2020/"
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
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                      }
                    },
                    {
                      breakpoint: 600,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
             $('.slide-news').slick({
                dots: false,
                autoplay: true,
                arrow: false
                // adaptiveHeight: true

             })
        </script>


</body>
</html>
