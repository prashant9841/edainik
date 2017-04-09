@extends('layouts.dashboard')

@section('content')

		<div class="row">
		 <form class="col s12" role="form" method="POST" action="{{ url('/dashboard/categories/'.$category->id) }}">
		 {{--  PUT Method in html   --}}
		 <input type="hidden" name="_method" value="PUT">
          @include('dashboard.category._form')
          <button type="submit" class="btn">Update</button>
        </form>
	</div>

@stop