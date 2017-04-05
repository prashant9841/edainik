@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		<div>
			<h3>{{ $post->title }}</h3>
			<p>{{ $post->content }}</p>
			<a href="{{ url('posts/'.$post->id) }}">View More</a >
		</div>
	@endforeach
@stop