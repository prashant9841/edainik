@extends('layouts.dashboard')

@section('content')
	<div class="create-category">
		<div class="row">
			<div class="col s12">
				<h3>Create A Category</h3>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/categories">All Categories</a>
					<a class="breadcrumb" href="#!">Create A Categories</a>
				</div>
			</nav>
		</div>
		
		<div class="row">
			 <form class="col s12" role="form" method="POST" action="{{ url('/dashboard/categories') }}">
	          @include('dashboard.category._form')
	          <button type="submit" class="btn">Submit</button>
	        </form>
		</div>
	</div>
	@include('dashboard.post._wysiwyg')
@stop