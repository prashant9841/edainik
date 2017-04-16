<ul class="row small-post latest">
    @foreach($latestNews as $news)
        <li class="col s12 m6">
            <div class="card" 
            {{-- style="background: url('{{$news->getFirstImageUrl()}}')  --}}
            ">
                <a href="{{ url('news',$news->slug)}}">
                    <div class="card-content">
                        <h4>{{ $news->title }}</h4>
                        <div class="row small">
                            <div class="col s6">
                                <p><i class="ti-time"></i> &nbsp;{{$news->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        
                    </div>
                </a>
            </div>

        </li>
    @endforeach
</ul>