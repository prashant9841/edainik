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
				<h3>Change Password</h3>
				<form action="">
					<div class="input-field col s12">
						<input id="current_password" type="text" class="validate">
						<label for="current_password">Current Password</label>
					</div>
				<div class="input-field col s12">
					<input id="new_password" type="text" class="validate">
					<label for="new_password">New Password</label>
				</div>
				<div class="input-field col s12">
					<input id="retype_password" type="text" class="validate">
					<label for="retype_password">Retype Password</label>
				</div>
	            </form>
	           
	        </div>
	    </div>
    </div>
</div>
@stop