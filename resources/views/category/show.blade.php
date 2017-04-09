@extends('layouts.app')

@section('content')

	<div class="row">
		<section class="featured-post">
			@foreach($category->approvedPosts as $post)
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
		                    <p class="wrap">{{ $post->content }}</p>
		                </div>
		                <div class="row center btn-row">
		                    <a href="{{ url('/posts/'.$post->slug) }}" class="btn waves-effect waves-light">View All</a>
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
			@endforeach
		</section>

    <section class="related container">
        <h3>Related Posts</h3>
        <div class="row">
            <div class="col s12 m9">
                <ul>
                    @foreach($related as $post)
                        <li class="row small-post">
                            <div class="col s4 img-div">
                                <img src="{{ $post->getFirstImageUrl() }}" alt="">
                            </div>
                            <div class="col s8">
                                <h4>{{ $post->title }}</h4>
                                <p>{{ $post->description }}</p>
                                <a href="{{ url('posts',$post->slug)}}" class="right">Read More <span></span></a>
                            </div>
                        </li>
                    @endforeach
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
                            @foreach($related as $post)
                                <li><a href="{{ url('posts',$post->slug)}}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <p>Nice and Clean Ads</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

	</div>

@stop