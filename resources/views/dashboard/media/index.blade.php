@extends('layouts.dashboard')

@section('content')
	<div class="post-page">
		<div class="row">
			<div class="col s12 m8">
				<h3>All Medias</h3>
			</div>
			<div class="col s12 m4">
				<a href="/dashboard/medias/create" class="btn right">Create A Media</a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">All Medias</a>
				</div>
			</nav>
		</div>
	</div>
	<div class="all-posts">		
		@if(isset($medias))
			@foreach($medias as $image)
			<div class="card col m4 s6 l4">
				<div class="card-image">
					<img src="{{$image->getUrl()}}">
					<span class="card-title">{{ $image->name }}</span>
				</div>
				<div class="card-action">
					<a href="{{ url('/dashboard/medias/removeImage/'.$image->id)}}">Remove</a>
					<a href="{{ url('/dashboard/medias/'. $image->id .'/edit')}}">Edit</a>
					<a href="{{ url('dashboard/posts/'.$image->model_type::find($image->model_id)->id.'/edit') }}">Show</a>
				</div>
			</div>
			@endforeach
		@endif
	</div>
@stop