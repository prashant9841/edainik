@extends('layouts.dashboard')

@section('content')
	<div class="category-page">
	
		<div class="row">
			<div class="col s12 m8">
				<h3>Stats of user: {{$user->name}}</h3>
				<div class="fixed-action-btn toolbar">
				    <a class="btn-floating btn-large red">
				      <i class="large material-icons">mode_edit</i>
				    </a>
				    <ul>
						<li>
							<a href="/dashboard/stats/{{ $user->id }}?status=verified" class="green"><i class="material-icons">publish</i>&nbsp;Verified</a>
						</li>
						<li>
							<a href="/dashboard/stats/{{ $user->id }}?status=unverified" class="blue darken-1"><i class="material-icons">highlight_off</i>&nbsp;UnVerified</a>
						</li>
						<li>
							<a href="/dashboard/stats/{{ $user->id }}?status=published" class="yellow"><i class="material-icons">done</i>&nbsp;Published</a>
						</li>
						<li>
							<a href="/dashboard/stats/{{ $user->id }}?status=unpublished" class="red"><i class="material-icons">block</i>&nbsp;Unpublished</a>
						</li>
				    </ul>
				  </div>
			</div>
			<div class="col s12 m4">
				<ul class="collection">
			        <li class="collection-item">Posted Today<span class="new badge blue" data-badge-caption="&nbsp;">{{$todayCount}}</span></li>
			        <li class="collection-item">Verified<span class="new badge blue" data-badge-caption="&nbsp;">{{ $verificationCount }}</span></li>
			      </ul>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/users">All Users</a>
					<a class="breadcrumb" href="#!">Stats</a>
				</div>
			</nav>
		</div>
		<div class="row">
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
						@foreach($userPosts as $post)
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

@section('scripts')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function() {
	    	$('#all-posts').DataTable();
		});

	</script>
@stop