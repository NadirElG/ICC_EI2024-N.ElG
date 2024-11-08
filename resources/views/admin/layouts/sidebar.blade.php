
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">ADMIN SloTeam</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">SLT</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li><a class="nav-link" href="index.html">Sloteam Dashboard</a></li>
              </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>USERS</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('admin.users-wallets.index') }}">User</a></li>
              <li><a class="nav-link" href="{{ route('admin.subscribers.index') }}">Subscribers</a></li>

              <!-- 
              <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
              <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> 
              -->
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-columns"></i> 
                <span>SLOTS</span>
              </a>
              <ul class="dropdown-menu">
              <li>
                <a class="nav-link" href="{{ route('admin.category.index') }}"><span>Category</span></a>
              </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-columns"></i> 
                <span>BLOGS</span>
              </a>
              <ul class="dropdown-menu">
              <li>
                <a class="nav-link" href="{{ route('admin.blog-category.index') }}"><span>Category</span></a>
                <a class="nav-link" href="{{ route('admin.blog.index') }}"><span>Blog</span></a>
              </li>
              </ul>
            </li>
            
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>        
        </aside>
      </div>