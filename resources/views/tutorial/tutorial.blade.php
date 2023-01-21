@extends('template/b_index')

@section('content')
<div class="tutorial-header">
    <div class="text-header center"><img src="{{asset('assets/icon/Tutorial/tutorial-01_128x128.png')}}"> {{count($count)}} Tutorials</div>
</div>
<div class="tutorial-page">
	 <div class="row">    
    <div class="col-sm-9 col-md-9 tutorial-item">
       <div class="masonry">
          
       </div>
  </div>
     <div class="col-sm-3 col-md-3 sidebar">
          <div class="sides-nav">
            <ul>
              <li class="roundered">Tutorial <i class="mdi mdi-check-all right"></i></li>
              <li class="roundered"><i class="fa fa-tags"></i> Tags</li>
            </ul>
          </div>
          <div class="tags">
            @foreach($artikel as $tutors)
              @foreach($tutors->tags as $tag)
                <a href="{{url('/')}}/tutorials/tags/{{$tag->tags}}">{{$tag->tags}}</a>
              @endforeach
            @endforeach
          </div>      
      </div>
      <div class="col-lg-9">
        @forelse($artikel as $tutor)
        <div class="masonry">
         <div class="item">
           <img src="{{asset($tutor->foto_artikel)}}">
           <div class="item-header">{{$tutor->judul_artikel}}</div>
         </div>
       </div>
       @empty
       Belum ada tutorial tersediya
       @endforelse
      </div>
   
	</div>
</div>
@endsection
@push('js')
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script type="text/javascript">
	$(function(){

	$('#slide-submenu').on('click',function() {			        
        $(this).closest('.list-group').fadeOut('slide',function(){
        	$('.mini-submenu').fadeIn();	
        });
        
      });

	$('.mini-submenu').on('click',function(){		
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
	});
});


</script>
@endpush