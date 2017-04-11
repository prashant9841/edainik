@extends('layouts.dashboard')

@section('content')
<div class="menus-page">
	<div class="row">
		<div class="col s12">
			<h3>Navigation</h3>
		</div>
		<nav class="breadcrumbs col s12">
			<div class="nav-wrapper">
				<a class="breadcrumb" href="/dashboard">Dashboard</a>
				<a class="breadcrumb" href="#!">Navigation</a>
			</div>
		</nav>
	</div>
</div>
	<div class="row">
		<div class="col s12 m6 l6">
			<h3>Categories</h3>
			<p><span><i class="material-icons">info</i>Append category to navigation</span></p>
			<ul class="collection">
				@foreach($categories as $category)
					<li class="collection-item row">
						<span class="left">
							{{$category->title}} 
						</span>
						<span class="right">	
							<form method="post" action="{{ url('/dashboard/menus')}}">
								@include('dashboard.menu._form')
								<button type="submit" class="btn 
								@if(in_array($category->id, $menus->pluck('category_id')->toArray() ))
									disabled
								@endif
								"><i class="material-icons">add</i></button>
							</form>
						</span>

					</li>
				@endforeach
			</ul>
		</div>
		<div class="col s12 m6 l6">
			<h3>Navigation</h3>
			<p><span><i class="material-icons">info</i>The site's menu is configured here. The order is same. Top items show up first</span></p>
			<ul class="collection">
				@foreach($menus as $menu)
					<li class="collection-item row">
						<div class="col s12 m6 l6">
							{{$menu->category->title}} - {{$menu->order}}
						</div>
						<div class="col s12 m6 l6">
							<form method="post" action="{{ url('/dashboard/menus/'.$menu->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn red right"><i class="material-icons">remove</i></button>
							</form>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@stop