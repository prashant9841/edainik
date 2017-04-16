@extends('layouts.dashboard')

@section('content')
	<div class="category-page">
	
		<div class="row">
			<div class="col s12 m8">
				<h3>All Categories</h3>
			</div>
			<div class="col s12 m4">
				<a href="/dashboard/categories/create" class="btn right"><i class="material-icons">add</i></a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">All Categories</a>
				</div>
			</nav>
		</div>

		<div class="row">
			<div class="collection">
				@foreach($categories as $category)

					<a href="{{ url('dashboard/categories/'.$category->slug) }}" class="collection-item">
						<div class="row">
							<p class="left flow">{{ $category->title }} </p>
							<div class="right"><button class="btn" style="padding: 0 1rem;"><i class="material-icons">create</i></button></div>
						</div>
					</a>
					
				@endforeach
			</div>
		</div>
	</div>
@stop