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
						<th>Type</th>
						<th>Options</th>
					</thead>
					<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }} </td>
						<td>{{ $user->name }} </td>
						<td>{{ $user->email }} </td>
						<td>{{ $user->created_at->diffForHumans() }} </td>
						<td>{{ $user->type ?? 'Normal User' }} </td>
						<td> 
							<a class="btn" href="#"><i class="material-icons">create</i></a>
							@if($user->type == 'editor')
								<a class="btn red" href="{{ url('/dashboard/users/remove',$user->id) }}"><i class="material-icons">accessibility</i></a>
							@else
								<a class="btn green" href="{{ url('/dashboard/users/add',$user->id) }}"><i class="material-icons">accessibility</i></a>
							@endif
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