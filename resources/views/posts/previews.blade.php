@extends('template/t_index')

@section('content')
<style type="text/css">
.red .darken-2 a:hover{
  color: #fff;
}
.conten-bokura {
  margin-left: -7px;
}

.post {
  position: relative;
  max-width: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;;
 }
 .item {
  width: 600px;
  height: 400px;
 }
.item img {
  margin: 7em 10px;
  width: 450px;
  height: auto;
  box-shadow: 0 5px 8px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
}
.title-header {
  position: relative;
  margin: 0;
  height: 400px;
  font-weight: 900;
  background: url(<?php echo asset('assets/img/wallpaper.jpg') ?>);
  background-attachment: fixed;
  background-size: cover;
  border-radius: 5px 0 20px 5px;

}
.title-header h3 {
  position: absolute;
  margin: 3.5em 0;
  left: 0;
  color: #000;
  width: 700px;
  font-family: 'Roboto'; 
  font-size: 2.5em;
  font-weight: 600;
  line-height: 1.5em;
}
.title-header h3 span {
  font-size: 16px;
  font-weight: 500;
}
.title-header h3 span a {
  color: #000;
}
.title-header .info {
  position: absolute;
  margin: -10px 3px;
  height: 40px;
  font-size: 25px;;
  text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.3);
}
.title-header .info span {
  position: relative;
  color: #000;
}
.title-header .info span a{
  color: red;
}
.card-title {
   font-family: "Oswald", sans-serif; 
}
.card-title span{
  margin-left: 4.5em;
  font-size: 18px;
  font-weight: 500;
}
.user-photo {
  position: absolute;
  margin: 0 10px;
  width: 45px;
  height: 45px;
  position: relative;
  overflow: hidden;
  border-radius: 50%;
  background-size: cover;
}
.user-photo img {
  display: inline;
  margin: 0 auto;
  height: 100%;
  width: auto;
}
.social-ico {
  widows: 40px;
  height: 40px;
}
.side {
  margin-top: 2em;
}
.side-card .card {
  margin: 0px 3em;
  width: 350px;
  box-shadow: none;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.side-card .card .card-title span {
  position: absolute;
  margin: 0 4em;
  width: 250px;
  font-size: 18px;
  font-weight: 600;
}
.side-card .card-content p{
  margin-bottom: 19px;
  width: 300px;
}
.side-card .card-content p a {
  margin: -1em -1em;
}
.side-card .card-content p a img{
  margin: -13px 0 -15px 0;
}
#side .card-content {
  margin: -30px 10px;
}
#side .list {
  margin: 15px -20px;
}
#side .card-content p a span{
  position: absolute;
  margin: -10px 12px;
  color: #e64a19;
  font-size: 14px;
  font-weight: 600;
}
#side .detail span{
  position: absolute;
  margin: -1.5em 5em;
  color: #e64a19;
}
.body-post {
  background: #ffffff;
}
.artikels {
  background-color: #ffffff;
  border-radius: 7px;
}
.artikels .article {
  margin-left: 4em;
}
.isi-artikel {
  margin-left: 1em;
  font-family: "Oswald", sans-serif; 
  font-size: 18px;
  font-weight: 500;
}
.btn-share-post {
  position: absolute;
  margin-top: 165px;
  left: 63%;
}
.btn-share-post li {
  margin-top: 10px;
}
</style>

  <div class="post"> 
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="col s12 m5 l5">
           <div class="item">
             <img src="{{asset($post->foto_artikel)}}">
            </div>
        </div>
        <div class="col s12 m7 l7">
          <div class="title-header">
              <h3>
                <p>{!!$artikel->judul_artikel} <span>Posted by <a href="#!">{{$artikel->posted_by}}</a></span></p> 
                <div class="info"><span><i class="mdi mdi-calendar"></i> hh/mm/yy || <i class="fa fa-eye"></i> 0
                || Kategori : <a href="#" class="kategori-post">{{ $artikel->kategori_artikel }}</a> 
                Tags : <a href="#"> none </a>></span> 
               </div>
              </a>
            </span>
           </h3>
          </div>
         </div>
         
         <br/>
         <br/>
            
 @include('template/social-share')  

<div class="body-post">
        <div class="z-depht-3 conten-bokura">
          <div class="artikels col s12 m8 s8">
           
            <br/>
            <article class="isi-artikel">
	            <p>{!! $artikel->isi_artikel !!}</p>
            </article>
           </div>

            <div class="col s12 m3 l3">
            <div class="side side-card">
               <div class="card">
                   <div class="card-content">
                    <div class="card-title">
                      <span> </span>
                      <div class="user-photo">
                       <img src="#">
                      </div>
                    </div>
                    <div class="card-content">
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </br>
             <div class="side-card" id="side">
               <div class="z-depth-2 card">
                 <ul class="nav nav-tabs" id="Tabs">
                   <li class="active"><a href="#terdahulu">Artikel Terdahulu</a></li>
                   <li><a href="#rec">Recomendasi Artikel</a></li>
                 </ul>
                 <div class="tab-content">
                  <div class="tab-pane active" id="terdahulu">
                   <div class="card-content">
                    
                  </div>
                </div>
                <div class="tab-pane" id="rec">
                   <div class="card-content">
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
     </div>
   </div>
 </div>

</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
  }
$(window).load(function(){
      $("#share").sticky({ topSpacing: 30 });
    });

$(function(){
   $('.tooltipped').tooltip({delay: 50});
   
  $("#Tabs a[href='#terdahulu']").on('click', function(){
    $("#Tabs a[href='#terdahulu']").tab('show');
  });
  $("#Tabs a[href='#rec']").on('click', function(){
    $("#Tabs a[href='#rec']").tab('show');
  });
});
</script>
@endpush