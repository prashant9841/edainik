<li 
    @if(url()->current() == url('/'))
       class="active"
    @endif
    ><a href="/">गृहपृष्ठ </a></li>
@foreach($menus as $menu)
    <li class="
    @if(url()->current() == url('/categories/'.$menu->category->slug) )
    	active
    @endif
    "><a href="{{ url('/categories/'.$menu->category->slug ) }}">{{$menu->category->title}}</a></li>
@endforeach