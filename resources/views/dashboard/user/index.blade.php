@extends('layouts.dashboard')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col m12 l12 s12">
				<table>
					<thead>
						<th>id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Created</th>
						<th>Updated</th>
						<th>Options</th>
					</thead>
					<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }} </td>
						<td>{{ $user->name }} </td>
						<td>{{ $user->email }} </td>
						<td>{{ $user->created_at->diffForHumans() }} </td>
						<td>{{ $user->updated_at->diffForHumans() }} </td>
						<td> 
							<a class="btn" href="#"><i class="material-icons">create</i></a>
							<a class="btn" href="{{url('/dashboard/stats',$user->id) }}"><i class="material-icons">insert_chart</i></a>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop