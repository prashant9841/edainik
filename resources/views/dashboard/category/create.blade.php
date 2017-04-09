@extends('layouts.dashboard')

@section('content')
	<div class="row">
		 <form class="col s12" role="form" method="POST" action="{{ url('/dashboard/categories') }}">
          @include('dashboard.category._form')
          <button type="submit" class="btn">Submit</button>
        </form>
	</div>
	@include('dashboard.post._wysiwyg')
@stop