@extends('layouts.dashboard')

@section('content')
	<div class="post-page">
		<div class="row">
			<div class="col s12 m8">
				<h3>All News</h3>
			</div>
			<div class="col s12 m4">
				<a href="/dashboard/posts/create" class="btn right">Create A News</a>
			</div>
			<nav class="breadcrumbs col s12">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">All News</a>
				</div>
			</nav>
		</div>
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
						<td class="line-clamp">{{ $post->content }}</td>
						<td>{{ $post->updated_at->diffForHumans() }}</td>
						<td>
							<a class="btn" href="{{ url('/dashboard/posts/'.$post->id) }}">View</a>
							<a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/edit') }}">Edit</a>
							@if(Auth::user()->isSuperAdmin())
								@if($post->verified)
									<a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/unverify') }}">Unverify</a>
								@else
									<a class="btn" href="{{ url('/dashboard/posts/'.$post->id.'/verify') }}">Verify</a>
								@endif

							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop