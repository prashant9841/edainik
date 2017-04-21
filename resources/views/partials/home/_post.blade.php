<div class="large-post">        
    <div class="section">
        <div class="container">
            <h1 class="header center">{{$post->title}}</h1>            
            <div class="row center">
                <div class="btn {{$post->category->header_color}} ">
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
    </div>
    <div class="parallax-constainer container">
       
        <div class="paralsslax">
            <img src="{{ $post->getFirstImageUrl() }}" alt="{{ $post->title }}">
        </div>
    </div>

    <div class="content container">
        <div class="row center">
            <p class="wrap">{{ $post->description }}</p>
        </div>
        <div class="row center btn-row">
            <a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">@lang('homepage.read-more')</a>
        </div>
    </div>
    <div class="ads container">
       {!! Ads::show('responsive') !!}
    </div>
</div>