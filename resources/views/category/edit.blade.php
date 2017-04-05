@extends('layouts.app')

@section('content')

		<div class="row">
		 <form class="col s12" role="form" method="POST" action="{{-- route('login') --}}">
		 {{--  PUT Method in html   --}}
		 <input type="hidden" name="_method" value="PUT">
          @include('category._form')
        </form>
	</div>

@stop