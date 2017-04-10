@extends('layouts.dashboard')

@section('content')
	<div class="category-page">
	
		<div class="row">
			<div class="col s12 m8">
				<h3>{{ $category->title }}</h3>
			</div>
			<div class="col s12 m4">
				<a href="{{url('/dashboard/categories/'.$category->id)}}/edit" class="btn right">Edit</a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/cagegories">All Categories</a>
					<a class="breadcrumb" href="#!">{{ $category->title }}</a>
				</div>
			</nav>
		</div>
		<div class="row">
			<h1>{{ $category->title }} </h1>
			<h5>Related News</h5>
			<div class="row">
				@foreach($category->userPosts(Auth::user()->id) as $post)
					<div class="col s12 m3">
						<div class="card">
							<div class="card-image">
				              	<img src="{{$post->getFirstImageUrl() }}">
				            </div>
							<div class="card-content">
								<span class="card-title">{{$post->title}}</span>
								<p>{{ str_limit($post->content,20) }}</p>
								
							</div>
							<div class="card-action">
								<a href="{{ url('dashboard/posts/'.$post->id)}}">View More</a>
				            </div>
						</div>
						
					</div>
				@endforeach
			</div>
		</div>
	</div>

@stop