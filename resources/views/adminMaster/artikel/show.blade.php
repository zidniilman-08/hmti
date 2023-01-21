@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-eye"></i> Lihat {{ $artikel->judul_artikel }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Artikel</a></li>
        <li class="active"> Tampil Artikel</li>
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


    </section>
</div>

@endsection