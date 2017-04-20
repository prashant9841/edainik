<div class="card">
    {!! Ads::show('responsive') !!}
</div>
<div class="card">
    <div class="card-content">
        <h4>@lang('homepage.related')</h4>
        <ul class="collection">
        @if(isset($category))
            @foreach($category->approvedPosts()->take(8)->get() as $news)
                <a class="collection-item" href="{{ url('news',$news->slug) }}">{{$news->title}}</a>
            @endforeach
        @endif
        </ul>
    </div>
</div>