@if(auth()->check())
    <li><a href="/dashboard">Dashboard</a></li>
    <li><a href="/logout">Logout</a></li>
@else
    <li><a href="/login">Login</a></li>
    <li><a href="/register">Register</a></li>
@endif