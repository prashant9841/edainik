@extends('layouts.dashboard')

@section('content')
	<div class="dashboard-page">    
	    <div class="">
	        <div class="row page-title">
	            
	            <h3>Dashboard</h3>            
	            <nav class="breadcrumbs">
	                <div class="nav-wrapper">
	                    <a class="breadcrumb" href="/dashboard">Dashboard</a>
	                    <a class="breadcrumb" href="#!">Settings</a>
	                </div>
	            </nav>
	        </div>
	        <div class="row btn-cards">
				<a href="/dashboard/settings/password">Change Password</a>
	        </div>
	    </div>
    </div>
</div>
@stop