@extends('layouts.dashboard')

@section('content')
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
					<td>{{ $post->content }}</td>
					<td>{{ $post->updated_at->diffForHumans() }}</td>
					<td><a class="btn" href="{{ url('/dashboard/posts/'.$post->id) }}">View More</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop