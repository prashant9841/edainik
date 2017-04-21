<div class="card">
    {!! Ads::show('responsive') !!}
</div>
<div class="card">

    <div class="card-title @isset($category){{$category->header_color}} @endisset">
        <h4>@lang('homepage.latest')</h4>
    </div>
    <div class="card-content">
        <ul class="collection">
        @if(isset($category))
            @foreach($category->approvedPosts()->take(8)->get() as $news)
                <a class="collection-item" href="{{ url('news',$news->slug) }}">{{$news->title}}</a>
            @endforeach
        @endif
        </ul>
    </div>
</div>