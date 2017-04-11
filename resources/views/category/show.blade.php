@extends('layouts.app')

@section('content')

	<div class="row">
		<section class="featured-post">
			@foreach($category->approvedPosts as $post)
		      @include('partials.category._postCard')
			@endforeach
		</section>
    @if(isset($related))
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
    @endif
	</div>

@stop