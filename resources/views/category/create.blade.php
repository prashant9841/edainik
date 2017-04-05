@extends('layouts.app')

@section('content')

		<div class="row">
		 <form class="col s12" role="form" method="POST" action="{{-- route('login') --}}">
          @include('category._form')
        </form>
	</div>

@stop