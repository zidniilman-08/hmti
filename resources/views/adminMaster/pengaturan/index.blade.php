@extends('layouts.app')


@section('content')
<style type="text/css">
.edits {
  margin: -34px 2.7em;
  float: right;
}

</style>
<div class="content-wrapper">

    <section class="content-header">
      <h1>
       <i class="fa fa-user"></i> Admin Profile {{ Auth::user()->username }}</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>
 
    <!-- Main content -->
    <section class="content-header">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-danger">
            <div class="box-body box-profile">
              <div class="row margin-bottom-40">
                <div class="col-md-12">
                 <div id="cropContainerEyecandy"><img class="img-responsive img-circle" src="{{ asset(Auth::user()->image) }}" alt="User profile picture"></div>
                 {{ Form::open(['url' => '/saveimage', 'files' => 'true', 'id' => 'forms', 'enctype' => 'multipart/form-data']) }}
                    <input type="hidden" name="img_bckp" value="{{$data['images']}}"/>
                 <br/>
                <tr>
                 <td>
                     {{Form::file('images', ['class' => 'uploads', 'id' => 'files'])}}
                 </td>
               </tr>
                 {{ Form::close() }}
               </div>
              </div>
              <br/>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="padding-left:10px">
                </li>
              </ul>
            </div>
          </div>
        </div>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="img-crop">
            {{ Form::open(['url' => '/savecrops', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return checkCoords()']) }}
               <button class="btn btn-default" id="scalebutton" type="button">Scale</button>
               <button class="btn btn-default" id="rotatebutton" type="button">Rotate</button>
               <button class="btn btn-default" id="hflipbutton" type="button">H-flip</button>
               <button class="btn btn-default" id="vflipbutton" type="button">V-flip</button>
            
            <br/>
                <img class="jcrop-tracker" src="{{Auth::user()->image}}" id="crop">
               <input type="hidden" id="x" name="x" />
               <input type="hidden" id="y" name="y" />
               <input type="hidden" id="w" name="w" />
               <input type="hidden" id="h" name="h" />
          </div>    
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Crop Image</button>
          {{Form::close()}}
      </div>
    </div>
  </div>
</div>


        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#account" data-toggle="tab"><i class="fa fa-user"></i> Account</a></li>
              <li><a href="#menu" data-toggle="tab"><i class="fa fa-gear"></i> Layout</a></li>
              <li><a href="#profile" data-toggle="tab"><i class="fa fa-users"></i> Profile</a></li>
              <li><a href="#settings" data-toggle="tab"><i class="fa fa-gears"></i> Settings</a></li>
              <li class="pull-right"><a href="#create" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Admin</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="account">
          <div>
           
            <div class="box-body">
              <form class="form-horizontal" action="{{ url('/updateuser') }}" method="POST">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="usernameame" value="{{Auth::user()->username}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="New Password"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Confirm</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Confirm Password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default pull-right" style="color:#3c8dbc;"><i class="fa fa-save"></i> SAVE</button>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
        
        </div>

      

              <!-- /.tab-pane -->
              <div class="tab-pane" id="menu">
                {!! Form::open(['url' =>  '/ubah_menu', 'class' => 'form-horizontal']) !!}
                 {!! Form::hidden('id',Auth::user()->id, ['class' => 'Form-control']) !!}
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label"> Layout Menu</label>
                    <div class="col-sm-10">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" value="{{Auth::user()->menu}}" disabled>
                      </div> 
                      <div class="col-sm-9">
                       <select class="form-control" name="menu">
                        <option value="fixed sidebar-collapse">collapsed-sidebar</option>
                        <option value="fixed">fixed</option>
                        <option value="">default</option>
                      <select>
                      </div>
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Thema Menu</label>
                    <div class="col-sm-10">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" value="{{Auth::user()->skin}}" disabled>
                      </div> 
                      <div class="col-sm-9">
                      <select class="form-control" name="theme">
                        <option value="skin-blue">skin-blue</option>
                        <option value="skin-blue-light">skin-blue-light</option>
                        <option value="skin-green">skin-green</option>  
                        <option value="skin-red">skin-red</option>
                        <option value="skin-red-light">skin-red-light</option>
                        <option value="skin-purple">skin-purple</option>
                        <option value="skin-purple-light">skin-purple-light</option>
                      <select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default pull-right" style="color:#3c8dbc;"><i class="fa fa-save"></i> SAVE</button>
                    </div>
                  </div>
               {!! Form::close() !!}
              </div>
              <!-- /.tab-pane -->

               <div class="tab-pane" id="profile">
                <form class="form-horizontal" action="{{ url('/updateprofile') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group @if ($errors->has('nama_lengkap')) has-error @endif">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="nama_lengkap" class="form-control" value="{{$prof->nama_lengkap}}" placeholder="Full Name" required>
                      @if ($errors->has('nama_lengkap'))<span class="label label-danger">{{ $errors->first('nama_lengkap') }}</span> @endif
                    </div>
                  </div>
                  <div class="form-group @if ($errors->has('pendidikan')) has-error @endif">
                    <label for="inputEmail" class="col-sm-2 control-label">Pendidikan</label>

                    <div class="col-sm-10">
                      <input type="text" name="pendidikan" class="form-control" value="{{$prof->pendidikan}}" placeholder="Pendidikan" required>
                      @if ($errors->has('pendidikan'))<span class="label label-danger">{{ $errors->first('pendidikan') }}</span> @endif
                    </div>
                  </div>
                  <div class="form-group @if ($errors->has('motto')) has-error @endif">
                    <label for="inputName" class="col-sm-2 control-label">Motto</label>

                    <div class="col-sm-10">
                      <input type="text" name="motto" class="form-control" value="{{$prof->motto}}" placeholder="Motto" required>
                      @if ($errors->has('motto'))<span class="label label-danger">{{ $errors->first('motto') }}</span> @endif
                    </div>
                  </div>
                  <div class="form-group @if($errors->has('tentang')) has-error @endif">
                    <label for="inputExperience" class="col-sm-2 control-label">Tentang saya</label>

                    <div class="col-sm-10">
                      <textarea name="tentang" class="form-control" placeholder="Isi penjelasan tentang anda" required> {{$prof->tentang}}</textarea>
                      @if ($errors->has('tentang'))<span class="label label-danger">{{ $errors->first('tentang') }}</span> @endif
                    </div>
                  </div>
                  <div class="form-group @if ($errors->has('google')) has-error @endif">
                    <label for="inputSkills" class="col-sm-2 control-label">Google</label>

                    <div class="col-sm-10">
                      <input type="text" name="google" class="form-control" value="{{$prof->google}}" placeholder="Alamat akun google" required>
                      @if ($errors->has('google'))<span class="label label-danger">{{ $errors->first('google') }}</span> @endif
                    </div>
                  </div>
                   <div class="form-group @if($errors->has('facebook')) has-error @endif">
                    <label for="inputSkills" class="col-sm-2 control-label">Facebook</label>

                    <div class="col-sm-10">
                      <input type="text" name="facebook" class="form-control" value="{{$prof->facebook}}" placeholder="Alamat akun facebook" required>
                      @if ($errors->has('facebook'))<span class="label label-danger">{{ $errors->first('facebook') }}</span> @endif
                    </div>
                  </div>
                   <div class="form-group @if($errors->has('twitter')) has-error @endif">
                    <label for="inputSkills" class="col-sm-2 control-label">Twitter</label>

                    <div class="col-sm-10">
                      <input type="text" name="twitter" class="form-control" value="{{$prof->twitter}}" placeholder="Alamat akun twitter" required>
                      @if ($errors->has('twitter'))<span class="label label-danger">{{ $errors->first('twitter') }}</span> @endif
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default pull-right" style="color:#3c8dbc;"><i class="fa fa-save"></i> SAVE</button>
                    </div>
                  </div>
                </form>
              </div>



              <div class="tab-pane" id="create">
                <form class="form-horizontal" id="upload" enctype="multipart/form-data" action="{{ URL('/tambahadmin') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="input-group @if ($errors->has('email')) has-error @endif">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                 <input type="email" class="form-control" name="email" value="{{Input::old('email')}}" placeholder="Email" required autofocus>
                            @if ($errors->has('email'))<span class="label label-danger">{{ $errors->first('email') }}</span> @endif
                            </div>
                          </br>
                  <div class="input-group @if ($errors->has('username')) has-error @endif">
                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                 <input type="text" class="form-control" name="username"  value="{{Input::old('username')}}" placeholder="Username" required autofocus>
                           @if ($errors->has('username'))<span class="label label-danger">{{ $errors->first('username') }}</span> @endif
                            </div>
                          </br>
                   <div class="input-group @if ($errors->has('password')) has-error @endif">
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                 <input type="password" class="form-control" name="password" value="{{Input::old('password')}}" placeholder="Password" required autofocus>
                             @if ($errors->has('password'))<span class="label label-danger">{{ $errors->first('password') }}</span> @endif
                            </div>
                          </br>
                    <div class="input-group @if ($errors->has('password_confirm')) has-error @endif">
                              <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                                 <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password" required autofocus>
                             @if ($errors->has('password_confirm'))<span class="label label-danger">{{ $errors->first('password_confirm') }}</span> @endif
                            </div>
                        
                </br>
                  <div class="input-group @if ($errors->has('hak_akses')) has-error @endif">
                    <span class="input-group-addon"><i class="fa fa-gears"></i></span>
                      <select class="form-control" name='hak_akses' value="{{Input::old('hak_akses')}}">
                    <option value="" select>Pilih Hak Akses</option>
                    <option value="adminMaster">adminMaster</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                     </select>
                     @if ($errors->has('hak_akses'))<span class="label label-danger">{{ $errors->first('hak_akses') }}</span> @endif
                  </div>
                  <br/>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary pull-right">Buat</button>
                       <button type="reset" class="btn btn-warning pull-right" id="hapus">Remove</button>
                    </div>
                  </div>
                </form>
                <div class="span5">
                        <div id="output" style="display:none"></div>
                      </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
             
             {{ csrf_field() }}
                {!! Form::open(['url' => '/ubah_ket', 'id' => 'form', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('id',$aboute->id_ket,['class' => 'form-control']) !!}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Judul</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="judul_ket" placeholder="Judul Keterangan" value="{{ $aboute->judul_ket }}">
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Aboute Hmti</label>
                    <div class="col-sm-10">
                      <textarea name="isi_ket" class="form-control"  placeholder="Aboute Hmti">{{ $aboute->isi_ket }}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                     <input type="file" id="foto" multiple="multiple" name="foto_ket">
                  </div>
                  </div>
                  <div class="form-group">  
                      <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default pull-right" style="color:#3c8dbc;"><i class="fa fa-save"></i> SAVE</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
</div>
</div>
<input type="hidden" id="modal" value="{{$data['modal']}}"/>
@endsection
@push('script')
<script>
CKEDITOR.replace('isi_ket');

    var modal;

    if($('#modal').val() == 'true'){
      modal = true;
    }else{
      modal = false;
    }
    $(document).ready(function(){
        $('#crop').Jcrop({
          aspectRatio: 1,
          onSelect: coordeRa,
          boxWidth: 550
        });

        $('#myModal').modal({show: modal});

        $(".uploads").filestyle({
          input: false,
          buttonText: "Ubah Foto.",
          buttonName: "btn-primary",
          iconName: "fa fa-camera",
          badge: false
        });

        $('#files').on('change', function(){
          $('#forms').submit();
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
</script>
@endpush