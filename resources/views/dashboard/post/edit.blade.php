@extends('layouts.dashboard')

@section('content')
	<h1>Edit Post</h1>
	<div class="row">
		<form class="col s12" role="form" method="POST" action="{{-- route('login') --}}">
  		 	<input type="hidden" name="_method" value="PUT">
			@include('dashboard.post._form')
			<input type="submit" value="Update">
		</form>
	</div>
@stop
