<div class="container">
	

            <div class="box-post">
                <div class="row">                
                    <div class="col m9 s12">
                        <div class="card row">
                            <div class="card-image col s12 l6">
                                
                                @if($post->getMedia('images')->count() > 0)
                                    <img src="{{ $post->getFirstImageUrl('small') }}" alt="{{ $post->title }}">
                                @endif                        
                            </div>                            
                            <div class="card-content col s12 l6">
                                {{-- <div class="col s12 m6">
                                </div> --}}
                                    <h1 class="header center">{{$post->title}}</h1>

                                    <div class="row small">
                                        <div class="col s6">
                                            <p><i class="fa fa-clock-o"></i> &nbsp;{{$post->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div class="col s6">
                                            <p><i class="fa fa-bars"></i>&nbsp; {{ $post->category->title }}</p>
                                        </div>
                                    </div>
                                    <p class="wrap">{{ $post->description }}</p>
                                    {{-- <div class="row share center"> </div> --}}
                                    <div class="row center btn-row">

                                        <a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">@lang('homepage.read-more')</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3 side-post">
                        <div class="card">
                        	{!! Ads::show('responsive') !!}
                        </div>
                    </div>
                </div>       
                        
                        
            
            </div>
            <div class="ads">
               {!! Ads::show('responsive') !!}
            </div>
</div>