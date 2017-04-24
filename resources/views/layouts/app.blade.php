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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="preload" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css" as="style" onload="this.rel='stylesheet'">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <noscript>
        <link rel="stylesheet" href="{{ asset('/stylesheets/animate.css') }}">
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
    <style>
    @isset($category)
        ul.navigation a:hover {

            color: {{ $category->header_color ?? '#0091ea' }} !important;


        }
    @endisset
    </style>
</head>
<body>
        {{--
        //Ads
        <div class="ads container">
            {!! Ads::show('responsive') !!}
        </div>
        --}}
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1048607425174697";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <header class="pageHeader 
        @if(url()->current() == url('/'))
           active
        @else
        {{ strtolower($category->header_color) ?? null}}
        lighten-1
        {{ strtolower($post->category->header_color) ?? null}}
        @endif
        ">
            <div class="container">
                <div class="logo-div row">
                    <div class="col s12 m4">
                        <div class="logo">
                            <a href="/">
                                
                            <img src="{{asset('/images/logo_t.png')}}" alt="">
                            </a>
                            <p class="time white-text">{{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>                            

                        </div>
                        {{-- <h3>इदैनिक पोस्ट</h3> --}}
                    </div>
                    <div class="col s12 m4 ads">
                          {!! Ads::show('responsive') !!}  
                    </div>
                    <div class="col s12 m4 ads">
                         {{-- {!! Ads::show('responsive') !!} --}}
                         <ul class="inline social">
                            <li><a href="https://www.facebook.com/eDainikpost/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/edainikpost" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://google-plus.com/edainikpost" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                         </ul>
                    </div>
                </div>                
            </div>
            @include('layouts._frontendNav')
        </header>


        @yield('content')




        @include('layouts._frontendFooter')
            

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="/js/cssrelpreload.js"></script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f5d96ec9059cb3"></script>
        <script>
            /*
             $(".share").jsSocials({
                shares: ["twitter", "facebook", "googleplus"],
                showLabel: false,
                showCount: false,
                url: "http://www.edainikpost.com:2020/"
            });
            */
        </script>

    @stack('scripts')


</body>
</html>
