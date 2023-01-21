@extends('layouts.app')

@section('content')


<div class="content-wrapper">
  <section class="content-header">
      <h1>
       <i class="mdi mdi-account-multiple"></i> Daftar Users
      </h1>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a> User</a></li>
        <li class="active">Daftar Users</li>
      </ol>
    </section>

  <section class="content-header">
    <div class="row" id="app">
       <users></users>   
    </div>
  </section>

</div>
@endsection
@push('script')
<script type="text/javascript">

        $(document).ready(function($){
            $('.hapus_user').on('click',function(){
               var getLink = $(this).attr('href');
                swal({
                        title: 'Apakah anda yakin ?',
                        type: 'warning',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
</script>
@endpush