<li 
    @if(url()->current() == url('/'))
       class="active"
    @endif
    ><a href="/">@lang('homepage.home')</a></li>
@foreach($menus as $menu)
    <li 
    @if( url()->current() == url('/categories/'.$menu->category->slug ) )
    	class="active"
    @elseif(url()->current() != url('/') && (isset($post)&& $post->category && $post->category->slug == $menu->category->slug)
        class="active"
    @endif
    ><a href="{{ url('/categories/'.$menu->category->slug ) }}" 
    @if(url()->current() == url('/categories/'.$menu->category->slug) )
    	class="{{$menu->category->header_color}}-text"
    @endif

    >{{$menu->category->title}}</a></li>
    
@endforeach