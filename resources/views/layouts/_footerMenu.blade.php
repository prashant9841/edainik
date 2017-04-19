
<li class="col s12 m6 l6"><a href="/">@lang('homepage.home')</a></li>
@foreach($menus as $menu)
    <li class="col s12 m6 l6"><a href="{{ url('/categories/'.$menu->category->slug ) }}">{{$menu->category->title}}</a></li>
@endforeach