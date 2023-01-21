
<div class="bs-profile">
  <img id="img-cov" align="left" class="bs-image-lg" src="{{asset(Auth::user()->cover)}}" />
  <img id="img-prof" align="left" class="bs-image-profile thumbnail circle" src="{{asset(Auth::user()->image)}}" alt="Profile image example"/>

<div class="row">
  <div class="col s12 m12 l12">
  <nav class="bs-navbar">
    <div class="nav-wrapper">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li class="{{Route::is('profile/',Auth::user()->slug) ? 'active':'' }}"><a href="{{route('profile/',Auth::user()->slug)}}">Post</a></li>
        <li class=""><a href="#">Followers</a></li>
        <li class="{{Route::is('favoritePost/',Auth::user()->slug) ? 'active':''}}"><a href="{{route('favoritePost/',Auth::user()->slug)}}">Favorites</a></li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="create {{Route::is('createpost/',Auth::user()->slug) ? 'active':'' }}"><a href="{{route('createpost/',Auth::user()->slug)}}" class="btn">Create Post</a></li>
        <li><a href="#edit-modal" class="waves-effect waves-light btn modal-trigger white black-text">Edit Profile</a></li>
      </ul>
    </div>
  </nav>
      
      <div id="edit-modal" class="modal modal-fixed-footer">
        <div class="modal-header">
            <div class="title blue-text text-darken-2"><i class="fa fa-edit"></i> Edit Profile</div>
        </div>
             
             <div class="modal-content">
              <form>
               <div class="row">

                <div class="edit-main">
                   <div class="col s12 m6 l6">
                    
                    <img id="result-cov" src="{{asset(Auth::user()->cover)}}" class="img-hover">
                    <div class="cover-upload">
                        <a href="#covModal" class="btn-floating waves-effect waves-light btn modal-trigger"><i class="fa fa-camera"></i></a>
                    </div>
                    
                    <img id="result-prof" class="img-profile thumbnail circle" src="{{asset(Auth::user()->image)}}"/>
                    <div class="image-upload">
                      <a href="#myModal" class="btn-floating waves-effect waves-light btn modal-trigger"><i class="fa fa-camera"></i></a>
                    </div>

                    <div class="edit-main-body">
                      <div class="row">
                        <div class="input-field">
                          <input id="full_name" type="text" name="nama_lengkap" class="validate">
                          <label for="full_name">Nama lengkap</label>
                        </div>
                        <div class="input-field">
                          <input id="username" type="text" name="username" value="{{Auth::user()->username}}" class="validate">
                          <label for="username">Username</label>
                        </div>
                      </div>
                      <a href="#!"><i class="fa fa-gear"></i> Pengaturan akun !</a>
                    </div>

                  </div>
                </div>

                <div class="edit-body">
                  <div class="col s12 m6 l6">
                    <div class="header">
                      <i class="mdi mdi-account-box-outline"></i> Edit detail profile
                      <p>Lengkapi detai profile anda..</p>
                    </div>
                   
                   <div class="body">
                      <div class="input-field">
                         <i class="mdi mdi-account-location prefix"></i>
                         <input id="icon_prefix" type="text" class="validate">
                         <label for="icon_prefix">Alamat</label>
                      </div>
                      <div class="input-field">
                         <i class="fa fa-university prefix"></i>
                         <input id="icon_prefix" type="text" class="validate">
                         <label for="icon_prefix">Pendidikan</label>
                      </div>
                      <div class="input-field">
                         <i class="mdi mdi-google-plus prefix"></i>
                         <input id="icon_prefix" type="text" class="validate">
                         <label for="icon_prefix">Akun google plus</label>
                      </div>
                      <div class="input-field">
                         <i class="fa fa-facebook prefix"></i>
                         <input id="icon_prefix" type="text" class="validate">
                         <label for="icon_prefix">Akun facebook</label>
                      </div>
                      <div class="input-field">
                         <i class="fa fa-twitter prefix"></i>
                         <input id="icon_prefix" type="text" class="validate">
                         <label for="icon_prefix">Akun twitter</label>
                      </div>
                      <div class="input-field">
                        <input id="input_moto" type="text" data-length="100">
                        <label for="input_moto">Motto hidup</label>
                     </div>
                     <div class="input-field">
                       <textarea id="textarea1" class="materialize-textarea" data-length="120"></textarea>
                       <label for="textarea1">Tentang anda</label>
                    </div>

                  </div>
                </div>
              

              </div>
            </div>
          </form>
        </div>


        <div class="modal-footer">
           <a href="#!" class="modal-action waves-effect waves-green btn-flat">Save</a>
           <a href="#!" class="modal-close waves-effect waves-blue btn-flat blue-text text-darken-1"><b>Close</b></a>
        </div>
      </div>
    </div>
    
    <div id="myModal" class="crops-img modal modal-fixed-footer">
       <div class="modal-header">
         <div class="title blue-text text-darken-2"><i class="mdi mdi-account-circle"></i> Ubah foto profile</div>
         <div class="img-upload-modal right">
           <a class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="remove" id="remove-pf"><i class="fa fa-times"></i></a>
          <label for="input-profile" class="label-cam">
           <a class="btn-floating waves-effect waves-blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="unggah profile"><i class="fa fa-camera"></i></a>
          </label>
          <input id="input-profile" type="file"/>
       </div>
      </div>
    <form id="form-profile-img" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="modal-content">
           <img src="#" id="crop">
        </div>    
        <div class="modal-footer">
          <button type="submit" id="upload-profile" class="modal-action modal-close waves-effect waves-green btn-flat">terapkan</button>
          <a href="#!" id="cancel-upload" class="modal-close waves-effect waves-green btn-flat blue-text text-darken-2">batal</a>
       </div>
    </form>
  </div>

   <div id="covModal" class="crops-img modal modal-fixed-footer">
      <div class="modal-header">
        <div class="title blue-text text-darken-2"><i class="fa fa-picture-o"></i> Ubah cover profile</div>
        <div class="img-upload-modal right">
          <a class="btn-floating tooltipped" data-position="bottom" data-delay="50" data-tooltip="remove" id="remove-cv"><i class="fa fa-times"></i></a>
        <label for="input-cover" class="label-cam">
          <a class="btn-floating waves-effect waves-blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="unggah cover"><i class="fa fa-camera"></i></a>
        </label>
        <input id="input-cover" type="file"/>
        </div>
     </div>
    <form id="form-cover-img" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="modal-content">
           <img src="#" id="crop-cover">
           <input type="hidden" id="x" name="x" />
           <input type="hidden" id="y" name="y" />
           <input type="hidden" id="w" name="w" />
           <input type="hidden" id="h" name="h" />
        </div>    
        <div class="modal-footer">
          <button type="submit" id="upload-cover" class="modal-action modal-close waves-effect waves-green btn-flat">terapkan</button>
          <a href="#!" id="cancel-upload" class="modal-close waves-effect waves-green btn-flat blue-text text-darken-2">batal</a>
      </div>
    </form>
  </div>
  

    <div class="col s12 m3">
      <div class="bs-info">
       <div class="panel panel-default">
        @foreach($user->profile as $profile)
         <div class="panel-heading">
           <h5>{{$profile->nama_lengkap}}</h5>
            <p>
             <span>{{Auth::user()->username}}</span>
            </p>
         </div>
      
        <div class="panel-body">
          <ul class="bs-info-list">
            <li><i class="fa fa-envelope-o"></i> {{Auth::user()->email}}</li>
            <li><i class="mdi mdi-map-marker-circle"></i></li>
            <li><i class="fa fa-calendar-o"></i> bergabung pada {{Auth::user()->created_at->format('d M Y')}}</li>
            <li><i class="fa fa-balloon"></i></li>
          </ul>
        </div>
        @endforeach

       </div>
       
       </div>
     </div>
 
@push('js')
<script type="text/javascript">
$(document).ready(function(){
  
  $('.tooltipped').tooltip({delay: 50});
  $('#remove-pf').hide();
  $('#remove-cv').hide();
  $('#edit-modal').modal({
      dismissible: false,
      inDuration: 500,
      outDuration: 500
  });

  $('input#input_moto, textarea#textarea1').characterCounter();

  $('#myModal').modal({
    dismissible: false,
    outDuration: 500
  }).addClass('animated bounceInUp');

  $('#covModal').modal({
    dismissible: false,
    outDuration: 500
  }).addClass('animated bounceInUp');


  $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $uploadCrop = $('#crop').croppie({
      enableExif: true,
      viewport: {
          width: 300,
          height: 300,
          type: 'circle'
      },
      boundary: {
          width: 400,
          height: 400
      }
  });
  
  $('#input-profile').on('change', function (evt) { 
   var selectedImage = evt.currentTarget.files[0];
   var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.bmp)$/;
    if (regex.test(selectedImage.name.toLowerCase())) {
      if(selectedImage.size > 1000141){
         Materialize.toast('Ouppss.. Maaf ukuran file gambar melebihi 1 Mb !', 2000,'rounded')
      }else if (typeof(FileReader) != 'undefined') {
       var reader = new FileReader();
       reader.onload = function (e) {
         $uploadCrop.croppie('bind', {
            url: e.target.result
          }).then(function(){
               console.log('jQuery bind complete');
          });
       }
      reader.readAsDataURL(this.files[0]);
      $('#remove-pf').addClass('animated bounceInRight').show();
      } else {
        alert('browser support issue');
      }
    } else {
      $(this).prop('value', null);
      Materialize.toast('Ouppss.. Maaf format gambar tidak didukung!', 2000,'rounded')
    }
  });

  
  $("#remove-pf").click(function () {
     $('#input-profile').val('');
     $(this).hide('slow');
     $('#crop').hide('slow');
     $('#crop').attr('src','');
  });

  $('#upload-profile').on('click', function (ev) {
    ev.preventDefault();
    ev.stopPropagation();
     $uploadCrop.croppie('result', {
         type: 'canvas',
         size: 'viewport'
     }).then(function (resp) {
        $.ajax({
          url: "{{url('/image-crop')}}",
          type: "POST",
          data: {"image":resp},
          dataType: 'json',
          success: function(data) {
            $("#result-prof").attr('src', data).addClass('animated bounceIn');
            $('#img-prof').attr('src', data);
            Materialize.toast('Yahoo.. Foto profile berhasil di ubah !', 2000,'rounded')
          }
        });
     });
  });


  $coverCrop = $('#crop-cover').croppie({
      enableExif: true,
      viewport: {
          width: 400,
          height: 130
      },
      boundary: {
          width: 400,
          height: 400
      },
      showZoomer: false,
      enableResize: true
  });

$('#input-cover').on('change', function (evt) { 
  if (typeof(FileReader) != 'undefined') {
       var reader = new FileReader();
       reader.onload = function (e) {
         $coverCrop.croppie('bind', {
            url: e.target.result
          }).then(function(){
               console.log('jQuery bind complete');
          });
       }
      reader.readAsDataURL(this.files[0]);
      $('#remove-cv').addClass('animated bounceInRight').show();
      }
  });

  
  $("#remove-cv").click(function () {
     $('#input-cover').val('');
     $(this).hide('slow');
     $('#crop-cover').hide('slow');
     $('#crop-cover').attr('src','');
  });
  
  $('#upload-cover').on('click', function (ev, resp) {
    ev.preventDefault();
    ev.stopPropagation();
    $coverCrop.croppie('result', {
         type: 'canvas',
         size: [1330,320],
         quality: 1
     }).then(function (resp) {
        $.ajax({
          url: "{{url('/cover-crop')}}",
          type: "POST",
          data: {"cover":resp},
          dataType: 'json',
          success: function(data) {
            $("#result-cov").attr('src', data).addClass('animated bounceIn');
            $('#img-cov').attr('src', data);
            Materialize.toast('Yahoo.. Foto cover berhasil di ubah !', 2000,'rounded')
          }
     });
   });
 });

  function coordeRa(c){
     $('#x').val(c.x);
     $('#y').val(c.y);
     $('#w').val(c.w);
     $('#h').val(c.h);
  }

  function checkCoords(){
     if(parseInt($('#w').val())) return true;
        alert('select image crop');
    return false;
  }
});
</script>
@endpush