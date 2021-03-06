@extends('layouts.dashboard')

@section('title')
	All Posts
@stop
@section('content')
	<div class="post-page">
		<div class="row">
			<div class="col s12 m8">
				<h3>All News</h3>
			</div>
			<div class="col s12 m4">
				<a href="/dashboard/posts/create" data-position="left" data-delay="50" data-tooltip="Add a new news" class="btn right tooltipped"><i class="material-icons">add</i></a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">All News</a>
				</div>
			</nav>
		</div>
		<div class="all-posts">		
			<table id="all-posts">
				<thead>
					<tr>
						<th>Title</th>
						<th>Content</th>
						<th>Created</th>
						@if(auth::user()->isSuperAdmin() && url()->current() == url('/dashboard/all-posts'))
							<th>User</th>
						@endif
						<th>Options</th>
					</tr>
				</thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td class="line-clamp">{{ $post->description }}</td>
							<td>{{ $post->created_at }}</td>
							@if(auth()->user()->isSuperAdmin() && url()->current() == url('/dashboard/all-posts'))
							<td>{{ $post->user->name }}</td>
							@endif
							<td>
								<a class="btn tooltipped" 
								data-position="bottom" data-delay="50" data-tooltip="View news"
								href="{{ url('/dashboard/posts/'.$post->id) }}"><i class="material-icons">open_in_new</i></a>
								<a class="btn tooltipped"
								data-position="bottom" data-delay="50" data-tooltip="Edit news" 
								href="{{ url('/dashboard/posts/'.$post->id.'/edit') }}"><i class="material-icons">mode_edit</i></a>
								<form action="{{ url('/dashboard/posts',$post->id)}}" method="post">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn tooltipped"
									data-position="bottom" data-delay="50" data-tooltip="Delete News" 
									href="{{ url('/dashboard/posts/'.$post->id.'/delete') }}"><i class="material-icons">delete_forever</i></button>
								</form>
								@if(Auth::user()->isSuperAdmin() || auth()->user()->isEditor())
								{{--Featured--}}
									@if(isset($post->featured) && $post->featured->count())
										<a class="btn red tooltipped" 
										data-position="bottom" data-delay="50" data-tooltip="Remove from featured"
										href="{{ url('/dashboard/posts/'.$post->id.'/featured') }}"><i class="material-icons">star</i></a>
									@else
										<a class="btn green tooltipped" 
										data-position="bottom" data-delay="50" data-tooltip="Add as featured"
										href="{{ url('/dashboard/posts/'.$post->id.'/featured') }}"><i class="material-icons">star</i></a>
									@endif

									{{--Verifiation--}}
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
@stop

@section('scripts')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
	    	$('#all-posts').DataTable();
		});

	</script>
@stop