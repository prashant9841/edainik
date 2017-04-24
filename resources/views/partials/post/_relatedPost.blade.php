
<section class="related">
    <div class="row">
        <ul class="row small-post with-image latest">
            @foreach($latestNews as $news)
                <li class="col s12 m6">
                    <a href="{{ route('singleNews',$news->slug) }}">
                        <div class="card group">
                            <div class="card-image">
                                <img src="{{ $news->getFirstImageUrl('thumb') }}" alt="">
                            </div>
                            <div class="card-content">
                                <h4>{{ $news->title }}</h4>
                                <div class="row small">
                                    <p>{{ $news->description }}</p>
                                </div>
                                
                            </div>
                        </div>
                    </a>

                </li>
            @endforeach
        </ul>
        
    </div>
</section>
