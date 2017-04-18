<ul class="row small-post with-image latest">
    @foreach($latestNews as $news)
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
                                <p><i class="ti-time"></i> &nbsp;{{$news->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="col s6">
                                <p><i class="ti-menu"></i>&nbsp; Category</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </a>

        </li>
    @endforeach
</ul>