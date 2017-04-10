 <ul>
    @foreach($latestNews as $news)
        <li class="row small-post">
            <div class="col s4 img-div">
                <img src="{{ $news->getFirstImageUrl() }}" alt="">
            </div>
            <div class="col s8">
                <h4>{{ $news->title }}</h4>
                <p>{{ $news->description }}</p>
                <a href="{{ url('posts',$news->slug)}}" class="right">Read More<span></span></a>
            </div>
        </li>
    @endforeach
</ul>