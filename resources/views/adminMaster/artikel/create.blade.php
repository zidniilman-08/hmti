@extends('layouts.app')

@section('content')
<style type="text/css">
.preview {
  padding: 25px;
}

.img-preview {
  padding: 5px;
  height auto;
  width: 200px;
}

.img-preview img {
  max-width: 900px;
  margin: 6px 130px 6px;
  border: 8px #ddd solid;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-save"></i> Tambah Artikel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Artikel</a></li>
        <li class="active"> Tambah Artikel</li>
      </ol>
    </section>
    <section class="content-header">
     <div class="box success">
            <div class="box-body">
              <a class="btn btn-app" tooltip="Tooltip, you can change the position." href="{{ URL('artikel') }}">
                <i class="fa fa-desktop"></i> Tampil
              </a>
              <a href="{{ URL('artikel/create') }}" class="btn btn-app active">
                <i class="fa fa-plus"></i> Create
              </a>
              <a class="btn btn-app dell_all disabled">
                <i class="fa fa-trash "></i> Hapus pilihan
              </a>
              <a class="btn btn-app">
                <i class="fa fa-print"></i> Export data
              </a>
            </div>
          </div>
    </section>
   <section class="content">
      <div class="row">
        <div class="col-lg-12">
         <div class="box box-danger">
          <div class="box-header"><h3><i class="mdi mdi-note-plus-outline"></i> Buat Artikel</h3></div>
            <i class="ion ion-clipboard"></i>
          <form class="form-horizontal" enctype="multipart/form-data" action="{{ URL('artikel') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-token">
            <div class="box-body check">
            <table class="table table-responsive">
              <tr>
                <td>
                  <div class="input-group @if ($errors->has('judul_artikel')) has-error @endif">
                  <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
                  <input type="text" class="form-control" name="judul_artikel" value="{{Input::old('judul_artikel')}}" placeholder="Masukan judul">
                  @if ($errors->has('judul_artikel'))<span class="label label-danger">{{ $errors->first('judul_artikel') }}</span> @endif
                  </div>
                 </td>
               </tr>
             <tr>
              <td>
                <div class="input-group @if ($errors->has('kategori_artikel')) has-error @endif">
                  <span class="input-group-addon"><i class="fa fa-database"></i></span>
                  <select class="form-control" name="kategori_artikel[]" style="width: 100%;">
                   <option>-- pilih kategori --</option>
                   @foreach($kategoris as $kategori)
                   <option value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
                   @endforeach
                  </select>
                   @if ($errors->has('kategori_artikel'))<span class="label label-danger">{{ $errors->first('kategori_artikel') }}</span>@endif
                </div>
              </td>
            </tr>
           <tr>
            <td>
               <div class="input-group @if ($errors->has('foto_artikel')) has-error @endif">
                <span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
                <div class="preview">
                 <input type="file" class="form-control" id="pilihan" name="foto_artikel">
                </div>
                <div class="img-preview">
                </div>
                 @if ($errors->has('foto_artikel'))<span class="label label-danger">{{ $errors->first('foto_artikel') }}</span> @endif
               </div>
             </td>
           </tr>
           <tr>
            <td>
              <div class="input-group @if ($errors->has('isi_artikel')) has-error @endif">
               <span class="input-group-addon"><i class="fa fa-edit"></i></span>
               <textarea id="isi_artikel" name="isi_artikel" col="8">{{Input::old('isi_artikel')}}</textarea>
                @if ($errors->has('isi_artikel'))<span class="label label-danger">{{ $errors->first('isi_artikel') }}</span> @endif
             </div>
           </td>
         </tr>
         <tr>
          <td>
            <div class="input-group @if ($errors->has('sumber')) has-error @endif">
              <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
              <input type="text" class="form-control" name="sumber" value="{{Input::old('sumber')}}" placeholder="Masukan Sumber">
              @if ($errors->has('sumber'))<span class="label label-danger">{{ $errors->first('sumber') }}</span> @endif
            </div>
          </td>
        </tr>
         <tr>
              <td>
                  <div class="input-group @if ($errors->has('judul_artikel')) has-error @endif">
                  <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
                  <input type="text" class="form-control" id="tags" name="tags[]" data-role="tagsinput" placeholder="masukan tags"> 
                  @if ($errors->has('tags'))<span class="label label-danger">{{ $errors->first('tags') }}</span>@endif
                </div>
              </td>
            </tr>
         <tr>
          <td>
            <div class="box-footer">
              <a href="{{ URL('artikel') }}" class="btn btn-default pull-right"> Batal</a>
              <button class="btn btn-success pull-right"><strong><i class="fa fa-save"></i> Simpan</strong></button >
            </div>
          </td>
        </tr>
       </table>
      </div>
      </form>
     </div>
   </div>
  </div>
</section>

</div>
@endsection
@push('script')
<script type="text/javascript">

CKEDITOR.replace('isi_artikel');
               
$('#pilihan').on('change', function(evt) {
  var selectedImage = evt.currentTarget.files[0];
  var imageWrapper = document.querySelector('.img-preview');
  var theImage = document.createElement('img');
  imageWrapper.innerHTML = '';
 
  var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
  if (regex.test(selectedImage.name.toLowerCase())) {
    if (typeof(FileReader) != 'undefined') {
      var reader = new FileReader();
      reader.onload = function(e) {
          theImage.id = 'new-selected-image';
          theImage.src = e.target.result;
          imageWrapper.appendChild(theImage);
        }
        //
      reader.readAsDataURL(selectedImage);
    } else {
      //-- Let the user knwo they cannot peform this as browser out of date
      console.log('browser support issue');
    }
  } else {
    //-- no image so let the user knwo we need one...
    $(this).prop('value', null);
    console.log('please select and image file');
  }

});
</script>
@endpush