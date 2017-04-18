<div class="card">
    {!! Ads::show('responsive') !!}
</div>
<div class="card">
    <div class="card-content">
        <h4>@lang('homepage.latest')</h4>
        <ul  class="collection">
            @foreach($latestNews as $news)
                <a class="collection-item" href="news/{{$news->slug}}">{{$news->title}}</a>
            @endforeach
        </ul>
    </div>
</div>