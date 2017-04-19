<nav class="main-nav" role="navigation">
    <div class="nav-wrapper container">
        <ul class="hide-on-med-and-down left navigation">
            @include('layouts._frontendMenu')
        </ul>

        <ul class="hide-on-med-and-down right navigation auth">
            {{-- <li><input type="text" placeholder="Search"></li> --}}
            @include('layouts._authNav')
        </ul>

        <ul id="nav-mobile" class="side-nav navigation">
            {{-- <li><input type="text" placeholder="Search"></li> --}}
            @include('layouts._frontendMenu')
           
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-bars"></i></a>
    </div>
</nav>