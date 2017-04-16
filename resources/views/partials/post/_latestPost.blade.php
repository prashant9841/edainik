 <ul class="row">
    @foreach($latestNews as $news)
        <li class="col s12 m6">            
            <a href="{{ url('news',$news->slug)}}">{{ $news->title }}</a>
        </li>
    @endforeach
</ul>