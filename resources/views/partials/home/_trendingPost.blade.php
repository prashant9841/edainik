<ul class="row small-post with-image latest">
    @foreach($trendingNews as $news)
        <li class="col s12 m6">
            <a href="{{ url('news',$news->slug)}}">
                <div class="card group">
                    <div class="card-image">
                        <img src="{{ $news->getFirstImageUrl('thumb') }}" alt="">
                    </div>
                    <div class="card-content">
                        <h4>{{ $news->title }}</h4>
                        <div class="row small">
                            <div class="col s6">
                                <p><i class="fa fa-clock-o"></i> &nbsp;{{$news->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="col s6">
                                <p><i class="fa fa-bars"></i>&nbsp; {{$news->category->title}}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </a>

        </li>
    @endforeach
</ul>