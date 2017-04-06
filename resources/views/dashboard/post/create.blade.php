@extends('layouts.dashboard')

@section('content')
	<h1>Create a new Post</h1>
	<div class="row">
		 <form class="col s12" role="form" method="POST" action="{{url('dashboard/posts')}}">
          @include('dashboard.post._form')

          <input type="submit" name="submit" value="Submit">
        </form>
	</div>

@stop