@extends('layouts.app')

@section('title')
    Home
@stop

@section('meta-description')

@stop

@section('meta-keyword')
@stop

@section('links')
    <link rel="stylesheet" href="/stylesheets/social.css">
@stop
@section('content')
    
    <section class="featured-post">
        @foreach ($posts as $post)
            @include('partials.home._post')
        @endforeach
    </section>

    <section class="related container">
        <div class="row">
            <div class="col s12 m9">

                <div class="row section-title">
                    <div class="col s12 l6">
                        <h4>@lang('homepage.latest-news')</h4>
                        <img src="{{asset('/images/icons/latest.png')}}" alt="">
                        <div class="skwed"></div>
                    </div>
                </div>
                @include('partials.home._latestPost')


                <div class="row section-title">
                    <div class="col s12 l6">
                        <h4> @lang('homepage.trending-news')</h4>
                        <img src="{{asset('/images/icons/trending.png')}}" alt="">
                        <div class="skwed"></div>
                    </div>
                </div>

               @include('partials.home._trendingPost')
            </div>

            <div class="col s12 m3 side-post">

                
                <div class="card">

                    <div class="card-title {{ $category->header_color ?? 'light-blue accent-4' }}">
                        <h4>Facebook</h4>

                        <i class="fa fa-facebook"></i>
                        <div class="skwed"></div>

                    </div>
                    <div class="fb-page" data-href="https://www.facebook.com/eDainikpost/" data-tabs="timeline" data-height="700px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/eDainikpost/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/eDainikpost/">eDainik Post</a></blockquote></div>
                </div>


            </div>
        </div>
    </section>

    <section class="home-cat container">            

        <div class="row">                
            <div class="col m9 s12">
                @foreach($categoriesList as $category)
                    @if($category->posts->count() && isset($category->posts)) 
                        <?php $relCat = $category->approvedPosts()->latest()->first(); ?>
                        @if($relCat)
                            <div class="cat">
                                    
                                <div class="section-title">
                                    <div class="col s12 {{$category->header_color}} lighten-1">
                                        {{-- Catgory Title --}}
                                        <h4>{{ $category->title }}</h4>
                                       
                                            <img src="
                                            @if(strlen($category->icon) > 3)
                                                {{asset('/images/icons/'.$category->icon)}}
                                            @else
                                                {{asset('/images/icons/news.png')}}
                                            @endif
                                            " alt="{{$category->title}}">
                                        <div class="skwed"></div>

                                    </div>
                                </div>

                                <div class="box-post">
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <a href="{{ url('/news/'.$relCat->slug) }}" class="card">
                                                <div class="card-image">
                                                    <img src="{{ $relCat->getFirstImageUrl('small') }}" alt="{{ $relCat->title }}">
                                                </div>                            
                                                <div class="card-content">
                                                    <h1 class="header center">{{$relCat->title}}</h1>

                                                    {{-- <div class="row small">
                                                        <div class="col s6">
                                                            <p><i class="fa fa-user"></i> &nbsp;{{$relCat->author}}</p>
                                                        </div>
                                                        <div class="col s6">
                                                            <p><i class="fa fa-map"></i>&nbsp; {{ $relCat->address}}</p>
                                                        </div>
                                                    </div>
                                                     --}}
                                                    <p class="wrap">{{ $relCat->description }}</p>
                                                </div>                                                
                                            </a>
                                        </div>
                                        <div class="col s12 m6">
                                            <ul class="row tiny-post latest">
                                                @foreach($category->approvedPosts()->latest()->take(10)->skip(1)->get() as $news)
                                                    <li class="col s12 {{ $news->checkImage() ? 'with-image' : null }}">
                                                        <a href="{{ url('news',$news->slug)}}">
                                                            {{-- <div class="card group">
                                                                <div class="card-image">

                                                                    <img src="{{ $news->getFirstImageUrl('thumb') }}" alt="{{$news->title}}">
                                                                </div>
                                                                <div class="card-content"> --}}
                                                                    <h4>{{ $news->title }}</h4>
                                                                    {{-- <div class="row small">
                                                                        <p>{{ $news->description }}</p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div> --}}
                                                        </a>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="ads">
                                   {!! Ads::show('responsive') !!}
                                </div>

                            </div>
                        @endif
                    @endif
                @endforeach
            </div>

            {{-- SIDE --}}

            <div class="col s12 m3 side-post">
                {{-- <div class="card">
                    {!! Ads::show('responsive') !!}
                    
                </div> --}}
                <div class="card">
                    <div class="card-title lighten-1 {{ $category->header_color ?? 'light-blue accent-4' }}">
                        <h4>Weather</h4>
                        <i class="material-icons">wb_sunny</i>
                        <div class="skwed"></div>
                    </div>
                    <a href="https://www.accuweather.com/en/np/kathmandu/241809/weather-forecast/241809" class="aw-widget-legal">
                    <!--
                    By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
                    -->
                    </a><div id="awcc1493107463585" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awcc1493107463585"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
                </div>
                <div class="card">
                    <iframe src="http://www.ashesh.com.np/forex/widget2.php?api=552142h349" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:383px; border-radius:5px;" allowtransparency="true">
                    </iframe><br><span style="color:gray; font-size:8px; text-align:left">© <a href="http://www.ashesh.com.np/forex/" title="Nepal Exchange Rates" target="_top" style="text-decoration:none; color:gray;">Nepal Exchange Rates</a></span>
                </div>
                <div class="absolute">
                    
                @component('partials.component.sideList',['background' => $category->header_color ?? null ])
                    @slot('title')
                        @lang('homepage.category-list')
                    @endslot
                    @slot('icon')
                        <i class="fa fa-bars"></i>
                    @endslot
                   
                        @include('partials.component.collectionItems',['route' => 'singleCategory','items' => $categoriesList])
                @endcomponent

                </div>
                <div class="card">
                    <div class="card-title lighten-1 {{ $category->header_color ?? 'light-blue accent-4' }}">
                        <h4>Twitter</h4>
                        <i class="fa fa-twitter"></i>
                        <div class="skwed"></div>
                    </div>
                    <a class="twitter-timeline" href="https://twitter.com/eDainikpost">Tweets by GeniusFootball</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="card">
                      <div class="carousel small-slider">
                        @foreach ($posts as $post)
                        <a class="carousel-item" href="{{ route('singleNews',$post->slug) }}">
                            <img src="{{ $post->getFirstImageUrl('thumb') }}">
                            <h4> {{ $post->title }} </h4>
                        </a>
                        @endforeach
                      </div>
                </div>

            </div>
        </div>   
            

    </section>


@stop