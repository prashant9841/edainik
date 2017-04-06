@extends('layouts.app')

@section('content')
	@foreach($categories as $category)
	<div class="col s12">
		<a href="{{ url('/categories/'.$category->id) }}">{{ $category->title }} </a>
	</div>
	@endforeach
@stop