
@foreach($menus as $menu)
    <li><a href="{{ url('/categories/'.$menu->category->id) }}">{{$menu->category->title}}</a></li>
@endforeach