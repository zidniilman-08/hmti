@extends('template/b_index')

@section('content')
 <div class="event">
    <div class="event-header">
       <h3 class="white-text center">
         <img src="{{asset('assets/icon/Entertaiment/en-01_128x128.png')}}"> Events HMTI 
      </h3>   
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
    		<div class="col s12 m3 l3">
    			<div class="card white" id="card-event">
    				<div class="card-content">
    					<div id="events"></div>
    				</div>
    			</div>
    		</div>
    		<div class="col s12 m9 l9">
                @forelse($events as $fc)
                    @if($fc->tanggal == date('Y-m-d'))
                     <div class="card blue darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">
                                {{$fc->name}} Tanggal : {{date('D M Y', strtotime($fc->tanggal))}}
                            </span>
                        </div>
                    </div>
                      <img src="{{asset($fc->img_event)}}" class="event-poster img-responsive">
                    @else
                      <div class="card white">
                          <div class="card-content">
                              <img src="{{asset('assets/img/hmti/EVENT.png')}}" class="event-poster img-responsive">
                          </div>
                      </div>
                    @endif
                    @empty
                        <img src="{{asset('assets/img/hmti/EVENT.png')}}" class="event-empty">
                @endforelse
    		</div>
    	</div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#events').fullCalendar({
            header: {
                left: 'title',
                right: 'prev,next'
            },
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->tanggal }}',
                    end: '{{ $task->tanggal_akhir }}'
                },
                @endforeach
            ]
        });
    });
</script>
@endpush