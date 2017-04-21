@extends('layouts.dashboard')

@section('content')
	<div class="post-view-page">
		
		<div class="row page-title">
			<div class="col s12 m8">
				<h3>{{ $post->title }}</h3>
				
			</div>
			<div class="col s12 m4">
				<a href="{{ url('/dashboard/posts/'.$post->id) }}/edit" class="btn right"><i class="material-icons">create</i></a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/posts">All News</a>
					<a class="breadcrumb" href="#!">{{ $post->title }}</a>
				</div>
			</nav>
		</div>
		<div class="large-post">        
            <div class="parallax-container">
                <div class="section">
                    <div class="container">
                        <h1 class="header center">{{$post->title}}</h1>
                    </div>
                </div>
            	<div class="parallax">
	                @if($post->getMedia('images') && $post->getMedia('images')->count() > 0)
	                	<img src="{{$post->getMedia('images')->first()->getUrl() }}" alt="Unsplashed background img 1">
                	@else
	                	<img src="http://lorempixel.com/1000/600" alt="Unsplashed background img 1">
	                @endif
            	</div>
            </div>

            <div class="content container">
                <div class="row center">
                    <p class="wrap">{!! strip_tags($post->content,'<p>,<b>') !!}</p>
                </div>
            </div>
        </div>
	</div>


@stop
