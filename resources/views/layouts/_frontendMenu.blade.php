
@foreach($menus as $menu)
    <li><a class="" href="{{ url('/categories/'.$menu->category->slug ) }}">{{$menu->category->title}}</a></li>
@endforeach