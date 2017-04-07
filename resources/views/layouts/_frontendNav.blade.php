<nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <ul class="hide-on-med-and-down left">

                    <li><a href="/">Home</a></li>
                    @include('layouts._frontendMenu')
                </ul>

                <ul class="hide-on-med-and-down right">
                    <li><input type="text" placeholder="Search"></li>
                    @include('layouts._authNav')
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><input type="text" placeholder="Search"></li>
                    @include('layouts._frontendMenu')
                   
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="ti-menu"></i></a>
            </div>
        </nav>