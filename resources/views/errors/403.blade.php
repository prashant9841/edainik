@extends('layouts.app')

@section('title')
    Unauthorized
@stop

@section('content')

<div class="page-404">
	<div class="container">
		<div class="row center">
			<h1>Unauthorized Access</h1>
		</div>

        <ul class="row center inline">
            <li><a href="/">@lang('homepage.home')</a></li>
            @include('layouts._frontendMenu')
        </ul>
	</div>
</div>
@stop