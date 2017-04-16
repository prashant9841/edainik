@extends('layouts.app')

@section('title')
    Home
@stop

@section('meta-description')

@stop

@section('meta-keyword')
@stop

@section('content')
    
    @include('layouts._flashNews')

    <section class="featured-post">
        @foreach ($posts as $post)
            @include('partials.home._post')
        @endforeach
    </section>

    <section class="related container">
        <div class="row section-title container">
            <div class="col s12 m4">
                <h4>Latest Posts</h4>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <h5>Ads Here</h5>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <h5>Ads Here</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._latestPost')
            </div>
            <div class="col s12 m3">
                @include('partials.home._relatedPost')
                <div class="card">
                    <div class="slide-news">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related container">
        <div class="row section-title container">
            <div class="col s12 m4">
                <h4>Trending Posts</h4>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <h5>Ads Here</h5>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <h5>Ads Here</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._latestPost')
            </div>
            <div class="col s12 m3">
                @include('partials.home._relatedPost')
                <div class="card">
                    <div class="slide-news">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- 3 Categories Post --}}
    @foreach($categoriesList as $category)
    <section class="home-cat">
        <div class="row section-title container">
            <div class="col s12 m4">
                {{-- Catgory Title --}}
                <h4>{{ $category->title }}</h4>
            </div>
            <div class="col s12 m4">
                {!! Ads::show('responsive') !!}
            </div>
            <div class="col s12 m4">
                  {!! Ads::show('responsive') !!}
            </div>
        </div>

        {{-- 1 featured Post related to category --}}
         @if($category->posts->first() && isset($category->posts)) 
        <?php $relCat = $category->posts->first(); ?>
        <div class="large-post">        
            <div class="parallax-container">
                <div class="section">
                    <div class="container">
                        <h1 class="header center">{{$relCat->title}}</h1>
                    </div>
                </div>
                <div class="parallax">
                @if($relCat->getMedia('images')->count() > 0)
                    <img src="{{ $relCat->getFirstImageUrl() }}" alt="Unsplashed background img 1">
                @else
                    <img src="http://lorempixel.com/1000/600" alt="Unsplashed background img 1">
                @endif
                </div>
            </div>

            <div class="content container">
                <div class="row center">
                    <p class="wrap">{{ $relCat->description }}</p>
                </div>
                <div class="row share center"> </div>
                <div class="row center btn-row">
                    <a href="{{ url('/news/'.$post->slug) }}" class="btn waves-effect waves-light">Read More</a>
                </div>
            </div>
            <div class="ads container">
               {!! Ads::show('responsive') !!}
            </div>
        </div>
        @endif


        <div class="related container">
            <h3>Latest News</h3>
            <div class="row">
                <div class="col s12 m9">
                    {{-- 4 Latest Posts from Category   --}}
                   <ul class="row small-post latest">
                        @foreach($category->approvedPosts()->take(6)->get()->shuffle() as $news)
                            <li class="col s12 m6">
                                <div class="card">
                                    <a href="{{ url('news',$news->slug)}}">
                                        <div class="card-content">
                                            <h4>{{ $news->title }}</h4>
                                            <div class="row small">
                                                <div class="col s6">
                                                    {{$news->created_at->diffForHumans()}}
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                    <a href="#" class="right">View All</a>
                </div>
                <div class="col s12 m3">
                    <div class="card">
                        {!!Ads::show('responsive')!!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endforeach

@stop