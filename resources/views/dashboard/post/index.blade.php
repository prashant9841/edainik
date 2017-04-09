@extends('layouts.dashboard')

@section('content')
	<div class="post-page">
		<div class="row">
			<h3>All News</h3>
			<nav class="breadcrumbs">
				<div class="nav-wrapper container">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="#!">All NEws</a>
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
						<td><a class="btn" href="{{ url('/dashboard/posts/'.$post->id) }}">View</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop