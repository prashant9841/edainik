@extends('layouts.app')

@section('content')
    
        @include('layouts._flashNews')

    <section class="featured-post">
        

        @foreach ($posts as $post)

            <div class="large-post">        
                <div class="parallax-container">
                    <div class="section">
                        <div class="container">
                            <h1 class="header center">{{$post->title}}</h1>
                        </div>
                    </div>
                    <div class="parallax">
                    @if($post->getMedia('images')->count() > 0)
                        <img src="{{ $post->getFirstImageUrl() }}" alt="Unsplashed background img 1">
                    @else
                        <img src="http://lorempixel.com/1000/600" alt="Unsplashed background img 1">
                    @endif
                    </div>
                </div>

                <div class="content container">
                    <div class="row center">
                        <p class="wrap">{{ $post->content }}</p>
                    </div>
                    <div class="row share center"> </div>
                    <div class="row center btn-row">
                        <a href="{{ url('/posts/'.$post->slug) }}" class="btn waves-effect waves-light">Read More</a>
                    </div>
                </div>
                <div class="ads container">
                   {!! Ads::show('responsive') !!}
                </div>
            </div>

        @endforeach
    </section>

    <section class="related container">
        <h3>Recent News</h3>
        <div class="row">
            <div class="col s12 m9">
               @include('partials.home._latestPost')
            </div>
            <div class="col s12 m3">
                @include('partials.home._relatedPost')
            </div>
        </div>
    </section>

    
@stop