@extends('template/b_index')

@section('content')
<div class="panel-bokura">
<section>
  <div class="flexslider">
    <ul class="slides">
      @foreach($artikel as $data)
         <li class="item">
           <a href="artikels/{{$data->slug}}"><img src="{{ asset($data->foto_artikel) }}" class="img-responsive">
            <div class="description">
              <div class="headers">{{$data->judul_artikel}}</div>
              <p></p>
            </div>
           </a>
         </li>
      @endforeach
    </ul>
  </div>
</section>  

 <div class="containers">
   <nav class="transparants">
     <div class="nav-wrapper">
      <div class="brand-logo"><img class="logos" src="{{ asset('assets/icon/svg/news.svg') }}"><b class="blue-text text-darken-1">Current</b> <span class="red-text text-darken-2">Article</span></div>
        <ul class="right hide-on-med-and-down">
           <li class="{{Request::is('/') ? 'active':''}}"><a href="{{URL::to('/')}}"><img class="icons left" src="{{asset('assets/img/home/02.png')}}">New</a></li>
           <li class="{{Request::is('artikels') ? 'active':''}}"><a href="{{URL::to('/artikels')}}" ><img class="icons left" src="{{asset('assets/img/home/01.png')}}">Anime</i></a></li>
           <li><a href="#!"><img class="icons left" src="{{asset('assets/img/home/04.png')}}">Game</a></li>
           <li><a href="#!"><img class="icons left" src="{{asset('assets/img/home/07.png')}}">Hiburan</a></li>
           <li><a href="#!"><img class="icons left" src="{{asset('assets/img/home/08.png')}}">Tutorial</a></li>
        </ul>
     </div>
   </nav>

       <hr>
        <div class="row">
         <div class="col s12 m12 l12">
          @foreach($datas as $artikel)
           <article>
            <div class="col s12 m3 l3">
             <div class="bokura-layouts-ev-gird">
              <div class="bokura-sei-ev-gird1">
               <img clas=="img-gird" src="{{$artikel->foto_artikel}}" alt=""/>
                 <div class="bokura-sei-ev-gird1-post">
                    <p><i class="fa fa-calendar"></i> {{$artikel->created_at->format('M d,Y')}}</p>
                 </div>
                 <div class="sei-ev-gird1-post">
                  <ul>
                   <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{$artikel->views_count}}</a></li>
                   <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
                   <li><a href="#"><i class="fa fa-share" aria-hidden="true"></i></a></li>
                  </ul>
                 </div>
                </div>
               <div class="sheisun-bokura-layouts-ev-gird1">
                  <div class="sheishun-bokura-posted-by">
                    @foreach($artikel->users as $user)
                    <img src="{{asset($user->image)}}" class="circle">
                    @endforeach
                  </div>
                  <h6><a href="artikels/{{$artikel->slug}}">{{ str_limit($artikel->judul_artikel, $limit="25", $end='..')}}</a></h6>
                  <div class="kategori">
                    <p>{{$artikel->kategori_artikel}}</p>
                  </div>
             </div>
            </div>
           </p>
          </div>
         </article>
         @endforeach
       </div>
      </div>
   </div>
    <br/>

  <div class="containers">
     <div class="posted-more">
       <div class="row">
        <div class="col s12 m12 l12">
         <ul class="nav nav-tabs" role="tablist" id="myTab">
           <li role="presentation" class="active"><a href="#latest" aria-controls="latest" role="tab" data-toggle="tab">Artikel Terdahulu</a></li>
           <li role="presentation"><a href="#recomend" aria-controls="recomend" role="tab" data-toggle="tab">Artikel Recomendasi</a></li>
         </ul>
       <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="latest">
          <div class="row">
          @foreach($artikels as $pic)
            <div class="col s12 l3 m3">
              <div class="animated bounceIn recomend-card">
                <a href="artikels/{{$pic->slug}}">
                <div class="card white">
                  <img src="{{asset($pic->foto_artikel)}}">
                  <div class="card-content">
                    <div class="card-title">
                    </div>
                  </div>
                  <div class="card-action">
                     <span>{{$pic->judul_artikel}}</span>
                     <br/>
                     <br/>
                     @foreach($pic->users as $user)
                     <img src="{{asset($user->image)}}"> : <small>{{$user->username}}</small>@endforeach
                     <small class="right">
                      <i class="mdi mdi-eye"></i> {{$pic->views_count}}
                      <i class="mdi mdi-comment-outline"></i> 0
                    </small>
                  </div>
                </div>
              </a>
              </div>
            </div>
              @endforeach
          </div>
         </div>

        <div role="tabpanel" class="tab-pane" id="recomend">
          <div class="row">
          @foreach($recomends as $pic)
            <div class="col s12 l3 m3">
              <div class="animated zoomIn recomend-card">
                <a href="artikels/{{$pic->slug}}">
                <div class="card white">
                  <img src="{{asset($pic->foto_artikel)}}">
                  <div class="card-content">
                    <div class="card-title">
                    </div>
                  </div>
                  <div class="card-action">
                     <span>{{$pic->judul_artikel}}</span>
                     <br/>
                     <br/>
                     @foreach($pic->users as $user)
                     <img src="{{asset($user->image)}}"> : <small>{{$user->username}}</small>@endforeach
                     <small class="right">
                      <i class="mdi mdi-eye"></i> {{$pic->views_count}}
                      <i class="mdi mdi-comment-outline"></i> 0
                    </small>
                  </div>
                </div>
              </a>
              </div>
            </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


@endsection
@push('js')
<script type="text/javascript">
  $("containers").lazyload({
      effect : "fadeIn"
  });
</script>
@endpush