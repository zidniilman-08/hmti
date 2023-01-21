@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-edit"></i> Edit {{ $artikel->judul_artikel }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Artikel</a></li>
        <li class="active"> Edit Artikel</li>
      </ol>
    </section>
    <section class="content-header">
      <div class="box success">
            <div class="box-body">
              <a class="btn btn-app" href="{{ URL('artikel') }}">
                <i class="fa fa-desktop"></i> Tampil
              </a>
              <a class=" btn btn-app"  href="{{ URL('artikel/create') }}">
                <i class="fa fa-plus"></i> Tambah
              </a>
              <a class="btn btn-app" disabled>
                <i class="fa fa-trash "></i> Hapus pilihan
              </a>
              <a class="btn btn-app pull-right">
                <i class="fa fa-cloud-download"></i> Export data
              </a>
              
            </div>
          </div>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-lg-12">
          <div class="box box-danger">
             <div class="box-header">
              <i class="ion ion-clipboard"></i>
              {{ Form::model($artikel, array('action'=> array('artikelController@update', $artikel->id), 'method'=>'PUT', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) }}
              <div class="box-body">
               <table class="table table-responsive">
              <tr>
                <td>
                  <div class="input-group @if ($errors->has('judul_artikel')) has-error @endif">
                  <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
                  <input type="text" class="form-control" name="judul_artikel" value="{{ $artikel->judul_artikel }}" placeholder="Masukan judul">
                  @if ($errors->has('judul_artikel'))<span class="label label-danger">{{ $errors->first('judul_artikel') }}</span> @endif
                  </div>
                 </td>
               </tr>
             <tr>
              <td>
                <div class="input-group @if ($errors->has('kategori_artikel')) has-error @endif">
                  <span class="input-group-addon"><i class="fa fa-database"></i></span>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Pilih kategori" name="kategori_artikel[]" style="width: 100%;">
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
                <div class="input-group @if ($errors->has('posted_by')) has-error @endif">
                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
                 <select class="form-control text-mute" name="posted_by" style="width: 100%;">
                  <option value="{{ Auth::user()->username }}">{{ Auth::user()->username }}</option>
                 </select>
                  @if ($errors->has('posted_by'))<span class="label label-danger">{{ $errors->first('posted_by') }}</span> @endif
                </div>
              </td>
            </tr>
            <td>
               <div class="input-group @if ($errors->has('foto_artikel')) has-error @endif">
                <span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
                <img src="{{ asset($artikel->foto_artikel) }}" style="width:45%;height:43%">
                <input type="file" class="form-control" id="pilihan" name="foto_artikel" style="width:100%">
                 @if ($errors->has('foto_artikel'))<span class="label label-danger">{{ $errors->first('foto_artikel') }}</span> @endif
               </div>
             </td>
           </tr>
          <tr>
            <td>
              <div class="input-group @if ($errors->has('isi_artikel')) has-error @endif">
               <span class="input-group-addon"><i class="fa fa-edit"></i></span>
               <textarea class="ckeditor"  id="isi_artikel" name="isi_artikel" col="8">{{$artikel->isi_artikel}}</textarea>
                @if ($errors->has('isi_artikel'))<span class="label label-danger">{{ $errors->first('isi_artikel') }}</span> @endif
             </div>
           </td>
         </tr>
         <tr>
              <td>
                <div class="input-group @if ($errors->has('tags')) has-error @endif">
                <span class="input-group-addon"><i class="fa fa-database"></i></span>
                 <select class="form-control" multiple=true data-role="tagsinput" data-placeholder="Pilih Tags" name="tags[]" style="width: 100%;">
                   @foreach($tag as $tags)
                   <option value="{{ $tags->tags }}">{{ $tags->tags}}</option>
                   @endforeach
                  </select>
                   @if ($errors->has('tags'))<span class="label label-danger">{{ $errors->first('tags') }}</span>@endif
                </div>
              </div>
              </div>
              </td>
            </tr>
         <tr>
          <td>
               <div class="box-footer">
                <a href="{{ URL('artikel') }}" class="btn btn-default pull-right"> Batal</a>
                <button type="submit" class="btn btn-success pull-right"><strong><i class="fa fa-save"></i> Simpan Artikel</strong></button>
              </div>
            </td>
          </tr>
        </table>
            </div>
            {{ Form::close() }}
            </div>
          </div>
        </div>
        </div>
      </section>

</body>
</div>
@endsection
@push('script')
<script type="text/javascript">
                $(document).ready(function(){
                  CKEDITOR.replace('isi_artikel');
                  $('textarea').ckeditor();
                });
                </script>
@endpush