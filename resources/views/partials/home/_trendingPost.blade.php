<ul class="row tiny-post latest">
    @foreach($trendingNews as $news)
        <li>
            <a href="{{ url('news',$news->slug)}}">
                
                        <h4>{{ $news->title }}</h4>
                    
            </a>

        </li>
    @endforeach
</ul>