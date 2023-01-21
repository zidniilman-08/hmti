@extends('layouts.app')

@section('content')

<div class="notif"></div>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-database"></i> Daftar Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Kategori</a></li>
        <li class="active"> Kategori</li>
      </ol>
    </section>
    <section class="content-header">
      <div class="box box-default">
            <div class="box-body">
              <a class="btn btn-app active" tooltip="Tooltip, you can change the position." href="{{ URL('kategori') }}">
                <i class="fa fa-desktop"></i> Tampil
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
 <div class="box">
  <div class="box-body">
   <div class="container ">
    <div class="form-group row add">
      <div class="col-md-8">
        <input type="text" class="form-control center" id="kategori" name="nama_kategori" placeholder="Masukan nama kategori" required>
        <p class="error animated fadeInDown text-center alert alert-danger hidden"></p>
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary" type="submit" id="add">
          <span class="glyphicon glyphicon-plus"></span> Tambah
        </button>
      </div>
    </div>
    {{ csrf_field() }}
    <div class="table-responsive text-center col-lg-9">
      <table class="table table-stiped table-borderless" id="table">
        <thead>
          <tr><?php $no=1?>
            <th class="text-center"><i class="fa fa-list"></i> No</th>
            <th class="text-center"><i class="fa fa-database"></i> Nama Kategori</th>
            <th class="text-center"><i class="fa fa-gear"></i> Actions</th>
          </tr>
          @foreach($kategori as $kategoris)
          <tr class="kategori{{$kategoris->id}}">
            <td>{{ $kategoris->id }}</td>
            <td>{{ $kategoris->nama_kategori }}</td>
            <td><button class="edit-modal btn btn-info" data-id="{{$kategoris->id}}" data-name="{{$kategoris->nama_kategori}}">
                 <span class="glyphicon glyphicon-edit"></span> Edit
                </button>
                <button class="delete-modal btn btn-danger" data-id="{{$kategoris->id}}" data-name="{{$kategoris->nama_kategori}}">
                 <span class="glyphicon glyphicon-trash"></span> Delete
                </button></td>
          </tr>
          @endforeach
        </thead>
      </table>
    </div>
  </div>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">ID:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="name">Kategori:</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="n">
              </div>
            </div>
          </form>
          <div class="deleteContent">
            Apakah anda yakin ingin menghapus kategori <span class="dname"></span> ? <span
              class="hidden did"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn actionBtn" data-dismiss="modal">
              <span id="footer_action_button" class='glyphicon'> </span>
            </button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
</div>
@endsection
@push('script')
<script>
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: "{{url('update_kategori')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'nama_kategori': $('#n').val()
            },
            success: function(data) {
                $('.kategori' + data.id).replaceWith("<tr class='kategori" + data.id + "'><td>" + data.id + "</td><td>" + data.nama_kategori + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.nama_kategori + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama_kategori + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {
            $.ajax({
            type: 'post',
            url: "{{ route('kategori.store') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'nama_kategori': $('input[name=nama_kategori]').val()
            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                    $('.error').text(data.errors.nama_kategori);
                    console.log(data);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='kategori" + data.id + "'><td>" + data.id + "</td><td>" + data.nama_kategori + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.nama_kategori + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama_kategori + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#kategori').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: "{{url('/hapus_kategori')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.kategori' + $('.did').text()).remove();
            }
        });
    });
</script>
@endpush
