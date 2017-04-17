<div class="card">
    {!! Ads::show('responsive') !!}
</div>
<div class="card">
    <div class="card-content">
        <h4>@lang('homepage.latest')</h4>
        <ul>
            @foreach($latestNews as $news)
                <li><a href="/news/{{ $news->slug}}">{{ $news->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="card">
    {!! Ads::show('responsive') !!}
</div>