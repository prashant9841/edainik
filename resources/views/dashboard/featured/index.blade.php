@extends('layouts.dashboard')

@section('content')
	<div class="post-page">
		<div class="row">
			<div class="col s12 m8">
				<h3>Featured Posts</h3>
			</div>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">Featured</a>
				</div>
			</nav>
		</div>
		<div class="all-posts">		
			<table id="all-posts">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Created</th>
						<th>Options</th>
					</tr>
				</thead>

				<tbody>
				@if($posts->count() > 0)
					@foreach($posts as $post)
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
								<form action="{{ url('/dashboard/posts',$post->id)}}" method="post">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn tooltipped"
									data-position="bottom" data-delay="50" data-tooltip="Delete News" 
									href="{{ url('/dashboard/posts/'.$post->id.'/delete') }}"><i class="material-icons">delete_forever</i></button>
								</form>
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
				@endif
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('scripts')
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
	    	$('#all-posts').DataTable();
		});

	</script>
@stop