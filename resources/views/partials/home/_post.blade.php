<div class="large-post">        
    <div class="parallax-container">
        <div class="section">
            <div class="container">
                <h1 class="header center">{{$post->title}}</h1>
                @if($post->category)
                    <p>{{ $post->category->title }} </p>
                @endif
            </div>
        </div>
        <div class="parallax">
        @if($post->getMedia('images')->count() > 0)
            <img src="{{ $post->getFirstImageUrl() }}" alt="Unsplashed background img 1">
        @endif
        </div>
    </div>

    <div class="content container">
        <div class="row center">
            <p class="wrap">{{ $post->description }}</p>
        </div>
        <div class="row share center"> </div>
        <div class="row center btn-row">
            <a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">@lang('homepage.read-more')</a>
        </div>
    </div>
    <div class="ads container">
       {!! Ads::show('responsive') !!}
    </div>
</div>