@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-home"></i> Daftar Room
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Room</a></li>
        <li class="active"> Room</li>
      </ol>
    </section>
    <section class="content-header">
      <div class="box box-default">
            <div class="box-body">
              <a class="btn btn-app active" tooltip="Tooltip, you can change the position." href="{{ URL('room') }}">
                <i class="fa fa-desktop"></i> Tampil
              </a>
              <a href="{{ URL::to('room/create') }}" class="btn btn-app">
                <i class="fa fa-plus"></i> Tambah
              </a>
              <a class="btn btn-app dell_all disabled">
                <i class="fa fa-trash "></i> Hapus pilihan
              </a>
              <a class="btn btn-app kanan">
                <i class="fa fa-print"></i> Export data
              </a>
              
            </div>
          </div>

    </section>

    <section class="content">
       <div class="row">
        <div class="col-md-12">
         <div class="box box-danger">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
             <form role="form">
              <div class="box-body check">
               <table class="table table-striped table-bordered responsive">
                  <thead>
                  	<?php $no = 1 ?>
                    <th><button type="button" class="btn btn-default btn-sm checkAll"><i class="fa fa-square-o"></i></button></th>
                    <th> No</th>
                    <th>No Room</th>
                    <th>Class</th>
                    <th>Lantai</th>
                  </thead>
                  <tr>
                  	<td></td>
                  	<td></td>
                  	<td></td>
                  	<td></td>
                  	<td></td>
                  </tr>
                </table>
               </div>
              </form>


    </section>

</div>



@endsection