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
            
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Nice and Clean Ads</span>
                    <p>I am a very simple card. I am good at containing small bits of information.
                      I am convenient because I require little markup to use effectively.</p>
                </div>
            </div>
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
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <ul class="hide-on-med-and-down left">
                    <li><a href="#">Politics</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Celebrety</a></li>
                    <li><a href="#">Global</a></li>
                </ul>

                <ul class="hide-on-med-and-down right">
                    <li><input type="text" placeholder="Search"></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><input type="text" placeholder="Search"></li>
                    <li><a href="#">Politics</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="#">Celebrety</a></li>
                    <li><a href="#">Global</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="ti-menu"></i></a>
            </div>
        </nav>


        @yield('content')




        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
            

        <script src="{{ mix('js/app.js') }}"></script>


</body>
</html>
