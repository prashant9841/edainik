<div class="large-post">        
    <div class="section">
        <div class="title-section">
            <a href="{{ url('/news/'.$post->slug) }}"><h1 class="header center">{{$post->title}}</h1></a>
            <div class="btn cat {{$post->category->header_color}} ">
                {{$post->category->title}}
                <img src="
                @if(strlen($post->category->icon) >4)
                    {{asset('/images/icons/'.$post->category->icon)}}
                @else
                    {{asset('/images/icons/news.png')}}
                @endif
                " style="width: 20px; margin: 0 0 -3px 15px; height: 20px;" alt="{{$post->category->title}}">                    
            </div>
        </div>
    </div>
    @if($post->checkImage())
    <div class="parallax-constainer container">
        <a class="paralsslax">
            <img src="{{ $post->getFirstImageUrl() }}" alt="{{ $post->title }}">
        </a>
    </div>
    @endif
    <div class="content container">
        <div class="row center">
            <p class="wrap" style="font-size: 20px;">{{ $post->description }}</p>
        </div>
    </div>
    {{-- 
    <div class="ads container">
       {!! Ads::show('responsive') !!}
    </div> 
    --}}
</div>