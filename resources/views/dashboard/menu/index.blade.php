@extends('layouts.dashboard')

@section('content')
	<div class="row">
		<div class="col s12 m6 l6">
			<h3>Categories</h3>
			<ul class="collection">
				@foreach($categories as $category)
					<li class="collection-item row">
						<span class="left">
							{{$category->title}} 
						</span>
						<span class="right">	
							<form method="post" action="{{ url('/dashboard/menus')}}">
								@include('dashboard.menu._form')
								<input type="submit" class="btn 
								@if(in_array($category->id, $menus->pluck('category_id')->toArray() ))
									disabled
								@endif
								" value="Add to menu">
							</form>
						</span>

					</li>
				@endforeach
			</ul>
		</div>
		<div class="col s12 m6 l6">
			<h3>Menus</h3>
			<ul>
				@foreach($menus as $menu)
					<li class="col s12 m12">
						<div class="col s12 m6 l6">
							{{$menu->category->title}} - {{$menu->order}}
						</div>
						<div class="col s12 m6 l6">
						<form method="post" action="{{ url('/dashboard/menus/'.$menu->id) }}">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn red"><i class="ti-trash"></i></button>
						</form>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@stop