@extends('template/b_index')

@section('content')
<div class="row">
	<div class="forums">
			<div class="forums-header">
				<h3 class="center">Forums HMTI 
				@auth
					<p>
						<button class="btn-large hvr-radial-out" id="create-btn">create forum</button>
					</p>
				@else
					<p>
						 <button class="btn-large">login untuk membuat forum.</button>
					</p>
				@endauth
				</h3>
			</div>
		</div>
	<div class="col s12 m12 l12">
		<div class="col s12 m9 l9">
		@if(Auth::user())
	    <div class="panel panel-default forums-panel">
         <div class="panel-heading"><i class="fa fa-home"></i> Buat forums</div>
         <div class="panel-body">
           <div class="forums-posts">
            <form class="col s12 m12 l12" action="{{url('/addforum')}}" method="POST">
            	{{ csrf_field() }}
             <i class="fa fa-times pull-right" id="close"></i>
              <div class="row">
                <div class="input-field">
                  <i class="mdi mdi-application prefix"></i>
                  <input id="judul_topik" type="text" name="judul_topik" class="validate" required>
                  <label for="judul_topik">Judul Topik</label>
                </div>
                <div class="input-field">
                  <i class="mdi mdi-database prefix"></i>
                  <input type="text" id="kategori" name="kategori">
                  <label for="kategori">Kategori/channel</label>
                </div>
                <div class="input-field">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="textarea1" class="materialize-textarea" name="deskripsi"></textarea>
                  <label for="textarea1">Deskripsi</label>
                </div>
                <div class="switch pull-left">
                <label>
                  subcribe forum ?
                  <input type="checkbox" name="subscribe" id="subscribe" value="1">
                  <span class="lever"></span>
                </label>
              </div>
                <button class="btn btn-flat pull-right"> Create</button>
            </div>
             </form>
        		</div>
    		</div>
		</div>
		@endif
		<div class="forums-list">
			@forelse($forums as $forum)
			<div class="forums-content">
				<div class="forums-avatar">
				@foreach($forum->user as $user)
					<img src="{{$user->image}}" class="circle">
			    </div>
			    @auth
				    @if($user->slug === Auth::user()->slug || Auth::user()->hak_akses === "admin")
				    	<span class="right">
							<div class="dropdown">
							  <a class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  	<i class="material-icons">more_vert</i>
							  </a>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
							    <li><a href="#">Edit</a></li>
							    <li><a href="{{ url('/removeforum').'/'.$forum->slug}}">Delete</a></li>
							  </ul>
							</div>
				    	</span>
				    @endif
			    @endauth
			    <span class="right">{{sprintf("%02d",count($forum->forumpost))}}</span>
				<span class="forums-title">	
					<a href="forums/{{$forum->slug}}" class="black-text">{{$forum->judul_forum}}</a>
					<p>Laravel <span class="black-text">< {{$forum->created_at->diffForHumans()}} By: </span>{{$user->username}}</p>
				</span>
				<p>
					{{str_limit($forum->deskripsi,$limit="150",$end="...")}}
				</p>
				@empty
				<div class="empty-forums">
					<p><h4><b>Tisak ada forums</b></h4>
				</div>
				@endforelse
			</div>
			@endforeach
			<br/>
		</div>
		</div>
		<div class="col s12 m3 l3">
			<div class="forums-right-side">
				<span class="header">Topik Channel</span>
				<ul class="channel-list">
					<li>
						<a href="" class="hvr-forward">
							<i class="devicon-bootstrap-plain colored"></i> Bootstrap
						</a>
					</li>
					<li>
						<a href="" class="hvr-forward">
							<i class="devicon-cplusplus-plain colored"></i> C++
						</a>
					</li>
					<li>
						<a href="" class="hvr-forward">
							<i class="devicon-html5-plain colored"></i> Html 5
						</a>
					</li>
					<li>
						<a href="" class="hvr-forward">
							<i class="devicon-laravel-plain-wordmark colored"></i> Laravel
						</a>
					</li>
					<li>
						<a href="" class="hvr-forward">
							<i class="devicon-mysql-plain-wordmark colored"></i> Mysql
						</a>
					</li>
					<li>
						<a href="" class="hvr-forward">
							<i class="devicon-ubuntu-plain colored"></i> Ubuntu
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('.forums-panel').hide();
    $('#create-btn').on('click', function(){
    	$('.forums-panel').show();
    });
    $('#close').on('click', function(){
    	$('.forums-panel').hide();
    })
  });
</script>
@endpush