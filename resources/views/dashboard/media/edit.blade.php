@extends('layouts.dashboard')

@section('content')
	<h1>Edit Media</h1>
	<div class="row">
		<form class="col s12" role="form" method="POST" action="{{ url('/dashboard/medias/'.$media->id) }}" enctype="multipart/form-data">
  		 	<input type="hidden" name="_method" value="PUT">
			@include('dashboard.media._form')
			<button type="submit" class="btn">Update</button>
		</form>
	</div>
@stop
