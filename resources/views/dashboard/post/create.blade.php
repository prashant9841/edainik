@extends('layouts.dashboard')

@section('content')
	<div class="create-page">
		<div class="row">
			<h3>Create A News</h3>
			<nav class="breadcrumbs">
				<div class="nav-wrapper">
					<a class="breadcrumb" href="/dashboard">Dashboard</a>
					<a class="breadcrumb" href="/dashboard/posts">All NEws</a>
					<a class="breadcrumb" href="#!">Create A News</a>
				</div>
			</nav>
		</div>

		<div class="row">
			 <form class="col s12" role="form" method="POST" action="{{url('dashboard/posts')}}">
	          @include('dashboard.post._form')

	          <button type="submit" name="submit" class="btn">Post</button>
	        </form>
		</div>

	</div>
@stop