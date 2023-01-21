<header class="main-header">
    <!-- Logo -->
 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu right">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="messages-menu">
            <a href="{{URL::to('/')}}" class="tooltip-viewport-bottom" title="Ke halaman utama" target="_blank">
              <i class="mdi mdi-home-outline mdi-18px"></i>
            </a>
          </li>
            
            <notification></notification>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset(Auth::user()->image) }}" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset(Auth::user()->image) }}" class="img-circle" style="width:100px;height:110px" alt="User Image">
                <p>
                  {{ Auth::user()->username }}
                  <small><em><?php echo date('d F Y')?></em></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{URL('pengaturan')}}" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Profile</a>
                </div>
                <div class="pull-right">
                 <a href="{{ URL('logout') }}" class="btn btn-default btn-flat" id="keluar">Sign out <i class="fa fa-sign-out"></i></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
