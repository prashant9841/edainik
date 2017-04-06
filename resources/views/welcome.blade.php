@extends('layouts.app')

@section('content')

    <section class="featured-post">
        

    @foreach ($posts as $post)

            <div class="large-post">        
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
    </section>

    <section class="related container">
        <h3>Related Posts</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul>
                    @for($i=0; $i < 4; $i++)
                        <li class="row small-post">
                            <div class="col s4 img-div">
                                <img src="http://lorempixel.com/400/200" alt="">
                            </div>
                            <div class="col s8">
                                <h4>News Title Goes Here</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda debitis esse praesentium cupiditate corporis quaerat autem minus tempora, molestiae, non placeat aliquam commodi qui, voluptatem.</p>
                                <a href="#" class="right">Read More</a>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-content">
                        <p>Nice and Clean Ads</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <h4>Related Posts</h4>
                        <ul>
                            <li><a href="#">Related News Title</a></li>
                            <li><a href="#">Related News Title</a></li>
                            <li><a href="#">Related News Title</a></li>
                            <li><a href="#">Related News Title</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <p>Nice and Clean Ads</p>
                    </div>
                </div>
            </div>
        </section>

    @endforeach
    
@stop