@extends('template/b_index')

@section('content')
<div class="row">
	<div class="forums-show-head">
		<h3 class="white-text center">{{$forums->judul_forum}}</h3>		
	</div>
	<div class="col s12 m12 l12">
		<div class="col s12 m9 l9">
			<div class="forums-show">
				@foreach($forums->user as $user)
				<div class="avatar hide-on-small-only">
					<img src="{{asset($user->image)}}" class="circle left">
				</div>
				<div class="content">
					<div class="title">
						{{$forums->judul_forum}}
						<p>Laravel <span class="black-text">< {{$forums->created_at->diffForHumans()}} By: </span>{{$user->username}}</p>
					</div>
					<div class="body">
						{{$forums->deskripsi}}
					</div>
				</div>
				@endforeach
			</div>
			<div class="answer">
				@forelse($forums->forumpost as $answer)
				 @foreach($answer->user as $user)
					<div class="answer-avatar">
						<img src="{{asset($user->image)}}">
					</div>
					<div class="answer-content">
						<div class="title">
							{{$user->username}} <span class="red-text">< {{$answer->created_at->diffForHumans()}}</span>
						</div>
						<div class="body">
							{!! $answer->isi_post !!}
							<br/>
						</div>
					</div>
				@endforeach
			   @empty
				 <div class="alert alert-info" role="alert">
				  <h5 class="alert-heading">WHooppss..!</h5>
				  <p>Belum ada jawaban untuk topik ini !</p>
				</div>
			   @endforelse
			</div>
			<div class="forums-post">
				<div class="header">Your answer ?</div>
					<div class="card">
					  <form class="form" action="{{route('/forums-post',encrypt($forums->id))}}" method="POST">
					  	{{ csrf_field() }}
			            <div class="card-content">
			               	<div class="input-field">
					          	<textarea name="isi_post" class="materialize-textarea" require></textarea>
					        </div>
			            </div>
			            <div class="card-action">
			              	<button class="btn-flat">Post</button>
			              	<a href="{{url('/forums')}}">Cancle</a>
			            </div>
			          </form>
                </div>
			</div>
		</div>
		<div class="col s12 m3 l3">
			<div class="card">
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
            <div class="card">
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
</div>

@endsection
@push('js')
<script type="text/javascript">
	tinymce.init({ 
		selector:'textarea',
		height : "280"
	 });
</script>
@endpush