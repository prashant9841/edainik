
@foreach($menus as $menu)
    <li><a class="
    @if(url()->current() == url('/categories/'.$menu->category->slug))
        active
    @endif
    " href="{{ url('/categories/'.$menu->category->slug ) }}">{{$menu->category->title}}</a></li>
@endforeach