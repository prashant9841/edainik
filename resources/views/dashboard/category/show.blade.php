@extends('layouts.dashboard')

@section('content')
	<h1>{{ $category->title }} </h1>
		<div class="row">
			<h3>Related Posts</h3>
			@foreach($category->userPosts(Auth::user()->id) as $post)
				<div class="col s12">
					<h4>{{$post->title}}</h4>
					<p>{{ str_limit($post->content,20) }}</p>
					<a href="{{ url('dashboard/posts/'.$post->id)}}">View More</a>
				</div>
			@endforeach
		</div>

@stop