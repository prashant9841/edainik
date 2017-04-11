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
        <div class="row btn-cards">
            <div class="col s12 m3">
                <a href="{{ url('/dashboard/posts/create') }}">
                    <div class="card light-blue accent-4">
                        <div class="card-content center-align">
                            <p><i class="material-icons">description</i> Add A News</p>
                        </div>
                    </div>
                </a>
            </div>
            @if(Auth::user()->isSuperAdmin())
            <div class="col s12 m3">
                <a href="{{ url('/dashboard/categories') }}">
                    <div class="card red">
                        <div class="card-content center-align">
                            <p><i class="material-icons">view_compact</i><span> Manage Categories</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m3 ">
                <a href="{{ url('/dashboard/menus') }}">
                    <div class="card green">
                        <div class="card-content center-align">
                            <p><i class="material-icons">sort</i> Manage Navigation</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m3 ">
                <a href="{{ url('/dashboard/users') }}">
                    <div class="card brown darken-1">
                        <div class="card-content center-align">
                            <p><i class="material-icons">group</i>  Manage Users</p>
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
                            @foreach($recent as $item)
                                <a href="{{ url('/dashboard/posts',$item->id) }}" class="collection-item">{{ $item->title }} - {{$item->updated_at->diffForHumans()}}</a>
                            @endforeach
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="fixed-action-btn toolbar">
                    <a class="btn-floating btn-large red">
                      <i class="large material-icons">mode_edit</i>
                    </a>
                    <ul>
                      <li class="waves-effect waves-light"><a href="/dashboard/posts?status=verified"><i class="material-icons">insert_chart</i></a></li>
                      <li class="waves-effect waves-light"><a href="/dashboard/posts?status=unverified"><i class="material-icons">format_quote</i></a></li>
                      <li class="waves-effect waves-light"><a href="/dashboard/posts?status=published"><i class="material-icons">publish</i></a></li>
                      <li class="waves-effect waves-light"><a href="/dashboard/posts?status=unpublished"><i class="material-icons">attach_file</i></a></li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
