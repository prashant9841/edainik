@extends('layouts.dashboard')

@section('content')
	<div class="create-page">
		<div class="row">
			<h1>Edit News</h1>
			<nav class="breadcrumbs">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/posts">All News</a>
					<a class="breadcrumb" href="#!">{{ $post->slug }}</a>
				</div>
			</nav>
		</div>
		<div class="row">
			<form class="col s12" role="form" method="POST" action="{{ url('/dashboard/posts/'.$post->id) }}" enctype="multipart/form-data">
	  		 	<input type="hidden" name="_method" value="PUT">
				@include('dashboard.post._form')
				<button type="submit" class="btn">Update</button>
			</form>
		</div>
	</div>
@stop
@include('dashboard.post._wysiwyg')
