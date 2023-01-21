@extends('template/b_index')

@section('content')
<style type="text/css">
.qlt-confirmation {
    width: 30%;
    margin: 9.1em auto;
 }
  
.qlt-confirmation .panel-body {
  	width: 99%;
 	margin: 0 auto;      
    padding: 40px 10px;
 }
 .qlt-confirmation .panel-body .desc{
    margin: 10px auto; 
    font-size: 18px;
 }

.qlt-confirmation .panel-body .notice {
    padding: 0px 20px; 
    margin-top: 50px;
    text-align: left;
    font-style:italic;
    color: gray;
 }
</style>
<div class="qlt-confirmation">
  	<div class="panel panel-default">
      <div class="panel-body">
        <center>
        <img src="https://cdn4.iconfinder.com/data/icons/social-communication/142/open_mail_letter-512.png" style="width:30px; height: 30px;">
          <p class="desc">Terimakasih sudah mendaftar!<br>Kami telah mengirim link konfirmasi ke email anda.<br>Silahkan periksa <i class="mdi mdi-inbox"></i> email anda!.</p>
        </center>
        
      </div>
	</div>
</div>

@endsection