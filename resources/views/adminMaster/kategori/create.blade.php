@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-database"></i> Tambah Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Kategori</a></li>
        <li class="active"> Kategori</li>
      </ol>
    </section>
    <section class="content-header">
      <div class="box success">
            <div class="box-body">
              <a href="{{ URL::to('kategori') }}" class="btn btn-app">
                <i class="fa fa-desktop"></i> Tampil
              </a>
              <a class="btn btn-app" disabled>
                <i class="fa fa-trash "></i> Hapus pilihan
              </a>
              <a class="btn btn-app btn-success pull-right">
                <i class="fa fa-cloud-download"></i> Export data
              </a>
              
            </div>
          </div>
    </section>
<section class="content-header">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
             {{ Form::open(array('url' => 'kategori')) }}
              <div class="box-body">
                <div class="form-group">
                  <label><i class="fa fa-database"></i> Kategori @if ($errors->has('nama_kategori'))
                   <span class="label label-danger">{{ $errors->first('nama_kategori') }}</span> @endif</label>

                  {{ Form::text('nama_kategori', Input::old('nama_kategori'), array('class' => 'form-control', 'placeholder' => 'Masukan nama kategori')) }}
                </div>

              <div class="box-footer">
                <a href="{{ URL('kategori') }}" class="btn btn-default pull-right">Batal</a> <button type="submit" class="btn btn-success pull-right"><strong><i class="fa fa-save"></i> Simpan kategori</strong></button>
              </div>
            {{ Form::close() }}
              
            </div>
          </div>
        </div>
        </div>
      </section>

</div>
@endsection