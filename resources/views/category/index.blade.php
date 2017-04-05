@extends('layouts.app')

@section('content')
	@foreach($categories as $category)
		<a href="{{ url('/category/'.$category->id) }}">{{ $category->title }} </a>
	@endforeach
@stop