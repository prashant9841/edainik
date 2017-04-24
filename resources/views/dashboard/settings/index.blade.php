@extends('layouts.dashboard')

@section('content')
	<div class="dashboard-page">    
	    <div class="">
	        <div class="row page-title">
	            
	            <h3>Settings</h3>            
	            <nav class="breadcrumbs">
	                <div class="nav-wrapper">
	                    <a class="breadcrumb" href="/dashboard">Dashboard</a>
	                    <a class="breadcrumb" href="#!">Settings</a>
	                </div>
	            </nav>
	        </div>
	        <div class="col m6 s12">
		        <div class="collection">
					<a class="collection-item row" href="/dashboard/settings/password">
			        	<div class="col m2 s0">
			        		<i class="material-icons">lock</i>
			        	</div>
			        	<div class="col m10 s12">
			        		Change Password
			        	</div>
					 </a>
					@if(auth()->user()->isSuperAdmin())
					<a class="collection-item row" href="/dashboard/settings/register">
						<div class="col m2 s0">
			        		<i class="material-icons">vpn_key</i>
			        	</div>
			        	<div class="col m10 s12">
			        		Register a new user
			        	</div>
		        	</a>
					@endif
		        </div>
	        	
	        </div>
	    </div>
    </div>
</div>
@stop