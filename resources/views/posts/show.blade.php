@extends('layouts.app')

@section('content')

		<div>
			<h3>{{ $post->title }}</h3>
			<p>{{ $post->content }}</p>
		</div>

@stop