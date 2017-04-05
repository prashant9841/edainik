@extends('layouts.dashboard')

@section('content')
	@foreach($posts as $post)
		<div class="col s12">
			<h3>{{ $post->title }}</h3>
			<p>{{ $post->content }}</p>
			<p>{{ $post->updated_at->diffForHumans() }}</p>
			<a href="{{ url('/dashboard/posts/'.$post->id) }}">View More</a >
		</div>
	@endforeach
@stop