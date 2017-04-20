@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		<div>
			<h3>{{ $post->title }}</h3>
			<p>{!! $post->content !!}</p>
			<a href="{{ route('singleNews',$post->slug) }}">थप पढ्नुहोस्</a >
			@if(Auth::user()->id == $post->user_id)
				<a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/edit')}}"><i class="material-icons">create</i></a>
			@endif
		</div>
	@endforeach
@stop