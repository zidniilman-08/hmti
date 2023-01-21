<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->username }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     <br/>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        </li>
        <li class="{{Request::is('dashboard')?'active':''}}">
          <a href="{{ URL::to('dashboard') }}">
            <i class="fa fa-dashboard"></i>
            <span>Dasboard</span>
          </a>
        </li>
        <li class="treeview {{Request::is('artikel') || Request::is('kategori') || Request::is('artikel/create')?'active':''}}">
          <a href="#">
            <i class="fa fa-file-archive-o"></i> <span>Blog</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('artikel')?'active':''}}"><a href="{{URL::to('artikel')}}"><i class="fa fa-files-o"></i> Artikel</a></li>
            <li class="{{Request::is('kategori')?'active':''}}"><a href="{{URL::to('kategori')}}"><i class="fa fa-database"></i> Kategori</a></li>
          </ul>
        </li>
        <li class="treeview {{Request::is('user') || Request::is('log')?'active':''}}">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Data Master</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="{{Request::is('user')?'active':''}}"><a href="{{URL::to('user')}}"><i class="mdi mdi-account-multiple"></i> Users</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Logs</a></li>
          </ul>
        </li>
        <li class="{{Request::is('calendar')?'active':''}}">
          <a href="{{URL::to('/calendar')}}">
            <i class="fa fa-calendar"></i>
            <span>Calendar</span>
          </a>
        </li>
        <li class="{{Request::is('forum')?'active':''}}">
          <a href="{{URL::to('forum')}}">
            <i class="fa fa-home"></i>
            <span>Forum</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Email</span>
          </a>
        </li>
        <li>
          <a href="{{URL::to('visitor')}}">
            <i class="fa fa-users"></i>
            <span>Visitors</span>
          </a>
        </li>
        <li class="{{Request::is('pengaturan')?'active':''}}">
          <a href="{{URL::to('pengaturan')}}">
            <i class="fa fa-gear"></i>
            <span>Pengaturan</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>