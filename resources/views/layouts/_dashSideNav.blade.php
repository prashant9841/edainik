<ul id="slide-out" class="side-nav">
    <li>
    <div class="userView">
        <div class="background">
            <img src="{{asset('/images/pattern.jpg')}}" style="width: 100%">
        </div>
        @if($user->isSuperAdmin())
            <p class="white-text">You're Admin</p>
        @endif 
        <a href="#!user"><img class="circle" src="{{ asset('/images/logo.png') }}"></a>
        <a href="#!name"><span class="white-text name">{{ $user->name }}</span></a>
        <a href="#!email"><span class="white-text email">{{ $user->email }}</span></a>
        </div>
    </li>
    <li><a href="{{ url('/dashboard/users') }}">Users</a></li>
    <li><a href="{{ url('/dashboard/categories') }}">Categories</a></li>
    <li><a href="{{ url('/dashboard/posts') }}">Posts</a></li>
    <li><a href="{{ url('/dashboard/menus') }}">Menus</a></li>

</ul>
