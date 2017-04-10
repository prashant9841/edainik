@extends('layouts.app')

@section('content')

	<section class="featured-post">
    

        <div class="large-post">        
            <div class="parallax-container">
                <div class="section">
                    <div class="container">
                        <h1 class="header center">{{$post->title}}</h1>
                    </div>
                </div>
                <div class="parallax"><img src="{{ $post->getFirstImageUrl() }}" alt="Unsplashed background img 1"></div>
            </div>

            <div class="content container">
                <div class="row center">
                    <p class="wrap">{!! $post->content !!}</p>
                </div>

            </div>
            <div class="ads container">
                <div class="card">
                    <div class="card-content">
                        <h1>Nice and Clean Ads</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related container">
        <h3>Related Posts</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul>
                    @include('partials.post._latestPost')
                </ul>
            </div>
            <div class="col s12 m3">
                @include('partials.post._relatedPost')
            </div>
        </div>
    </section>

@stop