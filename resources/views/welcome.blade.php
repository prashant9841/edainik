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
        <div class="row section-title container">
            <div class="col s12 m4">
                <h4> @lang('homepage.latest-news')</h4>
            </div>
            <div class="col s12 m4">
                {!! Ads::show('responsive') !!}
            </div>
            <div class="col s12 m4">
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
                    {{-- <div class="slide-news">
                        @foreach ($posts as $post)
                            <div>
                                <div class="card-image">
                                    @if($post->getMedia('images')->count() > 0)
                                        <img src="{{ $post->getFirstImageUrl() }}" alt="Unsplashed background img 1">
                                    @else
                                        <img src="http://lorempixel.com/1000/600" alt="Unsplashed background img 1">
                                    @endif
                                </div>
                                <div class="card-content">                                   
                                    <a href="{{ url('/posts/'.$post->slug) }}" >                                        
                                        {{$post->title}}
                                    </a>   
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="related container">
        <div class="row section-title container">
            <div class="col s12 m4">
                <h4>@lang('homepage.trending-news')</h4>
            </div>
            <div class="col s12 m4">
                    {!! Ads::show('responsive') !!}
            </div>
            <div class="col s12 m4">
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
                        @foreach ($trendingNews as $post)
                            <div>
                                <div class="card-image">
                                    @if($post->getMedia('images')->count() > 0)
                                        <img src="{{ $post->getFirstImageUrl('thumb') }}" alt="{{$post->title}}">
                                    @else
                                        <img src="http://lorempixel.com/1000/600" alt="Unsplashed background img 1">
                                    @endif
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
    <section class="home-cat">
        <div class="row section-title container">
            <div class="col s12 m6">
                {{-- Catgory Title --}}
                <h4>{{ $category->title }}</h4>
            </div>
            <div class="col s12 m6">
                {!! Ads::show('responsive') !!}
            </div>
        </div>

        {{-- 1 featured Post related to category --}}
        @if($category->posts->first() && isset($category->posts)) 
            <?php $relCat = $category->posts->first(); ?>
            <div class="box-post container">
                <div class="row">                
                    <div class="col m9 s12 card">
                        <div class="card-content row">
                            <div class="col s12 m6">
                                <div class="card-image">
                                    
                                    @if($relCat->getMedia('images')->count() > 0)
                                        <img src="{{ $relCat->getFirstImageUrl('thumb') }}" alt="{{ $relCat->title }}">
                                    @endif                        
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <h1 class="header center">{{$relCat->title}}</h1>
                                <p class="wrap">{{ $relCat->description }}</p>
                                {{-- <div class="row share center"> </div> --}}
                                <div class="row center btn-row">

                                    <a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">@lang('homepage.read-more')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3 side-post">
                        {!! Ads::show('responsive') !!}
                    </div>
                </div>       
                        
                        
            
            </div>
            <div class="ads container">
               {!! Ads::show('responsive') !!}
            </div>
        @endif


        <div class="related container">
            <div class="row">
                <div class="col s12 m9" style="padding: 0;">
                    {{-- 4 Latest Posts from Category   --}}
                   <ul class="row small-post latest">
                        @foreach($category->approvedPosts()->take(6)->get()->shuffle() as $news)
                            <li class="col s12 m6">
                                <a href="{{ url('news',$news->slug)}}">
                                    <div class="card">
                                        <div class="card-content">
                                            <h4>{{ $news->title }}</h4>
                                            <div class="row small">
                                                <div class="col s6">
                                                    <p><i class="ti-time"></i>&nbsp; {{$news->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>

                            </li>
                        @endforeach
                    </ul>
                    {{-- <a href="" class="btn-div">
                        <div class="col s12 card center">
                                <h4>@lang('homepage.viewall')</h4>
                        </div>
                    </a> --}}
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