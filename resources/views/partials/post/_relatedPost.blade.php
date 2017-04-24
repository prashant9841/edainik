<ul class="row small-post with-image latest">
    @foreach($latestNews as $news)
        <li class="col s12 m6">
            <a href="{{ url('news',$news->slug)}}">
                <div class="card group">
                    @if($news->checkImage())
                        <div class="card-image">
                            <img src="{{ $news->getFirstImageUrl('thumb') }}" alt="{{ $news->title }}">
                        </div>
                    @endif
                    <div class="card-content">
                        <h4>{{ $news->title }}</h4>
                        <div class="row small">
                            <p>{{ $news->description }}</p>
                            {{-- <div class="col s6">
                                <p><i class="fa fa-clock-o"></i> &nbsp;{{$news->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="col s6">
                                <p><i class="fa fa-bars"></i>&nbsp; {{ $news->category->title }}</p>
                            </div> --}}
                        </div>
                        
                    </div>
                </div>
            </a>

        </li>
    @endforeach
</ul>
