@extends('layouts.dashboard')

@section('content')
	<div class="dashboard-page">    
	    <div class="">
	        <div class="row page-title">
	            
	            <h3>Change Password</h3>            
	            <nav class="breadcrumbs">
	                <div class="nav-wrapper">
	                    <a class="breadcrumb" href="/dashboard">Dashboard</a>
	                    <a class="breadcrumb" href="/dashboard/settings">Settings</a>
	                    <a class="breadcrumb" href="!#">Change Password</a>
	                </div>
	            </nav>
	        </div>
	        <div class="row">
	        	@if(session()->has('sucMsg'))
	        		<p>{{ session('sucMsg') }}</p>
	        	@endif
				<form action="{{url('/dashboard/settings/password') }}" method="post" class="col s12">
					{{ csrf_field() }}
					<div class="input-field col s12">
						<input id="current_password" name="current_password" type="password" class="validate">
						<label for="current_password">Current Password</label>
						@if( session()->has('errMsg') )
							<p class="errors">{{ session('errMsg') }}</p>
						@endif
						@if($errors->has('current_password'))
							<p class="errors">{{ $errors->get('current_password')[0] }}</p>
						@endif
					</div>
					<div class="input-field col s12">
						<input id="new_password" name="new_password" type="password" class="validate">
						<label for="new_password">New Password</label>
						@if($errors->has('new_password'))
							<p class="errors">{{ $errors->get('new_password')[0] }}</p>
						@endif
					</div>
					<div class="input-field col s12">
						<input id="retype_password" name="retype_password" type="password" class="validate">
						<label for="retype_password">Retype Password</label>
						@if($errors->has('retype_password'))
							<p class="errors">{{ $errors->get('retype_password')[0] }}</p>
						@endif
					</div>
					<div class="input-field col s12">
						<button type="submit" class="btn">Submit<i class="material-icons right">send</i></button>
					</div>
				</form>
	        </div>
	    </div>
    </div>
</div>
@stop