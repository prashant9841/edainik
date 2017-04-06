@extends('layouts.dashboard')

@section('content')

		<div class="row">
		 <form class="col s12" role="form" method="POST" action="{{-- route('login') --}}">
		 {{--  PUT Method in html   --}}
		 <input type="hidden" name="_method" value="PUT">
          @include('dashboard.category._form')
        </form>
	</div>

@stop