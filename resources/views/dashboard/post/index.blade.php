@extends('layouts.dashboard')

@section('content')
	<div class="post-page">
		<div class="row">
			<div class="col s12 m8">
				<h3>All News</h3>
			</div>
			<div class="col s12 m4">
				<a href="/dashboard/posts/create" class="btn right"><i class="material-icons">add</i></a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">All News</a>
				</div>
			</nav>
		</div>
		<div class="all-posts">		
			<table>
				<thead>
					<tr>
						<th>Title</th>
						<th>Content</th>
						<th>Updated</th>
						<th>Options</th>
					</tr>
				</thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<td>{{ $post->title }}</td>
							<td class="line-clamp">{!! $post->content !!}</td>
							<td>{{ $post->updated_at->diffForHumans() }}</td>
							<td>
								<a class="btn" href="{{ url('/dashboard/posts/'.$post->id) }}"><i class="material-icons">open_in_new</i></a>
								<a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/edit') }}"><i class="material-icons">mode_edit</i></a>
								@if(Auth::user()->isSuperAdmin())
									@if($post->verified)
										<a class="btn red" href="{{ url('/dashboard/posts/'.$post->id.'/unverify') }}"><i class="material-icons">block</i></a>
									@else
										<a class="btn green" href="{{ url('/dashboard/posts/'.$post->id.'/verify') }}"><i class="material-icons">done</i></a>
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