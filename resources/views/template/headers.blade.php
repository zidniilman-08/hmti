<div class="navbar-fixed">
  <nav class="white">
    <div class="nav-wrapper">
      <a href="{{URL::to('/')}}" class="animated jello brand-logo logo-page logos"></a>
        <a href="#!" data-activates="mobile-demo" class="button-collapse"><i class="mdi mdi-menu"></i></a>
        <ul class="lefts hide-on-med-and-down">
          <li class="{{Request::is('artikels') ? 'active':''}}"><a href="{{URL::to('/artikels')}}" >Artikels</i></a></li>
          <li class="{{Request::is('events') ? 'active':''}}"><a href="{{url('/events')}}">Events</a></li>
          <li class="{{Request::is('forums') ? 'active':''}}"><a href="{{url('/forums')}}">Forums</a></li>
          <li class="{{Request::is('aboutus') ? 'active':''}}"><a href="{{url('/aboutus')}}"> Abouts</a></li>
          <li>
           <div class="search-nav">
              <form>
               <div class="input-field">
               <input type="search" name="q" class="src-input" id="input-src" placeholder="Cari artikel.." autocomplete="off" required>
               <label class="label-icon" for="search"><i class="black-text fa fa-search"></i></label>
               <div id="result" class="z-depyh-1"></div>
              </div>
            </form>
         </div>
       </li>
      </ul>
      @guest
       <ul class="right hide-on-med-and-down">
         <li class="{{Request::is('login')?'active':''}}"><a href="{{URL::to('login')}}"><b>Login</b></a></li>
         <li class="{{Request::is('register')?'active':''}}"><a href="{{URL::to('register')}}" class="btn"><span>Sign Up</span></a></li>
       </ul>
       <ul class="right hide-on-large-only show-on-medium-and-down">
         <li class="{{Request::is('login')?'active':''}}"><a href="{{URL::to('login')}}"><i class="mdi mdi-login"></i></a></li>
         <li class="{{Request::is('register')?'active':''}}"><a href="{{URL::to('register')}}"><i class="mdi mdi-account-plus"></i></a></li>
       </ul>
       @endguest

        @if(Auth::user())
        <ul class="right">
        <li class="dropdown dropdown-notifications">
          <a href='#!' data-toggle="dropdown" class="hide-on-med-and-up dropdown-toggle"><i class="fa fa-search"></i></a>
          <ul class="dropdown-menu"></ul>
        </li>
        <notifuser :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notifuser>
        <li class="hide-on-large-only user-navbar">
          <a href="#!" data-activates="profile-side" class="side-profile-nav">
            <img src="{{ asset(Auth::user()->image) }}" class="image-user">
          </a>
        </li>
        <li class="dropdown hito hide-on-med-and-down"><a href='#' data-toggle="dropdown" class="dropdown-toggle">
          <img src="{{ asset(Auth::user()->image) }}" class="image-user"></a>
            <ul class="dropdown-menu animated fadeInDown">
              <li class="user-header">
                <img class="circle" src="{{ asset(Auth::user()->image) }}" alt="User Image">
                <p>
                  <b>{{ Auth::user()->username }}</b>
                  <span>{{ Auth::user()->email }}</span>
                </p>
              </li>
              <li class="user-footer">
                <div class="">
                  @if(Auth::user()->hak_akses=="user")
                   <a href="{{route('profile/',Auth::user()->slug)}}" class="btn btn-flat">Profile</a>
                  @else
                   <a href="{{URL('/dashboard')}}" class="btn btn-flat">Dashboard</a>
                  @endif
                </div>
                  <div class="rights">
                 <a href="{{URL('logout')}}" class="btn btn-flat"> keluar</a>
               </div>
              </li>
           </ul>      
        </li>
    </ul>
    @endif

  </div>
</nav>

</div>
