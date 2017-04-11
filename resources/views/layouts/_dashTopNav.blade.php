<div class="row top-nav">
    <div class="container">
        <ul class="left">            
            <a href="#" data-activates="slide-out" class="button-collapse btn"><i class="material-icons">menu</i></a>
        </ul>

        <div class="right">
            <ul class="inline">
                <li>
                     <!-- Dropdown Trigger -->
                    <i class='dropdown-button material-icons btn' data-beloworigin="true" data-activates='user'>&#xE7FD;</i>

                      <!-- Dropdown Structure -->
                    <ul id='user' class='dropdown-content'>
                        <li><a href="#!">{{ $user->name }}</a></li>
                        <li><a href="/dashboard/settings">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
