@extends('layouts.dashboard')

@section('content')
<div class="dashboard-page">    
    <div class="container">
        <div class="row page-title">
            
            <h3>Dashboard</h3>            
            <nav class="breadcrumbs">
                <div class="nav-wrapper container">
                    <a class="breadcrumb" href="/dashboard">Dashboard</a>
                    <a class="breadcrumb" href="#!">All NEws</a>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-content center-align">
                        <a href="#">Add A News</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-content center-align">
                        <a href="#">Manage Categories</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-content center-align">
                        <a href="#">Manage Menus</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-content center-align">
                        <a href="#">Manage Users</a>
                    </div>
                </div>
            </div>
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
