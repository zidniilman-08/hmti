@extends('template/b_index')

@section('content')
<div class="row">
  <div class="col s12 m12 l12">
      <div id="wrapper">
        <div id="sidebar-wrapper" class="hide-on-small-only">
          <ul class="sidebar-nav">
            <div class="profile">
              <div class="profile-sidebar">
                <div class="profile-usertitle">
                 <div class="profile-usertitle-name">
                  <span>Kategori </span>
                 </div>
               </div>
       <!-- <div class="profile-userbuttons">
          <button type="button" class="btn btn-flat btn-sm red-text text-darken-2">Subcribe</i></button>
          <button type="button" class="btn btn-flat btn-sm blue-text textdarken-2">Message</button>
        </div>-->
        <div class="profile-usermenu">
          <ul class="nav">
            <li class="{{ Request::is('artikels/kategori/anime') ? 'active':''}}">
              <a href="{{url('/artikels')}}/kategori/anime">
              <img src="{{asset('assets/img/home/05.png')}}">
              Anime </a>
            </li>
            <li class="{{ Request::is('artikels/kategori/hiburan') ? 'active':''}}">
              <a href="{{url('/artikels')}}/kategori/hiburan">
              <img src="{{asset('assets/icon/Entertaiment/en-02_128x128.png')}}">
              Hiburan </a>
            </li>
            <li class="{{ Request::is('artikels/kategori/news') ? 'active':''}}">
              <a href="{{url('/artikels')}}/kategori/news">
              <img src="{{asset('assets/icon/News/news-01_128x128.png')}}">
              News </a>
            </li>
            <li>
              <a href="/artikels/anime">
              <img src="{{asset('assets/icon/Tutorial/tutorial-01_128x128.png')}}">
              Teknologi </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <span>Top author</span>
             </div>
        </div>
        <div class="profile-usermenu">
          <ul class="nav top-artikels">
            @forelse($populer as $top)
            <li>
              <a href="#">
                <div class="top-nav">
                  <img src="{{asset($top->image)}}" class="square thumbanail" > {{str_limit($top->username,$limit="10",$end="...")}}
                </div>
              </a>
            </li>
            @empty
            <li>Tidak ada author</li>
            @endforelse
          </ul>
        </div>
        <!-- END MENU -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <span>Top artikels</span>
             </div>
        </div>
        <div class="profile-usermenu">
          <ul class="nav top-artikels">
            @foreach($populer as $top)
            <li>
              <a href="#">
                <div class="top-nav">
                  <img src="{{asset($top->foto_artikel)}}" class="circle thumbanail" > {{str_limit($top->judul_artikel,$limit="10",$end="...")}}
                </div>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
   </ul>
  </div>

        <div id="page-content-wrapper" class="hide-on-med-and-down">
          <ul class="nav-soc" id="toggle-nav">
            <li>
              <a href="#" class="btn-floating white tooltipped" data-position="right" data-delay="50" data-tooltip="Share in"><i class="black-text fa fa-share-alt"></i></a>
            </li>
            <li>
              <a href="#" class="btn-floating red darken-1 tooltipped" data-position="right" data-delay="50" data-tooltip="Google Plus"><i class="white-text mdi mdi-google-plus"></i></a>
            </li>
            <li>
              <a href="#" class="btn-floating blue darken-2 tooltipped" data-position="right" data-delay="50" data-tooltip="Facebook"><i class="white-text mdi mdi-facebook"></i></a>
            </li>
            <li>
              <a href="#" class="btn-floating blue lighten-2 tooltipped" data-position="right" data-delay="50" data-tooltip="Twitter"><i class="white-text mdi mdi-twitter"></i></a>
            </li>
            <li>
              <a href="#" class="btn-floating red darken-1 tooltipped" data-position="right" data-delay="50" data-tooltip="Youtube"><i class="white-text fa fa-youtube"></i></a>
            </li>
            <li>
              <a href="#" class="btn-floating blue darken-3 tooltipped" data-position="right" data-delay="50" data-tooltip="Email"><i class="white-text fa fa-envelope"></i></a>
            </li>
          </ul>
        </div>
         
      
         <ul class="grid effect-2" id="grid" data-masonry='{ "columnWidth": 400, "itemSelector": ".grid-item" }'>
          @if(Auth::user())
          <li class="grid-item grid-header-collection">
            <div class="collection">
              <div class="collection-item avatar">
                <img src="{{asset(Auth::user()->image)}}" alt="" class="circle">
                <div class="chip">
                  {{Auth::user()->username}}
                </div>
                <a href="{{route('createpost/',Auth::user()->slug)}}" class="secondary-content btn-floating tooltipped" data-position="top" data-delay="30" data-tooltip="buat artikel"><i class="material-icons left">dvr</i></a>
            </div>
           </div>
          </li>
          @endif
           @forelse($post as $artikel)
            <li class="grid-item">
              <a href="{{url('/')}}/artikels/{{$artikel->slug}}">
                <div class="user-pic">
                  @foreach ($artikel->users as $user)
                     <img src="{{asset($user->image)}}" class="circle"> 
                     <span>{{$artikel->judul_artikel}}</span>
                  @endforeach
                </div>

                <img src="{{asset($artikel->foto_artikel)}}" class="item-image" alt="Post Thumb">
                <div class="grid-detail">
                  <p><b>{{str_limit(strip_tags($artikel->isi_artikel),$limit="100",$end="...")}}</b></p>
                </div>
                <div class="grid-footer">
                   <div class="chip"><span><i class="mdi mdi-eye"></i> {{$artikel->views_count}}</span></div>  <div class="chip"><span><i class="mdi mdi-comment-outline"></i> {{count($artikel->comments)}}</span></div> <div class="chip"><span><i class="mdi mdi-heart-outline "></i> {{count($artikel->favus)}}</span></div>
                  <div class="chip right"><span>{{$artikel->kategori_artikel}}</span></div>
                </div>
             </a>
           </li>
        @empty
          <div class="empty-post col s12 m9 l9">
            <div class="card blue-grey darken-1">
               <div class="card-content white-text">
                  <span class="card-title">Tidak ada Post</span>
               </div>
             </div>
           </div>
         </div>
       @endforelse
     </ul>
     </div>
   
 </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
   $(window).on("load", function(){
      $("#toggle-nav").sticky({ topSpacing: 90 });
    });


      new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.5,
        maxDuration : 0.7,
        viewportFactor : 0.2
      } );
    </script>
@endpush