@extends('layouts.dashboard')

@section('content')
	<div class="category-page">
	
		<div class="row">
			<div class="col s12 m8">
				<h3>{{ $category->title }}</h3>
			</div>
			<div class="col s12 m4">
				<a href="{{url('/dashboard/categories/'.$category->slug)}}/edit" class="btn right"><i class="material-icons">create</i></a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/categories">All Categories</a>
					<a class="breadcrumb" href="#!">{{ $category->title }}</a>
				</div>
			</nav>
		</div>
		<div class="row">
			{{-- <h1>{{ $category->title }} </h1> --}}
			<h5>Related News</h5>
			<div class="row">
				<table id="all-posts">
					<thead>
						<tr>
							<th>Title</th>
							<th>Content</th>
							<th>Created</th>
							<th>Options</th>
						</tr>
					</thead>

					<tbody>
						@foreach($category->userPosts(Auth::user()->id) as $post)
							<tr>
								<td>{{ $post->title }}</td>
								<td class="line-clamp">{{ $post->description }}</td>
								<td>{{ $post->created_at->diffForHumans() }}</td>
								<td>
									<a class="btn tooltipped" 
									data-position="bottom" data-delay="50" data-tooltip="View news"
									href="{{ url('/dashboard/posts/'.$post->id) }}"><i class="material-icons">open_in_new</i></a>

									<a class="btn tooltipped"
									data-position="bottom" data-delay="50" data-tooltip="Edit news" 
									href="{{ url('/dashboard/posts/'.$post->id.'/edit') }}"><i class="material-icons">mode_edit</i></a>
									@if(Auth::user()->isSuperAdmin())
										@if(isset($post->featured) && $post->featured->count())
											<a class="btn red tooltipped" 
											data-position="bottom" data-delay="50" data-tooltip="Remove from featured"
											href="{{ url('/dashboard/posts/'.$post->id.'/featured') }}"><i class="material-icons">star</i></a>
										@else
											<a class="btn green tooltipped" 
											data-position="bottom" data-delay="50" data-tooltip="Add as featured"
											href="{{ url('/dashboard/posts/'.$post->id.'/featured') }}"><i class="material-icons">star</i></a>
										@endif
										@if($post->verified)
											<a class="btn red tooltipped" 
											data-position="bottom" data-delay="50" data-tooltip="Unverify"
											href="{{ url('/dashboard/posts/'.$post->id.'/unverify') }}"><i class="material-icons">block</i></a>
										@else
											<a class="btn green tooltipped"
											data-position="bottom" data-delay="50" data-tooltip="Verify"
											 href="{{ url('/dashboard/posts/'.$post->id.'/verify') }}"><i class="material-icons">done</i></a>
										@endif

									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@stop