<div class="card">
    {!! Ads::show('responsive') !!}
</div>
<div class="card">
	<div class="card-title {{$category->header_color}}">
    	<h4>@lang('homepage.latest')</h4>
	</div>
    <div class="card-content">
        <ul  class="collection">
            @foreach($latestNews as $news)
                <a class="collection-item" href="{{ url('news',$news->slug) }}">{{$news->title}}</a>
            @endforeach
        </ul>
    </div>
</div>