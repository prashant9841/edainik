
    <div class="box-post">               
            <div class="col s12">
                <div class="card row">
                    <div class="card-image col s12 l6">
                        <img src="{{ $post->getFirstImageUrl('small') }}" alt="{{ $post->title }}">
                    </div>                            
                    <div class="card-content col s12 l6">
                        <a href="{{ route('singleNews',$post->slug) }}" ><h1 class="header center">{{$post->title}}</h1></a>
                        {{-- <div class="row small">

                             <div class="col s6">
                                @if($post->author)
                                    <p><i class="fa fa-user"></i> &nbsp;{{$post->author}}</p>
                                @endif
                            </div>
                            <div class="col s6">
                                @if($post->address)
                                    <p><i class="fa fa-map"></i>&nbsp; {{ $post->address}}</p>
                                @endif
                            </div>
                        </div> --}}
                        <p class="wrap">{{ $post->description }}</p>
                </div>
                </div>
            </div>
            <div class="col s12 m3 side-post">
                {{-- <div class="card">
                    {!! Ads::show('responsive') !!}
                </div> --}}
            </div>  
    </div>
    {{-- <div class="ads">
       {!! Ads::show('responsive') !!}
    </div> --}}