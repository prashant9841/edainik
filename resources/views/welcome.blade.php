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
        <div class="row section-title">
            <div class="col s12 l6">
                <h4>@lang('homepage.latest-news')</h4>
                <img src="{{asset('/images/icons/latest.png')}}" alt="">
                <div class="skwed"></div>
            </div>
            <div class="col s12 l6">
                {!! Ads::show('responsive') !!}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._latestPost')
            </div>
            <div class="col s12 m3 side-post">
                @include('partials.home._relatedPost')

                <div class="card">
                    <div class="slide-news">
                        @foreach ($posts as $post)
                            <div>
                                <div class="card-image">
                                    <img src="{{ $post->getFirstImageUrl() }}" alt="{{ $post->title }}">
                                </div>
                                <div class="card-content">                                   
                                    <a href="{{ url('/posts/'.$post->slug) }}" >                                        
                                        {{$post->title}}
                                    </a>   
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related container">
        <div class="row section-title">
            <div class="col s12 l6">
                <h4> @lang('homepage.trending-news')</h4>
                <img src="{{asset('/images/icons/trending.png')}}" alt="">
                <div class="skwed"></div>
            </div>
            <div class="col s12 l6">
                {!! Ads::show('responsive') !!}
            </div>
        </div>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._trendingPost')
            </div>
            <div class="col s12 m3 side-post">
                @include('partials.home._relatedPost')

                <div class="card">
                    <div class="slide-news">
                        @foreach ($trendingNews as $post)
                            <div>
                                <div class="card-image">
                                    <img src="{{ $post->getFirstImageUrl('thumb') }}" alt="{{$post->title}}">
                                </div>
                                <div class="card-content">                                   
                                    <a href="{{ url('/news/'.$post->slug) }}" >
                                        {{$post->title}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3 Categories Post --}}
    @foreach($categoriesList as $category)
    <section class="home-cat container">
        <div class="row section-title">
            <div class="col s12 l6 {{$category->header_color}}">
                {{-- Catgory Title --}}
                <h4>{{ $category->title }}</h4>
               
                    <img src="
                    @if(strlen($category->icon) >4)
                        {{asset('/images/icons/'.$category->icon)}}
                    @else
                        {{asset('/images/icons/news.png')}}
                    @endif
                    " alt="{{$category->title}}">
                <div class="skwed"></div>

            </div>
            <div class="col s12 l6">
                {!! Ads::show('responsive') !!}
            </div>
        </div>

        {{-- 1 featured Post related to category --}}
        @if($category->posts->first() && isset($category->posts)) 
            <?php $relCat = $category->posts->first(); ?>
            <div class="box-post">
                <div class="row">                
                    <div class="col m9 s12">
                        <div class="card row">
                            <div class="card-image col s12 l6">
                                <img src="{{ $relCat->getFirstImageUrl('small') }}" alt="{{ $relCat->title }}">
                            </div>                            
                            <div class="card-content col s12 l6">
                                {{-- <div class="col s12 m6">
                                </div> --}}
                                    <h1 class="header center">{{$relCat->title}}</h1>

                                    <div class="row small">
                                        <div class="col s6">
                                            <p><i class="ti-time"></i> &nbsp;{{$relCat->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div class="col s6">
                                            <p><i class="ti-menu"></i>&nbsp; Category</p>
                                        </div>
                                    </div>
                                    <p class="wrap">{{ $relCat->description }}</p>
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
        @endif


        <div class="related">
            <div class="row">
                <div class="col s12 m9" style="padding: 0;">
                    {{-- 4 Latest Posts from Category   --}}
                   <ul class="row small-post with-image latest">
                        @foreach($category->approvedPosts()->take(6)->get()->shuffle() as $news)
                            <li class="col s12 m6">
                                <a href="{{ url('news',$news->slug)}}">
                                    <div class="card group">
                                        <div class="card-image">
                                            <img src="{{ $post->getFirstImageUrl('thumb') }}" alt="{{$post->title}}">
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
                    
                    <a href="" class="right btn">@lang('homepage.viewall')</a>

                    
                </div>
                <div class="col s12 m3 side-post">
                    <div class="card">
                        {!!Ads::show('responsive')!!}
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @endforeach

@stop