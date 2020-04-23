<!-- Logo -->
    <a href="{{route('admin.dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Kee</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Keeta</b>CMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="{{route('frontend.home')}}" target="blank" class="dropdown-toggle">
              <!-- <img src="{{asset('user.jpg')}}" class="user-image" alt="User Image"> -->
              <i class=" fa fa-tv"></i>
              <span class="hidden-xs">{{ __('Lihat Website')}}</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('user.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ __('Halo, ') .auth('admin')->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('user.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{auth('admin')->user()->name}}
                  <small>
                    @if(role() == 'super')
                      {{ __('Super Admin')}}
                    @elseif(role() == 'editor')
                      {{ __('Editor')}}
                    @elseif(role() == 'writer')
                      {{ __('Penulis')}}
                    @endif
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('admin.password.change')}}" class="btn btn-default btn-flat">{{ __('Ubah Password')}}</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                    {{ __('Keluar')}}</a>
                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>