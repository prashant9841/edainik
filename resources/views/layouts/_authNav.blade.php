@if(auth()->check())
    <li><a href="/dashboard">Dashboard</a></li>
    <li><a href="/logout">Logout</a></li>
@else
    <li><a href="/dashboard">Login</a></li>
@endif
