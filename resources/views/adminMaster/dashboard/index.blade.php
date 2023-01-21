@extends('layouts.app')

@section('content')


<div class="content-wrapper">

    <section class="content-header">
       <h1>
          <i class="fa fa-dashboard"></i> Dashboard
          <small>Control panel</small>
       </h1>
      <br/>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content-header">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            @include('adminMaster.dashboard.info')
          </div>
      
          <br/>

          <div class="row">
            <div class="col-md-8">
               @include('adminMaster.dashboard.charts')
           </div>
            
             <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->

         </div>

       </div>
    </section>
</div>
@endsection
@push('script')

@endpush




