@extends('layouts.dashboard')

@section('content')
	<div class="create-category">
		<div class="row">
			<div class="col s12">
				<h3>Edit <b>{{$category->title}}</b></h3>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/categories">All Categories</a>
					<a class="breadcrumb" href="#!">{{$category->title}}</a>
				</div>
			</nav>
		</div>		

		<div class="row">
			<form class="col s12" role="form" method="POST" action="{{ url('/dashboard/categories/'.$category->slug) }}">
			 {{--  PUT Method in html   --}}
			<input type="hidden" name="_method" value="PUT">
		      @include('dashboard.category._form')
		    <button type="submit" class="btn">Update</button>
	        </form>
		</div>
	</div>

@stop