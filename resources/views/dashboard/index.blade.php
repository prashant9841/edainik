@extends('layouts.dashboard')

@section('content')
<div class="dashboard-page">    
    <div class="">
        <div class="row page-title">
            
            <h3>Dashboard</h3>            
            <nav class="breadcrumbs">
                <div class="nav-wrapper">
                    <a class="breadcrumb" href="#!">Dashboard</a>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col s12 m3">
                <a href="{{ url('/dashboard/posts/create') }}">
                    <div class="card">
                        <div class="card-content center-align">
                            <p>Add A News</p>
                        </div>
                    </div>
                </a>
            </div>
            @if(Auth::user()->isSuperAdmin())
            <div class="col s12 m3">
                <a href="{{ url('/dashboard/categories') }}">
                    <div class="card">
                        <div class="card-content center-align">
                            <p>Manage Categories</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m3">
                <a href="{{ url('/dashboard/menus') }}">
                    <div class="card">
                        <div class="card-content center-align">
                            <p>Manage Menus</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m3">
                <a href="{{ url('/dashboard/users') }}">
                    <div class="card">
                        <div class="card-content center-align">
                            <p>Manage Users</p>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>
        <div class="row content">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                            Recent Uploaded
                        </div>
                        <div class="collection">
                            <a href="#!" class="collection-item">Alvin</a>
                            <a href="#!" class="collection-item">Alvin</a>
                            <a href="#!" class="collection-item">Alvin</a>
                            <a href="#!" class="collection-item">Alvin</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
