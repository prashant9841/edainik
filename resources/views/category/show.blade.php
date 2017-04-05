@extends('layouts.app')

@section('content')

	<h1>{{ $category->title }} </h1>
	<div class="row">
		@foreach($category->posts as $post)
			<div class="col s12">
				<h3>{{$post->title}}</h3>
				<p>{{ str_limit($post->content,20) }}</p>
				<a href="{{ url('/posts/'.$post->id)}}">View More</a>
			</div>
		@endforeach
	</div>

@stop