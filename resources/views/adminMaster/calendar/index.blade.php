@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-calendar-o"></i> Callendar
      </h1>
      <ol class="breadcrumb">
        <li class='active'><a href="#"><i class="fa fa-calendar"></i> Callendar</a></li>
      </ol>
    </section>
    <section class="content-header">
      <div class="box success">
            <div class="box-body">
              <a class="btn btn-app" href="{{ URL('calendar') }}">
                <i class="fa fa-calendar"></i> Tampil
              </a>
              <a class=" btn btn-app" href="#" data-toggle="modal" data-target="#create-item">
                <i class="fa fa-calendar-plus-o"></i> Tambah
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

    <section>
      <div class="row">
        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li><i class="fa fa-warning"></i> {{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
        <div class="col-lg-7 col-sm-7">
           <div id="calendar"></div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Buat task</h4>
          </div>
          <div class="modal-body">

              <form data-toggle="validator" action="{{ route('calendar.store') }}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                <label class="control-label" for="title">Nama:</label>
                 <input type="text" name="name" class="form-control" data-error="Modhon masuka nama." required />
                 <div class="help-block with-errors"></div>
               </div>
               <div class="form-group">
                 <label class="control-label" for="title">Deskripsi:</label>
                 <textarea name="deskripsi" class="form-control" data-error="Mohon masukan deskripsi." required></textarea>
                 <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                 <label class="control-label" for="title">Foto Event:</label>
                 <input type="file" class="form-control" id="pilihan" name="img_event">
                 <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                 <label class="control-label" for="title">Tanggal Mulai:</label>
                 <input type="text" class="form-control date" name="tanggal" required>
                 <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                 <label class="control-label" for="title">Tanggal berakhir:</label>
                 <input type="text" class="form-control date" name="tanggal_akhir">
                 <div class="help-block with-errors"></div>
              </div>
            <div class="form-group">
              <button type="submit" class="btn crud-submit btn-success">Submit</button>
            </div>
              </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
@push('script')
<script>
$(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today myCustomButton',
                center: 'title',
                right: 'month,agendaWeek'
            },
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->tanggal }}',
                    end: '{{ $task->tanggal_akhir }}',
                    url : '{{ route('calendar.edit', $task->id) }}'
                },
                @endforeach
            ]
        });

        $('.date').datepicker({
           autoclose: true,
           format: 'yy-mm-dd'
        });
    
    });
</script>
@endpush