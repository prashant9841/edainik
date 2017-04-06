@extends('layouts.dashboard')

@section('content')
	@foreach($categories as $category)
		<div class="col s12">
			<a href="{{ url('dashboard/categories/'.$category->id) }}">{{ $category->title }} </a>
		</div>
	@endforeach
@stop