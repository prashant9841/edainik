@extends('layouts.app')

@section('title')
    Page not found | edainik post 
@stop

@section('content')

<div class="page-404">
	<div class="container">
		<div class="row center">
			<h1>पृष्ठ भेटिएन</h1>
			<p>
				तपाईले खोज्नुभएको पृष्ठ भेटिएन
			</p>
			<h4>कुनै पृष्ठमा जानुहोस्</h4>
		</div>

        <ul class="row center inline">
            <li><a href="/">@lang('homepage.home')</a></li>
            @include('layouts._frontendMenu')
        </ul>
	</div>
</div>
@stop