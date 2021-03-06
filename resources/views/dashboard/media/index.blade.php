@extends('layouts.dashboard')

@section('content')
	<div class="post-page">
		<div class="row">
			<div class="col s12 m8">
				<h3>All Medias</h3>
			</div>
			<div class="col s12 m4">
				<a href="/dashboard/medias/create" class="btn right"><i class="material-icons">add</i></a>
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
			<div class="col m4 s6">
				<div class="card">
					<div class="card-image">
						<img src="{{$image->getUrl()}}">
						<div class="card-title row">
							<h5 class="left">
								Image
							</h5>
							<div class="right">
								<a class="btn" href="{{ url('/dashboard/medias/'. $image->id .'/edit')}}"><i class="material-icons">aspect_ratio</i></a>
								<a class="btn" href="{{ url('dashboard/posts/'.$image->model_type::find($image->model_id)->id.'/edit') }}"><i class="material-icons">create</i></a>
								<a class="btn red" href="{{ url('/dashboard/medias/removeImage/'.$image->id)}}"><i class="material-icons">delete</i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		@endif
	</div>
@stop