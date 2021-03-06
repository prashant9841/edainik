<div class="large-post">        
    <div class="section container">
        <div class="title-section" @if($post->subtitle) style="padding-top: 30px;" @endif>
            <a href="{{ url('/news/'.$post->slug) }}"><h1 class="header center">{{$post->title}}</h1></a>
            
            @if($post->subtitle)
            <div class="btn subtitle {{$post->category->header_color}} lighten-1">
                {{$post->subtitle}}
            </div>
            @endif
        </div>
    </div>
    @if($post->checkImage())
    <div class="parallax-constainer container">
        <a href="{{ url('/news/'.$post->slug) }}" class="paralsslax center">
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