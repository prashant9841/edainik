@extends('layouts.app')

@section('content')

	<h1>{{ $category->title }} </h1>
	<div class="row">
	<h1>Related Posts</h1>
		@foreach($category->approvedPosts as $post)
			<div class="col s12">
				<h3>{{$post->title}}</h3>
				<p>{{ str_limit($post->content,20) }}</p>
				<a href="{{ url('/posts/'.$post->id)}}">View More</a>
			</div>
		@endforeach
	</div>

@stop