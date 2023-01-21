@extends('template/b_index')

@section('content')

     @include('users.main')

     <div class="col s12 m9">
       <div class="bs-body"></div>

       <div class="panel panel-primary">
        <div class="panel-heading"><h6><i class="mdi mdi-menu"></i> Semua Post</h6></div>
        <div class="panel-body">
          <div class="row">
           <div class="col s12 m12 l12">
            @foreach($user->artikels as $artikel)
              <div class="col s12 m3 l3 user-post">
                <div class="card">
                 <div class="fill">
                   <img src="{{asset($artikel->foto_artikel)}}">
                 </div>
               </div>
               <div class="card-footer">
                <span class="footer-title">
                 {{str_limit($artikel->judul_artikel,$limit="20",$end="...")}}
               </span>
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
</div>

@endsection
