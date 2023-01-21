<ul id="profile-side" class="side-nav">
  <li>
    <div class="userview">
     <img src="{{asset(Auth::user()->cover)}}" class="cover-side">
     <img src="{{asset(Auth::user()->image)}}" class="circle user-side">
       <div class="user-detail">
        <b>{{'@'.Auth::user()->username}}</b>
        <p>{{Auth::user()->email}}</p>
       </div>
    </div>
  </li>
  <li>
    @if(Auth::user()->hak_akses === 'admin')
    <a href="{{url('dashboard')}}">
      <i class="blue-text text-darken-2 mdi mdi-view-dashboard mdi-24px"></i> Dashboard
    </a>
    @else
    <a href="{{route('profile/',Auth::user()->slug)}}">
      <i class="blue-text text-darken-2 mdi mdi-account-circle mdi-24px"></i> Profile
    </a>
    @endif
  </li>
  <li>
    <a href="#">
      <i class="red-text text-darken-1 mdi mdi-heart mdi-24px"></i> Favorites
    </a>
  </li>
  <li>
    <a href="{{url('/events')}}">
      <i class="green-text mdi mdi-account-multiple mdi-24px"></i> Followers
    </a>
  </li>
  <li>
    <a href="{{url('/forums')}}">
     <i class="orange-text mdi mdi-account-edit mdi-24px"></i> Edit Profile
    </a>
  </li>
  <li>
    <a href="{{url('/logout')}}">
     <i class="red-text text-darken-1 mdi mdi-logout mdi-24px"></i> Log out
    </a>
  </li>
</ul>