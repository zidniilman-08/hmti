@extends('template/b_index')

@section('content')
<div class="post"> 
  <div class="row">
    <div class="col s12 m12 l12">
      <div class="bg-cover">
        <div class="col s12 m5 l5">
         <div class="item-head">
           <img src="{{asset($post->foto_artikel)}}" class="img-responsive">
         </div>
       </div>
       <div class="col s12 m7 l7">
        <div class="title-header">
          <h3>
            <p>{{$post->judul_artikel}}</span></p> 
            <div class="info"><span><i class="mdi mdi-calendar"></i> {{$post->created_at->format('D M Y')}} || <i class="fa fa-eye"></i> {{$post->views_count}}
            || Kategori : <a href="#" class="kategori-post">{{ $post->kategori_artikel }}</a> 
            Tags : @foreach($post->tags as $tag)<a href="#" class="chip">{{$tag->tags}}</a> @endforeach</span> 
          </div>
        </a>
      </span>
    </h3>
  </div>
</div>
</div>

 @include('template/social-share')  

<div class="body-post">
   <div class="z-depht-3 conten-bokura">
      <div class="col s12 m8 s8">
        <div class="artikels">
         <br/>
            <article class="isi-artikel">
	            <p>{!! $post->isi_artikel !!}</p>
              <hr/>
              @if (Auth::user())
            <favorite
               :artikel={{ $post->id }}
               :favorited={{ $post->favorited() ? 'true' : 'false' }}
            ></favorite>
             @endif
             <span class="chip"> {{count($post->favus)}} favorited</span>
              
              <span class="right">
              <a href="#" class="btn btn-floating blue darken-2"><i class="mdi mdi-facebook"></i></a>
              <a href="#" class="btn btn-floating red darken-2"><i class="mdi mdi-google-plus"></i></a>
              <a href="#" class="btn btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
            </span>
              <br/>
              <br/>
            </article>
          </div>
  
          <div class="detailBox">
            <div class="titleBox">
              <label><i class="mdi mdi-comment-outline"></i> Comment Box</label>
              <button type="button" class="close" aria-hidden="true">&times;</button>
            </div>
            <div class="commentBox">

              <p class="taskDescription">Silahkan membuat komentar yang baik dan sopan.</p>
            </div>
            <div class="actionBox">
              <ul class="commentList">
                @foreach($post->comments as $comment)
                <li>
                  @foreach($comment->user as $user)
                  <div class="commenterImage">
                    <img src="{{asset($user->image)}}" />
                  </div>
                  <div class="commentText">
                    <p class="">{{$comment->comments}}</p>
                    <span class="date sub-text">{{$user->username .' - '.$comment->timestamp->diffForHumans()}}</span>
                  </div>
                  @endforeach
                </li>
                @endforeach
              </ul>
              @if(Auth::user())
              <form class="form-inline" role="form" action="{{route('/commentpost',$post->slug)}}" method="POST">
                <div class="form-group">
                  {{ csrf_field() }}
                  <div class="input-field user-img">
                    <img src="{{asset(Auth::user()->image)}}" class="circle prefix" style="width: 40px;">
                    <textarea id="textarea1" class="materialize-textarea" name="comments"></textarea>
                    <label for="textarea1">Add comments</label>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-floating blue darken-1"><i class="mdi mdi-send"></i></button>
                </div>
              </form>
              @else
              <div class="alert alert-info" role="alert">Anda harus login untuk membuat komentar.</div>
              @endif
            </div>
          </div>
        </div>
        <!--akhir-col-->

        <div class="col s12 m3 l3">
            <div class="side side-card">
               <div class="card">
                @foreach($post->users as $user)
                   <div class="card-content">
                  @foreach($user->profile as $pro)
                     <div class="card-title">
                        <span>{{$pro->nama_lengkap}} (<u>{{$user->username}}</u>)</span>
                        <div class="user-photo">
                           <img src="{{asset($user->image)}}">
                        </div> 
                     </div>
                     <div class="card-content">
                        <p><i>"{{$pro->motto}}"</i></p>
                     </div>
                     <div class="card-footer center">
                       <a href="{{$pro->facebook}}" class="btn btn-flat"><i class="blue-text text-darken-2 fa fa-facebook"></i></a>
                       <a href="#" class="btn btn-flat"><i class="red-text text-darken-1 fa fa-google-plus"></i></a>
                       <a href="#" class="btn btn-flat"><i class="blue-text text-lighten-2 fa fa-twitter"></i></a>
                     </div>
                  @endforeach
                  </div>
                @endforeach
                </div>
              </div>
            </br>
             <div class="side-card" id="side">
               <div class="z-depth-2 card">
                 <ul class="nav nav-tabs" id="Tabs">
                   <li class="active"><a href="#terdahulu">Artikel Terdahulu</a></li>
                   <li><a href="#rec">Recomendasi Artikel</a></li>
                 </ul>
                 <div class="tab-content">
                  <div class="tab-pane active" id="terdahulu">
                   <div class="card-content">
                    @foreach($artikels as $artikel)
                     <p class="list">
                        <a href="{{$artikel->slug}}">
                          <img src="{{asset($artikel->foto_artikel)}}" class="square" width="90">  
                          <span>{{ str_limit($artikel->judul_artikel, $limit="25", $end="..")}}</span>
                          <div class="detail">
                            <span>
                              <i class="mdi mdi-calendar"></i> {{$artikel->created_at->format('D M Y') }}
                            </span>
                            </div>
                         </a>
                    </p>
                    <br/>
                    @endforeach
                  </div>
                </div>
                <div class="tab-pane" id="rec">
                   <div class="card-content">
                  </div>
                </div>
              </div>
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
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
  }
$(window).on("load", function(){
      $("#share").sticky({ topSpacing: 30 });
    });

$(function(){
   $('.tooltipped').tooltip({delay: 50});
   
  $("#Tabs a[href='#terdahulu']").on('click', function(){
    $("#Tabs a[href='#terdahulu']").tab('show');
  });
  $("#Tabs a[href='#rec']").on('click', function(){
    $("#Tabs a[href='#rec']").tab('show');
  });
});
</script>
@endpush