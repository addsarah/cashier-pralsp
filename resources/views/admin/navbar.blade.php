<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="{{ url("#") }}" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

<!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item"> 
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="{{ url("#") }}" class="dropdown-item">
          <!-- Message Start -->
          
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ url("#") }}" class="dropdown-item">
          <!-- Message Start -->
          
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ url("#") }}" class="dropdown-item">
          <!-- Message Start -->
          {{--  <div class="media">
            <img src="{{ asset("/admin/dist/img/user3-128x128.jpg") }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>  --}}
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ url("#") }}" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="{{ url("#") }}">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> @if(Auth::check())
          <span class="hidden-x5">{{ Auth::user()->name }}</span>
          @endif
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> @if(Auth::check())
          <span class="hidden-x5">{{ Auth::user()->email }}</span>
          @endif
        </a>
        <div class="dropdown-divider"></div>
          <form align="center" action="{{ route("logout") }}" method="post">
            @csrf
            <button type="submit" class="btn btn-block btn-danger">Logout</button>
          </form>
        </div>
    </li>
    <li class="nav-item">
    </li>
    <li class="nav-item">
    </li>
  </ul>
</nav>