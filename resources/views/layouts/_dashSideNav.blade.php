<ul id="slide-out" class="side-nav">
    <li>
    <div class="userView">
        <div class="background">
            <img src="{{asset('/images/pattern.jpg')}}" style="width: 100%">
        </div>
        <a href="#!user"><img class="circle" src="{{ asset('/images/logo.png') }}"></a>
        <a href="#!name"><span class="white-text name">{{ $user->name }}</span></a>
        <a href="#!email"><span class="white-text email">{{ $user->email }}</span></a>
        </div>
    </li>
    <li><a href="{{ url('/dashboard') }}"><i class="ti-dashboard"></i>Dashboard</a></li>
    
    <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="ti-layout-list-thumb-alt"></i>News</div>
          <div class="collapsible-body">              
              <ul>
                  <li><a href="{{ url('/dashboard/posts') }}"> View All News</a></li>
                  <li><a href="{{ url('/dashboard/posts/create') }}"> Add A News</a></li>
              </ul>
          </div>
        </li>
    </ul>
    
    <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="ti-layout-menu-v"></i>Categories</div>
          <div class="collapsible-body">              
              <ul>
                  <li><a href="{{ url('/dashboard/categories') }}"> View All Categories</a></li>
                  <li><a href="{{ url('/dashboard/categories/create') }}"> Add A Category</a></li>
              </ul>
          </div>
        </li>
    </ul>
    <li><a href="{{ url('/dashboard/menus') }}"><i class="ti-layout-menu-separated"></i>Menus</a></li>
    <li><a href="{{ url('/dashboard/users') }}"><i class="ti-user"></i>Users</a></li>

</ul>
