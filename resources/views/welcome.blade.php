@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)

        <section class="post">        
            <div class="parallax-container">
                <div class="section">
                    <div class="container">
                        <h1 class="header center">{{$post->title}}</h1>
                    </div>
                </div>
                <div class="parallax"><img src="http://lorempixel.com/1600/900" alt="Unsplashed background img 1"></div>
            </div>
            <div class="content container">
                <div class="row center">
                    <p class="wrap">{{ $post->content }}</p>
                </div>
                <div class="row center btn-row">
                    <a href="{{ url('/posts/'.$post->id) }}" class="btn waves-effect waves-light teal lighten-1">View All</a>
                </div>
            </div>
            <div class="ads container">
                <div class="card">
                    <div class="card-content">
                        <h1>Nice and Clean Ads</h1>
                    </div>
                </div>
            </div>
        </section>

    @endforeach
    
@stop