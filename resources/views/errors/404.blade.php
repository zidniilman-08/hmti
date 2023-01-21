@extends('template/b_index')

@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="error-page">
        <div class="col s12 m12 l12 z-depht-3">
       <h2 class="headline center animated tada">404  <span>Page not found</span> <img src="http://pm1.narvii.com/6046/aba1d620322fd86ecb5f0f26d7682d65c6926947_hq.jpg"></h2>

        <div class="error-content animated tada center">
          <a href="{{url('/')}}" class="btn btn-default blue darken-1"><i class="fa fa-home"></i> Kembali ke beranda</a>
          <a class="btn btn-default blue darken-1"><i class="fa fa-envelope"></i> Contack Us</a>
        </div>
      </div>
    </div>
    </section>
</div>
  @endsection