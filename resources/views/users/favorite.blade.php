@extends('template/b_index')

@section('content')

@include('users.main')
     <div class="col s12 m9">
        <div class="bs-body"></div>

          <div class="panel panel-primary">
            <div class="panel-heading"><h6><i class="mdi mdi-menu"></i> Favorite artikel</h6></div>
             <div class="panel-body">
               @forelse ($favorites as $favorite)
               <div class="col s12 m3 l3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $favorite->judul_artikel }}
                    </div>

                    <div class="panel-body">
                        {{ str_limit(strip_tags($favorite->isi_artikel),$limit="100",$end="..") }}
                    </div>
                    <div class="panel-footer">
                        <favorite
                          :artikel={{ $favorite->id }}
                          :favorited={{ $favorite->favorited() ? 'true' : 'false' }}
                        ></favorite> favorited
                    </div>
                </div>
              </div>
            @empty
                <p>You have no favorite posts.</p>
            @endforelse
             </div>
           </div>
         </div>

         </div>
@endsection