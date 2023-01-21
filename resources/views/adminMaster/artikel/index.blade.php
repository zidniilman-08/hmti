@extends('layouts.app')


@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-file-archive-o"></i> Daftar Artikel 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file"></i> Artikel</a></li>
        <li class="active"> Daftar Artikel</li>
      </ol>
    </section>

    <section class="content-header">
     <div class="box success">
            <div class="box-body">
              <a class="btn btn-app active" tooltip="Tooltip, you can change the position." href="{{ URL('artikel') }}">
                <i class="fa fa-desktop"></i> Tampil
              </a>
              <a href="{{ URL('artikel/create') }}" class="btn btn-app">
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
        <div class="col-md-12">
         <div class="box box-danger">
          <div class="box-header">
            <i class="ion ion-clipboard"></i>
             <form>
              <div class="box-body check">
               <table class="table table-striped table-hover js-basic-example dataTable">  
                  <thead>
                    <th><button type="button" class="btn btn-default btn-sm checkAll"><i class="fa fa-square-o"></i></button></th>
                    <th><i class="fa fa-list"></i> Judul Artikel</th>
                    <th><i class="fa fa-database"></i> Kategori</th>
                    <th><i class="fa fa-user"></i> Posted By</th>
                    <th><i class="fa fa-calendar"></i> Publikasi</th>
                    <th><i class="fa fa-gear"></i> Action</th>
                  </thead>
                  <?php $no=1; ?>
                  @foreach($artikel as $post)
                  <tr class="artikel{{$post->id}}">
                    <td><input type="checkbox" class="checkbox"></td>
                    <td>{{ $post->judul_artikel }}</td>
                    <td>{{ $post->kategori_artikel }}</td>
                    @foreach($post->users as $user)
                    <td>{{ $user->username }}</td>
                    @endforeach
                    <td class="center">
                    @if($post->active == 1)
                       <a href="notpublish/{{$post->id}}" class="btn btn-sm btn-default active tooltip-bottom" title="artikel ini dipublikasikan">publish</a>
                      @else
                       <a href="publish/{{$post->id}}" class="btn btn-sm btn-default tooltip-bottom" title="artikel belum dipublikasikan">publish</a>
                    @endif
                    </td>
                    <td>
                       <a href="#" class="btn btn-xs btn-info tooltip-viewport-bottom" title="Lihat artikel"><i class="fa fa-eye"></i></a>
                       <a href="{{ route('artikel.edit', $post->id) }}" class="btn btn-xs btn-primary tooltip-bottom" title="Edit artikel"><i class="fa fa-edit"></i></a>
                       <a href="!#" id="delete" class="btn btn-xs btn-danger tooltip-bottom hapus_artikel" data-id="{{$post->id}}" data-name="{{$post->judul_artikel}}" title="hapus artikel"><i class="fa fa-trash"></i></a> 
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
             </form>
            </div>
           </div>
          </div>
         </div>
        </section>
</div>

@endsection
@push('script')

 <script>
$(document).ready(function($){

  $(".dataTable").dataTable();

            $('.hapus_artikel').on('click',function(){
                var inputData = $('#Delete').serialize();

                var dataId = $(this).attr('data-id');
                var dataName = $(this).attr('data-name');
                var parent = $(this).parent();

                swal({
                        title: 'Apakah anda yakin ?',
                        text: 'Ingin menghapus artikel' + dataName + ' ini?',
                        type: 'warning',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        $.ajax({
                           url: '{{ url('artikel/hapus') }}' + '/' + dataId,
                           type: 'get',
                           data: inputData,
                           success: function( msg ) {
                           if ( msg.status === 'success' ) {
                           toastr.success( msg.msg );

                          parent.slideUp(300, function () {
                          parent.closest("tr").remove();
                       });
                       }
                      },
                       error: function( data ) {
                       if ( data.status === 422 ) {
                      toastr.error('Cannot delete the category');
                     }
                    }
                 });
              });
             return false;
          });

        });
</script>

@endpush