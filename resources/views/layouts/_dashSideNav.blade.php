<ul id="slide-out" class="side-nav">
    <li>
    <div class="userView">
        <div class="background">
            <img src="{{asset('/images/pattern.jpg')}}" style="width: 100%">
        </div>
        <a href="#!user"><img class="circle" src="{{ asset('/images/logo.png') }}"></a>
        
        
        <a href="#!name">
          <span class="white-text name">{{ $user->name }}
            @if($user->isSuperAdmin())
              <i class="material-icons">verified_user</i>
            @endif 
          </span>
        </a>
        <a href="#!email"><span class="white-text email">{{ $user->email }}</span></a>
        </div>
    </li>
    <li><a href="{{ url('/dashboard') }}"><i class="material-icons">dashboard</i> &nbsp; Dashboard</a></li>
    
    <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header"><i class="material-icons">description</i> &nbsp;News</div>
          <div class="collapsible-body">              
              <ul>
                  <li><a href="{{ url('/dashboard/posts') }}"> View All News</a></li>
                  <li><a href="{{ url('/dashboard/posts/create') }}"> Add A News</a></li>
              </ul>
          </div>
        </li>
    </ul>
      <li><a href="{{ url('/dashboard/medias') }}"><i class="material-icons">art_track</i> &nbsp; Media</a></li>
    
    @if($user->isSuperAdmin())
        <li><a href="{{ url('/dashboard/all-posts') }}"><i class="material-icons">list</i> &nbsp; All Posts</a></li>
    
      <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="material-icons">view_compact</i> &nbsp;Categories</div>
            <div class="collapsible-body">              
                <ul>
                    <li><a href="{{ url('/dashboard/categories') }}"> View All Categories</a></li>
                    <li><a href="{{ url('/dashboard/categories/create') }}"> Add A Category</a></li>
                </ul>
            </div>
          </li>
      </ul>
      <li><a href="{{ url('/dashboard/menus') }}"><i class="material-icons">sort</i> &nbsp;Navigation</a></li>
      <li><a href="{{ url('/dashboard/users') }}"><i class="material-icons">group</i> &nbsp;Users</a></li>
    @endif 

</ul>
