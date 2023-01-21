@extends('template/b_index')

@section('content')

@include('users.main')
     <div class="col s12 m9">
        <div class="bs-body"></div>
           @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li><i class="fa fa-warning"></i> {{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="panel panel-primary">
            <div class="panel-heading"><h6><i class="mdi mdi-menu"></i> Buat Post</h6></div>
             <div class="panel-body">
               <form class="bs-form" enctype="multipart/form-data" action="{{ route('createuspost/',Auth::user()->slug) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">
               	 <tr>
               	  <td>
                    <div class="input-field col s6">
                      <i class="mdi mdi-pencil-box-outline prefix"></i>
                      <input id="icon_prefix" type="text" name="judul_artikel" class="validate">
                      <label for="icon_prefix">Judul post</label>
                    </div>
        		 </td>
        		 <td>
        		  <div class="input-field col s6">
        		  	<i class="mdi mdi-database prefix"></i>
                     <select name="kategori_artikel">
                       <option value="" disable selected>pilih kategori</option>
                       <option value="anime">Anime</option>
                       <option value="News">News</option>
                       <option value="Tutorial">Tutorial</option>
                     </select>
                     <label>Kategori Post</label>  
          		  </div>
          		 </td>
               </tr>
               
          		  <tr>
          		  	<td>
          		  	  <div class="file-field input-field col s12">   
                      <div class="btn blue darken-1 right">
                         <span>File</span>
                         <input type="file" name="foto_artikel">
                      </div>
                      <div class="file-path-wrapper">
                        <i class="mdi mdi-image-area prefix"></i>
                          <input class="file-path validate" type="text" placeholder="Uploads image">
                      </div>
                    </div>
          		  	</td>
          		  </tr>
          		  
          		  <tr>
          		  	<td>
          		  		<div class="input-field col s12">
          		  			<div id="preview"></div>
          		  		</div>
          		  	</td>
          		  </tr>

          		  <tr>
          		  	<td>
          		  	  <div class="input-field col s12">
          				   <textarea id="isi_artikel" name="isi_artikel" class="materialize-textarea"><h2>Isi post..</h2></textarea>
                    </div>
          		  	</td>
          		  </tr>

          		  <tr>
          		  	<td>
          		  	  <div class="input-field col s12">
          		  	  	<i class="fa fa-tags prefix"></i>
          				    <input type="text" name="tags[]" class="chips chips-autocomplete">
                    </div>
          		  	</td>
          		  </tr>

          		  <tr>
          		  	<td>
          		  		<button class="button blue darken-2 right"><i class="fa fa-save"></i>  create</button>
          		  	</td>
          		  </tr>

          		  
               </form>
             </div>
          </div>
          
           

       </div>
     </div>

@endsection
@push('js')
 <script type="text/javascript">
 	$(document).ready(function() {

 	CKEDITOR.replace('isi_artikel');
    
  $('.chips').material_chip();
 	$('.chips-autocomplete').material_chip({
    secondaryPlaceholder: 'Masukan tags post',
    autocompleteOptions: {
      data: {
        'Apple': null,
        'Microsoft': null,
        'Google': null
      },
      limit: Infinity,
      minLength: 1
    }
  });
        

    $('select').material_select();

    $('.button').mousedown(function (e) {
    var target = e.target;
    var rect = target.getBoundingClientRect();
    var ripple = target.querySelector('.ripple');
    $(ripple).remove();
    ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.height = ripple.style.width = Math.max(rect.width, rect.height) + 'px';
    target.appendChild(ripple);
    var top = e.pageY - rect.top - ripple.offsetHeight / 2 -  document.body.scrollTop;
    var left = e.pageX - rect.left - ripple.offsetWidth / 2 - document.body.scrollLeft;
    ripple.style.top = top + 'px';
    ripple.style.left = left + 'px';
    return false;
    });


});
 </script>
 @endpush